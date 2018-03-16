<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    protected $table = 'gejala';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function penyakit() {
    	return $this->belongsToMany('App\Penyakit', 'aturan');
    }

    public function pasien() {
    	return $this->belongsToMany('App\Pasien', 'tmp_gejala');
    }
}
