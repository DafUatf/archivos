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
<h1 class="title-pg"><center>Reporte General de Comprobantes</center></h1><br>
<h1 class="title-pg"><center>Realizado al {{$day}} de {{$month["value"]}} del {{$year}}</center></h1><br>
<img src="assets/img/uatf.jpg">
<table align="center">
		<tr align="center" bgcolor="c0c0c0">
			<th>FECHA DESPACHO</th>
			<th><h4>GESTION ARCHIVO</h4></th>
			<th>CODIGO ARCHIVO</th>
			<th>TIPO ARCHIVO</th>
			<th>FECHA RECEPCION</th>
		</tr>
		@foreach($com as $c)
		@if($c->fecha_recepcion == '')
		<tr align="center" bgcolor="f92929">
			<td>{{$c->fecha_despacho}}</td>
			<td>{{$c->gestion}}</td>
			<td>{{$c->cod_archivo}}</td>
			<td>{{$c->tipo_archivo}}</td>
			<td>{{$c->fecha_recepcion}}</td>
		</tr>
		@elseif($c->fecha_recepcion != '')
		<tr align="center">
			<td>{{$c->fecha_despacho}}</td>
			<td>{{$c->gestion}}</td>
			<td>{{$c->cod_archivo}}</td>
			<td>{{$c->tipo_archivo}}</td>
			<td>{{$c->fecha_recepcion}}</td>
		</tr>
		@endif
		@endforeach
	</table>
	<center>
    <br><br><br><strong>____________</strong><br>
    <strong>Responsable</strong>
	</center>
	</body>
</html>