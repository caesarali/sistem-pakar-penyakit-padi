<?php

use Illuminate\Database\Seeder;
use App\Gejala;
use App\Penyakit;
use App\Rule;

class RuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rule = array(
        	'1' => array(2, 24, 25),
        	'2' => array(6, 3, 18, 5, 12),
        	'3' => array(7, 12, 9, 10, 14),
        	'4' => array(7, 3, 8)
        );
        
    	// foreach ($rule as $key => $array) {
    	// 	foreach ($array as $gejala) {
     //    		Rule::create([
     //    			'penyakit_id' => $key,
     //    			'gejala_id' => $gejala
     //    		]);
    	// 	}
    	// }

        foreach ($rule as $penyakit_id => $gejala) {
            $penyakit = Penyakit::find($penyakit_id);
            foreach ($gejala as $gejala_id) {
                $penyakit->attachGejala($gejala_id);
            }
        }
    }
}
