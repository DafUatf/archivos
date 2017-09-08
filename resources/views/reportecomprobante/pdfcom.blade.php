<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Comprobantes</title>
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
Reporte de Comprobantes</center></h1>
<h1 class="title-pg"><center>Consulta Realizada al: {{$day}} de {{$month["value"]}} del {{$year}}</center></h1><br> 	
<img src="assets/img/uatf.jpg">
<table class="table table-striped" id="table">
	<tr align="center" >
		<!--<td width="20px"><strong>Numero<br>Registro</strong></td>-->
		<td><h4>FECHA DESPACHO</h4></td>
		<td><h4>GESTION COMPROBANTE</h4></td>
		<td><h4>CODIGO ARCHIVO</h4></td>
		<td><h4>TIPO ARCHIVO</h4></td>
		<td><h4>FECHA RECEPCION</h4></td>
	</tr>
	<tbody>
	<?php $con=0;?>
		@foreach($compro as $c)
				@if($c->fecha_despacho >= $a && $c->fecha_despacho <= $b)
					@if($c->fecha_recepcion == '')
						<tr align="center" bgcolor="f92929">
							<td>{{$c->fecha_despacho}}</td>
							<td>{{$c->gestion}}</td>
							<td>{{$c->cod_archivo}}</td>
							<td>{{$c->tipo_archivo}}</td>
							<td>{{$c->fecha_recepcion}}</td>
						</tr>
						</tbody>
						<?php $con++; ?>
					@elseif($c->fecha_recepcion != '')
						<tr align="center">
						<!--<td>{{ $c->id }}</td>-->
						<td>{{ $c->fecha_despacho }}</td>
						<td>{{ $c->gestion }}</td>
						<td>{{ $c->cod_archivo }}</td>
						<td>{{ $c->tipo_archivo }}</td>
						<td>{{ $c->fecha_recepcion }}</td>
						</tr>
						</tbody>
						<?php $con++; ?>
					@endif
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