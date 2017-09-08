@extends('templade')
@section('content')
<p align="right"><?php echo date('l j \of F Y H:i:s');?></p>
<h1 class="title-pg">
<a href="{{route('reportecomprobante.create')}}"><span class="glyphicon glyphicon-triangle-left ">Volver</span></a><br>
<center> Reporte del Periodo</center></h1><br> 	
<table class="table table-striped" id="table">
	<tr align="center" >
		<td width="20px">Numero<br>Comprobante</td>
		<td>Fecha<br>Despacho</td>
		<td>Gestion</td>
		<td>Codigo<br>Archivo</td>
		<td>Tipo<br>Archivo</td>
		<td>Fecha<br>Recepcion</td>
	</tr>
	<tbody>
	<?php $con=0;?>
		@foreach($comprobantes as $comprobante)
				@if($comprobante->fecha_despacho >= $a && $comprobante->fecha_despacho <= $b)
					<tr align="center">
					<td>{{ $comprobante->id }}</td>
					<td>{{ $comprobante->fecha_despacho }}</td>
					<td>{{ $comprobante->gestion }}</td>
					<td>{{ $comprobante->cod_archivo }}</td>
					<td>{{ $comprobante->tipo_archivo }}</td>
					<td>{{ $comprobante->fecha_recepcion }}</td>
					</tr>
					</tbody>
					<?php $con++; ?>
				@endif
		@endforeach
		@if($con < 1)
			<p>NO EXISTEN REGISTROS EN EL PERIODO DADO</p>
		@elseif($con > 0)
			<p>REGISTROS DEL PERIODO DADO SON  {{$con}}</p>
		@endif
</table>
<form class="form-horizontal" role="form" method="GET" action='{{ url("pdfcompro") }}'>
   	<input type="hidden" name="fecha_inicio" value="{{$a}}">
   	<input type="hidden" name="fecha_final" value="{{$b}}">
    <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-folder-open"></span> Imprimir Reporte</button>
</form>
@endsection
