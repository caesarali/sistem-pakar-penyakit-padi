<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pasien;
use App\Gejala;
use App\TempDiagnosa;
use App\Diagnosa;
use App\Penyakit;

class KonsultasiController extends Controller
{
    public function pasienForm() {
    	return view('konsultasi_form_pasien');
    }

    public function storePasien(Request $request) {
    	$pasien = new Pasien;
    	$pasien->nama = $request->nama;
    	$pasien->lokasi = $request->lokasi;
    	$pasien->save();
    	return $this->selectGejala($pasien->id);
    }

    private function selectGejala($pasien_id) {
    	$gejala = Gejala::all();
    	return view('konsultasi_form_gejala', compact('gejala', 'pasien_id'));
    }

    public function diagnosa(Request $request) {
        $pasien_id = $request->pasien_id;
    	foreach ($request->gejala as $gejala_id) {
            $pasien = Pasien::find($pasien_id)->attachGejala($gejala_id);
            $gejala = Gejala::find($gejala_id);
            foreach ($gejala->penyakit as $penyakit) {
                $temp_diagnosa = TempDiagnosa::where('pasien_id', $pasien_id)->where('penyakit_id', $penyakit->id);
                $temp_diag = $temp_diagnosa->first();
                if (count($temp_diag) <= 0) {
                    $temp_diag = new TempDiagnosa;
                    $temp_diag->pasien_id = $pasien_id;
                    $temp_diag->penyakit_id = $penyakit->id;
                    $temp_diag->gejala = count($penyakit->gejala);
                    $temp_diag->gejala_terpenuhi = 1;
                    $temp_diag->save();
                } else {
                    $temp_diag = $temp_diagnosa->update(['gejala_terpenuhi' => $temp_diag->gejala_terpenuhi + 1]);
                }
            }
    	}

        $this->hitungPersen($pasien_id);

        $this->hasil($pasien_id);

        return redirect()->route('hasilDiagnosa', $pasien_id);
    }

    private function hitungPersen($pasien_id) {
        $temp_diags = TempDiagnosa::where('pasien_id', $pasien_id)->get();
        foreach ($temp_diags as $temp_diag) {
            $persen = ($temp_diag->gejala_terpenuhi / $temp_diag->gejala) * 100;
            TempDiagnosa::where('penyakit_id', $temp_diag->penyakit_id)
                            ->where('pasien_id', $pasien_id)
                            ->update(['persen' => $persen]);
        }
    }

    private function hasil($pasien_id) {
        $temp_diagnosa = TempDiagnosa::where('pasien_id', $pasien_id);
        $sum_persen = $temp_diagnosa->sum('persen');
        $temp_diag = $temp_diagnosa->get();
        foreach ($temp_diag as $diag) {
            $persentase = ($diag->persen / $sum_persen) * 100;
            $diagnosa = Diagnosa::create([
                'pasien_id' => $diag->pasien_id,
                'penyakit_id' => $diag->penyakit_id,
                'persentase' => $persentase
            ]);
        }

        // return $this->hapusTempDiagnosa($pasien_id);
    }

    private function hapusTempDiagnosa($pasien_id) {
        return TempDiagnosa::where('pasien_id', $pasien_id)->delete();
    }

    public function hasilDiagnosa($pasien_id) {
        $diagnosa = Diagnosa::where('pasien_id', $pasien_id)->first();
        return view('diagnosa', compact('diagnosa'));
    }
}
