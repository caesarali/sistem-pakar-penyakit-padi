<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Gejala;

class Penyakit extends Model
{
    protected $table = 'penyakit';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function gejala() {
    	return $this->belongsToMany('App\Gejala', 'aturan');
    }

    public function attachGejala($gejala_id) {
        $gejala = Gejala::find($gejala_id);
        return $this->gejala()->attach($gejala);
    }

    public function detachGejala($gejala_id) {
        $gejala = Gejala::find($gejala_id);
        return $this->gejala()->detach($gejala);
    }
}
