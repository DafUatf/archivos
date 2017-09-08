<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;
use App\Model\Prestamo;
use App\Model\Comprobante;

class PDFController extends Controller
{
    public function pdf(request $request){
    	$a=$request->input('fecha_inicio');
        $b=$request->input('fecha_final');
        $c=$request->input('fecha_pre');
        $d=$request->input('fecha_dev');
        $e=$request->input('tipo');
		$prestamos = Prestamo::all();
		$mes=[
            ["value"=>"Enero"],
            ["value"=>"Febrero"],
            ["value"=>"Marzo"],
            ["value"=>"Abril"],
            ["value"=>"Mayo"],
            ["value"=>"Junio"],
            ["value"=>"Julio"],
            ["value"=>"Agosto"],
            ["value"=>"Septiembre"],
            ["value"=>"Octubre"],
            ["value"=>"Noviembre"],
            ["value"=>"Diciembre"]
        ];
        $year=Carbon::now()->year;
        $month=$mes[(Carbon::now()->month)-1];
        $day=Carbon::now()->day;
        $vista = \View::make('reporteprestamo.pdf', compact('prestamos', 'a', 'b', 'c', 'd', 'e', 'year', 'month', 'day'));
        $pdf = \App::make('dompdf.wrapper');
    	$pdf = PDF::loadHTML($vista);
    	return $pdf->stream('prestamos.pdf');
    }
    public function general(){
		$pres = Prestamo::all();
    	$mes=[
            ["value"=>"Enero"],
            ["value"=>"Febrero"],
            ["value"=>"Marzo"],
            ["value"=>"Abril"],
            ["value"=>"Mayo"],
            ["value"=>"Junio"],
            ["value"=>"Julio"],
            ["value"=>"Agosto"],
            ["value"=>"Septiembre"],
            ["value"=>"Octubre"],
            ["value"=>"Noviembre"],
            ["value"=>"Diciembre"]
        ];
        $year=Carbon::now()->year;
        $month=$mes[(Carbon::now()->month)-1];
        $day=Carbon::now()->day;
    	$vist = \View::make('reporteprestamo.pdfgeneral', compact('pres', 'year', 'month', 'day'));
    	$pdf = \App::make('dompdf.wrapper');
    	$pdf = PDF::loadHTML($vist);
    	return $pdf->stream('prestamos.pdf');
    }
    public function pdfgralcomprobante(){
        $com = Comprobante::all();
        $mes=[
            ["value"=>"Enero"],
            ["value"=>"Febrero"],
            ["value"=>"Marzo"],
            ["value"=>"Abril"],
            ["value"=>"Mayo"],
            ["value"=>"Junio"],
            ["value"=>"Julio"],
            ["value"=>"Agosto"],
            ["value"=>"Septiembre"],
            ["value"=>"Octubre"],
            ["value"=>"Noviembre"],
            ["value"=>"Diciembre"]
        ];
        $year=Carbon::now()->year;
        $month=$mes[(Carbon::now()->month)-1];
        $day=Carbon::now()->day;
        $vist = \View::make('reportecomprobante.pdfgral', compact('com', 'year', 'month', 'day'));
        $pdf = \App::make('dompdf.wrapper');
        $pdf = PDF::loadHTML($vist);
        return $pdf->stream('comprobantes.pdf');
    }
    public function pdfcomprobante(request $request){
        $a=$request->input('fecha_inicio');
        $b=$request->input('fecha_final');
        $compro = Comprobante::all();
        $mes=[
            ["value"=>"Enero"],
            ["value"=>"Febrero"],
            ["value"=>"Marzo"],
            ["value"=>"Abril"],
            ["value"=>"Mayo"],
            ["value"=>"Junio"],
            ["value"=>"Julio"],
            ["value"=>"Agosto"],
            ["value"=>"Septiembre"],
            ["value"=>"Octubre"],
            ["value"=>"Noviembre"],
            ["value"=>"Diciembre"]
        ];
        $year=Carbon::now()->year;
        $month=$mes[(Carbon::now()->month)-1];
        $day=Carbon::now()->day;
        $vista = \View::make('reportecomprobante.pdfcom', compact('compro', 'a', 'b', 'year', 'month', 'day'));
        $pdf = \App::make('dompdf.wrapper');
        $pdf = PDF::loadHTML($vista);
        return $pdf->stream('comprobantes.pdf');
    }
}
