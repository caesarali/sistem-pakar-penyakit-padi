<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempDiagnosa extends Model
{
    protected $table = 'tmp_diagnosa';

    protected $fillable = ['pasien_id', 'penyakit_id', 'gejala', 'gejala_terpenuhi', 'persen'];

    public $timestamps = false;
}
