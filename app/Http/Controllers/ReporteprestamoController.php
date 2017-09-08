<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Prestamo;
use App\Model\Comprobante;

class ReporteprestamoController extends Controller
{
    private $prestamo;
    public function __construct(Prestamo $prestamo, Comprobante $comprobante){
        $this->prestamo = $prestamo;
        $this->comprobante = $comprobante;
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }

    public function create()
    {
        $title = 'Generar Reporte Prestamos';
        return view('reporteprestamo.create', compact('title')); 
    }
    public function store(Request $request)
    {
        $title='Reporte de Prestamos';
        $prestamos = $this->prestamo->orderBy('id', 'asc')->get();
        $a=$request->input('fecha_inicio');
        $b=$request->input('fecha_final');
        $c=$request->input('fecha_pre');
        $d=$request->input('fecha_dev');
        $e=$request->input('tipo');
        if($a>$b)
            return redirect()->route('reporteprestamo.create')->with('sms', 'LA FECHA INICIO  NO DEBE SER MAYOR A LA FECHA FINAL');
        
        else
            return view('reporteprestamo.index', compact('title', 'prestamos', 'a', 'b', 'c', 'd', 'e')); 
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
