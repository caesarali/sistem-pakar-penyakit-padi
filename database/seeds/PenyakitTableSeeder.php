<?php

use Illuminate\Database\Seeder;
use App\Penyakit;

class PenyakitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$penyakit = array(
            'Tungro',
            'Kerdil Rumput',
            'Blast',
            'Hawar Pelepah',
            'Hawar Bakteri'
        );

        foreach ($penyakit as $nama) {
	        Penyakit::create([
	        	'nama' => $nama,
                'penyebab' => 'virus'
	        ]);	
        }
    }
}
