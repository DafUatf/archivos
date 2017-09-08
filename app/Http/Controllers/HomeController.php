<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //si no funciona kolocar home
        return view('welcome');
    }
    public function ingresar()
    {
        //$comprobantes = $this->comprobante->orderBy('id', 'asc')->get();
        return view('welcome');
    }
}
