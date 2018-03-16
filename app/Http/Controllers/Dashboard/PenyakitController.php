<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Penyakit;
use App\Gejala;

class PenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penyakit = Penyakit::all();
        $gejalas = Gejala::all();
        return view('dashboard.penyakit', compact('penyakit', 'gejalas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $penyakit = new Penyakit;
        $penyakit->nama = $request->nama;
        $penyakit->penyebab = $request->penyebab;
        $penyakit->definisi = $request->definisi;
        $penyakit->save();
        foreach ($request->gejala as $gejala_id) {
            $penyakit->attachGejala($gejala_id);
        }
        return back()->with('status', 'Data penyakit baru ditambahkan kedalam knowladge base.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Penyakit $penyakit)
    {
        return view('dashboard.penyakit-show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Penyakit $penyakit)
    {
        $gejalas = Gejala::all();
        return view('dashboard.penyakit-edit', compact('penyakit', 'gejalas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penyakit $penyakit)
    {
        $penyakit->nama = $request->nama;
        $penyakit->penyebab = $request->penyebab;
        $penyakit->definisi = $request->definisi;
        $penyakit->save();

        foreach ($penyakit->gejala as $gejala) {
            $penyakit->detachGejala($gejala->id);
        }

        foreach ($request->gejala as $gejala_id) {
            $penyakit->attachGejala($gejala_id);
        }

        return back()->with('status', 'Perubahan data disimpan kedalam knowladge base.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penyakit $penyakit)
    {
        $penyakit->delete();
        foreach ($penyakit->gejala as $gejala) {
            $penyakit->detachGejala($gejala->id);
        }
        return back()->with('status', 'Data penyakit dihilangkan dari knowladge base.');
    }
}
