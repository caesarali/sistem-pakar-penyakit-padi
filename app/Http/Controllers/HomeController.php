<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penyakit;
use App\Gejala;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function penyakit()
    {
        $penyakit = Penyakit::all();
        return view('dashboard.penyakit', compact('penyakit'));
    }

    public function gejala()
    {
        $gejala = Gejala::all();
        return view('dashboard.gejala', compact('gejala'));
    }

    public function detail(Penyakit $penyakit) {
        return view('dashboard.penyakit-show', compact('penyakit'));
    }
}
