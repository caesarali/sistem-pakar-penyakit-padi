<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasien';

    protected $guarder = ['id', 'created_at', 'updated_at'];

    public function gejala() {
    	return $this->belongsToMany('App\Gejala', 'tmp_gejala');
    }

    public function diagnosa() {
    	return $this->hasMany('App\Diagnosa');
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
