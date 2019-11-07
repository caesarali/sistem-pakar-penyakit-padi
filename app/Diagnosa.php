<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    protected $table = 'diagnosa';

    protected $fillable = ['pasien_id', 'penyakit_id', 'persentase'];

    public $timestamps = false;

    public function penyakit() {
    	return $this->belongsTo('App\Penyakit');
    }

    public function pasien() {
    	return $this->belongsTo('App\Pasien');
    }
}
