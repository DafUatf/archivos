<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Comprobante;

class ReportecomprobanteController extends Controller
{
    private $comprobante;
    public function __construct(Comprobante $comprobante){
        $this->comprobante = $comprobante;
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }
    public function create()
    {
        $title = 'Generar Reporte';
        return view('reportecomprobante.create', compact('title')); 
    }
    public function store(Request $request)
    {
        $title='Reporte del Periodo';
        $comprobantes = $this->comprobante->orderBy('id', 'asc')->get();
        $a=$request->input('fecha_inicio');
        $b=$request->input('fecha_final');
        if($a>$b)
            return redirect()->route('reportecomprobante.create')->with('sms', 'LA FECHA INICIO NO DEBE SER MAYOR A LA FECHA FINAL');
        else
            return view('reportecomprobante.index', compact('title', 'comprobantes', 'a', 'b')); 
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
