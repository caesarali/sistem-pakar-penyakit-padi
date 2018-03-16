<?php

use Illuminate\Database\Seeder;
use App\Gejala;

class GejalaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gejala = array(
        	'Akar tanaman lebih sedikit',
        	'Anakan berkurang / sedikit',
        	'Anakan bertambah banyak',
        	'Anakan tumbuh lemas',
        	'Anakan tumbuh tegak',
        	'Bercak-bercak berwarna coklat',
        	'Bercak berbentuk oval/elips',
        	'Bercak berwarna abu-abu kehijauan / hijau keabu-abuan',
        	'Bercak berwarna kelabu / keputihan',
        	'Bercak dilingkari warna coklat / merah kecoklatan',
        	'Bercak hitam / coklat pada kulit gabah',
        	'Bercak menyerang daun',
        	'Bercak pada bagian pelepah daun bagian bawah',
        	'Daerah dekat leher paniket berwarna coklat',
        	'Daun bendera robek-robek / berombak sepanjang pembulu',
        	'Daun berwarna abu-abu keputih-putihan',
        	'Daun berwarna hijau pucak / kekuning-kuningan',
        	'Daun berwarna hijau pucat / kuning pucat',
        	'Daunt berwarna hijau tua',
        	'Daun berwarna  jingga',
        	'Daun keriput dan layuseperti tersiram air panas',
        	'Daun melingkar seperti terpilin',
        	'Daun menggulung dan mengering',
        	'Daun menguning sampai jingga dari pucuk ke pangkal',
        	'Daun muda terlihat seperti mottle'
        );

        foreach ($gejala as $name) {
        	Gejala::create([
        		'name' => $name
        	]);
        }
    }
}
