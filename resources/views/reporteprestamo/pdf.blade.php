<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Prestamos</title>
	<style type="text/css">
		img{
        	opacity: 0.1;
        	position: absolute;
        	margin-left: 25%;
        }
		table{
			border-collapse: collapse;
		}
		td,th{
			border: 1px solid;
		}
	</style>
</head>
<body>
<h5>Universidad Autonoma Tomas Frias</h5>
<h5>Unidad de "ARCHIVOS"</h5><br>
<h1 class="title-pg"><center>
Reporte de Prestamos</center></h1>
<h1 class="title-pg"><center>Consulta Realizada al: {{$day}} de {{$month["value"]}} del {{$year}}</center></h1><br> 	
<img src="assets/img/uatf.jpg">
<table class="table table-striped" id="table" align="center">
	<tr align="center" >
		<!--<td width="20px"><strong>Numero<br>Registro</strong></td>-->
		<td><h4>FECHA PRESTAMO</h4></td>
		<td><h4>CODIGO COMPROBANTE</h4></td>
		<td><h4>DIP</h4></td>
		<td><h4>UNIDAD</h4></td>
		<td><h4>FECHA DEVOLUCION</h4></td>
		<td><h4>Observaciones Prestamo|Devolucion</h4></td>
	</tr>
	<tbody>
	<?php $con=0;?>
		@foreach($prestamos as $prestamo)
				@if($prestamo->fecha_prestamo >= $a && $prestamo->fecha_prestamo <= $b)
					@if($prestamo->fecha_devolucion == '0000-00-00')
						<tr align="center" bgcolor="f92929">
					@elseif($prestamo->fecha_devolucion != '0000-00-00')
						<tr align="center">
					@endif
					<!--<td>{{ $prestamo->id }}</td>-->
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
							@if($prestamo->fecha_devolucion == '0000-00-00')
								<tr align="center" bgcolor="f92929">
							@elseif($prestamo->fecha_devolucion != '0000-00-00')
								<tr align="center">
							@endif
							<!--<td>{{ $prestamo->id }}</td>-->
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
							<!--<td>{{ $prestamo->id }}</td>-->
							<td>{{ $prestamo->fecha_prestamo }}</td>
							<td>{{ $prestamo->comprobante_cod_archivo }}</td>
							<td>{{ $prestamo->persona_dip }}</td>
							<td>{{ $prestamo->unidad }}</td>
							<td>{{ $prestamo->fecha_devolucion }}</td>
							<td>{{ $prestamo->observacion }}</td>
							</tr>
							</tbody>
							<?php $con++; ?>
							@elseif($prestamo->fecha_devolucion != "0000-00-00" && $e == "devuelto")
								<tr align="center">
								<!--<td>{{ $prestamo->id }}</td>-->
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
								@if($prestamo->fecha_devolucion == '0000-00-00')
									<tr align="center" bgcolor="F1948A">
								@elseif($prestamo->fecha_devolucion != '0000-00-00')
									<tr align="center">
								@endif
								<!--<td>{{ $prestamo->id }}</td>-->
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
			</tr>
			</tbody>
			<p>NO EXISTEN REGISTROS EN EL PERIODO DADO</p>
		@elseif($con > 0)
			<p>REGISTROS DEL PERIODO DADO SON  {{$con}}</p>
		@endif
</table>
<center>
    <br><br><br><strong>____________</strong><br>
    <strong>Responsable</strong>
</center>
</body>
</html>