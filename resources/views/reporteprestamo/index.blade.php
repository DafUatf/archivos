@extends('templade')

@section('content')
<p align="right"><?php echo date('l j \of F Y H:i:s');?></p>
<h1 class="title-pg">
<a href="{{route('reporteprestamo.create')}}"><span class="glyphicon glyphicon-triangle-left ">Volver</span></a><br>
<center> Reporte de Prestamos</center></h1><br> 	

<table class="table table-striped" id="table">
	<tr align="center" >
		<td width="20px"><strong>NUMERO<br>REGISTRO</strong> </td>
		<td><strong>FECHA<br>PRESTAMO</strong> </td>
		<td><strong>CODIGO</strong></td>
		<td><strong>DIP</strong></td>
		<td><strong>UNIDAD</strong></td>
		<td><strong>FECHA<br>DEVOLUCION</strong></td>
		<td><strong>OBSERVACIONES<br> PRESTAMO | DEVOLUCION</strong></td>
	</tr>
	<tbody>
	<?php $con=0; $o=$d;?>
		@foreach($prestamos as $prestamo)
				@if($prestamo->fecha_prestamo >= $a && $prestamo->fecha_prestamo <= $b)
					<tr align="center">
					<td>{{ $prestamo->id }}</td>
					<td>{{ $prestamo->fecha_prestamo }}</td>
					<td>{{ $prestamo->comprobante_cod_archivo }}</td>
					<td>{{ $prestamo->persona_dip }}</td>
					<td>{{ $prestamo->unidad }}</td>
					<td>{{ $prestamo->fecha_devolucion }}</td>
					<td>{{ $prestamo->observacion }}</td>
					</tr>
					</tbody>
					<?php $con++; ?>
					@elseif($prestamo->fecha_prestamo == $c)
							<tr align="center">
							<td>{{ $prestamo->id }}</td>
							<td>{{ $prestamo->fecha_prestamo }}</td>
							<td>{{ $prestamo->comprobante_cod_archivo }}</td>
							<td>{{ $prestamo->persona_dip }}</td>
							<td>{{ $prestamo->unidad }}</td>
							<td>{{ $prestamo->fecha_devolucion }}</td>
							<td>{{ $prestamo->observacion }}</td>
							</tr>
							</tbody>
							<?php $con++; ?>
						@elseif($prestamo->fecha_devolucion == $d)
							<tr align="center">
							<td>{{ $prestamo->id }}</td>
							<td>{{ $prestamo->fecha_prestamo }}</td>
							<td>{{ $prestamo->comprobante_cod_archivo }}</td>
							<td>{{ $prestamo->persona_dip }}</td>
							<td>{{ $prestamo->unidad }}</td>
							<td>{{ $prestamo->fecha_devolucion }}</td>
							<td>{{ $prestamo->observacion }}</td>
							</tr>
							</tbody>
							<?php $con++; ?>
							<?php $o=$d; ?>
							@elseif($prestamo->fecha_devolucion != "0000-00-00" && $e == "devuelto")
								<tr align="center">
								<td>{{ $prestamo->id }}</td>
								<td>{{ $prestamo->fecha_prestamo }}</td>
								<td>{{ $prestamo->comprobante_cod_archivo }}</td>
								<td>{{ $prestamo->persona_dip }}</td>
								<td>{{ $prestamo->unidad }}</td>
								<td>{{ $prestamo->fecha_devolucion }}</td>
								<td>{{ $prestamo->observacion }}</td>
								</tr>
								</tbody>
								<?php $con++; ?>
							@elseif($prestamo->fecha_devolucion == "0000-00-00" && $e == "nodevuelto")
								<tr align="center">
								<td>{{ $prestamo->id }}</td>
								<td>{{ $prestamo->fecha_prestamo }}</td>
								<td>{{ $prestamo->comprobante_cod_archivo }}</td>
								<td>{{ $prestamo->persona_dip }}</td>
								<td>{{ $prestamo->unidad }}</td>
								<td>{{ $prestamo->fecha_devolucion }}</td>
								<td>{{ $prestamo->observacion }}</td>
								</tr>
								</tbody>
								<?php $con++; ?>
				@endif
		@endforeach
		@if($con < 1)
			<p>NO EXISTEN REGISTROS EN EL PERIODO DADO</p><br>
		@elseif($con > 0)
			<p>REGISTROS DEL PERIODO DADO SON  {{$con}}</p>
		@endif
</table>
<form class="form-horizontal" role="form" method="GET" action='{{ url("pdf") }}'>
   	<input type="hidden" name="fecha_inicio" value="{{$a}}">
   	<input type="hidden" name="fecha_final" value="{{$b}}">
   	<input type="hidden" name="fecha_pre" value="{{$c}}">
   	<input type="hidden" name="fecha_dev" value="{{$d}}">
   	<input type="hidden" name="tipo" value="{{$e}}">
    <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-folder-open"></span>  Imprimir Reporte</button>
</form>
@endsection
