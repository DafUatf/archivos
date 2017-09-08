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
<h1 class="title-pg"><center>Reporte General de Prestamos</center></h1><br>
<h1 class="title-pg"><center>Informe Realizado al {{$day}} de {{$month["value"]}} del {{$year}}</center></h1><br>
<img src="assets/img/uatf.jpg">
<table align="center">
		<tr align="center" bgcolor="c0c0c0">
			<th>FECHA PRESTAMO</th>
			<th>CODIGO COMPROBANTE</th>
			<th>DIP</th>
			<th>UNIDAD</th>
			<th>FECHA DEVOLUCION</th>
			<th>Observaciones Prestamo|Devolucion</th>
		</tr>
		@foreach($pres as $p)
		@if($p->fecha_devolucion == '0000-00-00')
			<tr align="center" bgcolor="f92929">
		
			<td>{{$p->fecha_prestamo}}</td>
			<td>{{$p->comprobante_cod_archivo}}</td>
			<td>{{$p->persona_dip}}</td>
			<td>{{$p->unidad}}</td>
			<td>{{$p->fecha_devolucion}}</td>
			<td>{{ $p->observacion }}</td>
		</tr>
		@elseif($p->fecha_devolucion != '0000-00-00')
			<tr align="center">
			<td>{{$p->fecha_prestamo}}</td>
			<td>{{$p->comprobante_cod_archivo}}</td>
			<td>{{$p->persona_dip}}</td>
			<td>{{$p->unidad}}</td>
			<td>{{$p->fecha_devolucion}}</td>
			<td>{{ $p->observacion }}</td>
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