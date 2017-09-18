<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArchivoController extends Controller
{
     public function index()
    {
       /* $title = "Modulo de Archivos";
        $prestamos = $this->->orderBy('id', 'asc')->paginate(10);*/
        return view('archivos.index', compact('archivos', 'title'));
    }
}
