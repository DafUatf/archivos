@extends('templade')

@section('content')
<p align="right"><?php echo date('l j \of F Y H:i:s');?></p>

@if(Session::has('sms'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{Session::get('sms')}}
    </div>
@endif
<h1 class="title-pg"><a href="{{route('comprobante.index')}}"><span class="glyphicon glyphicon-triangle-left ">Volver</span></a>
<center>Lista de Prestamos Efectuados</center></h1><br>

<h2><strong>Busqueda Automatica</strong></h2>
    {!! Form::open(['route'=>'prestamo.index', 'method'=>'GET', 'class'=>'navbar-form navbar-left', 'role'=>'search']) !!}
    <div class="form-group">
        {!! Form::text('name', null,['id'=>'search-box','class' => 'form-control', 'placeholder'=>'Buscar codigo(Mayusculas)']) !!}
    </div>
    {!! Form::close() !!}



<div class="form-group" align="right">
			<a href="{{url('prestamo/create')}}" class="btn btn-info btn-add"><span class="glyphicon glyphicon-erase"></span> Registrar Prestamo</a>
			<a href="{{url('reporteprestamo/create')}}" class="btn btn-info btn-add"><span class="glyphicon glyphicon-list-alt"></span> Generar Reporte de Prestamos</a>
		</div>
<table class="table table-striped" id="table">
	<tr align="center" >
		<!--<td width="20px"><STRONG>NUMERO<br>REGISTRO</STRONG></td>-->
		<td><STRONG>FECHA<br>PRESTAMO</STRONG></td>
		<td><STRONG>CODIGO ARCHIVO</STRONG></td>
		<td><STRONG>DOCUMENTO DE IDENTIFICACION <BR>PERSONAL(dip)</STRONG></td>
		<td><STRONG>UNIDAD</STRONG></td>
		<td><STRONG>FECHA<br>DEVOLUCION</STRONG></td>
		<td><STRONG>OBSERVACIONES<br>PRESTAMO || DEVOLUCION</STRONG></td>
		<td width="100px"><STRONG>ACCION</STRONG></td>
	</tr>
	<tbody>
	@foreach($prestamos as $prestamo)
	<tr align="center">
		<!--<td><center>{{ $prestamo->id }}</center></td>-->
		<td>{{ $prestamo->fecha_prestamo }}</td>
		<td>{{ $prestamo->comprobante_cod_archivo }}</td>
		<td>{{ $prestamo->persona_dip }}</td>
		<td>{{ $prestamo->unidad }}</td>
		<td>{{ $prestamo->fecha_devolucion }}</td>
		<td>{{ $prestamo->observacion }}</td>
		<td>
			<a href='{{url("/prestamo/{$prestamo->id}/edit")}}' class="action edit"><span class="glyphicon glyphicon-refresh"></span></a>
			<a href="{{route('prestamo.show', $prestamo->id)}}" class="action delete"><span class="glyphicon glyphicon-trash"></span></a>
		</td>
	</tr>
	</tbody>
	@endforeach
</table>
<div class="row text-center">{{ $prestamos->links() }}</div>
@endsection

@section('script')

    <script>
        $(document).ready(function(){
            $('#search-box').keyup(function(){
                var texto=$(this).val();
                $('.table tbody tr').hide();
                $('.table tbody').find('tr').each(function(){
                    if($(this).children('td').eq(1).text().search(texto)>=0)
                            $(this).show();
                });
            });
        });
    </script>

@stop