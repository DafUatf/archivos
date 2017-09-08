@extends('templade')
@section('content')
<p align="right"><?php echo date('l j \of F Y H:i:s');?></p>
<h1 class="title-pg"><center><STRONG>SISTEMA DE ARCHIVOS<BR><H3>DETALLE DE COMPROBANTES</H3></STRONG></center></h1><br>
@if(Session::has('sms'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{Session::get('sms')}}
    </div>
@endif
<!--SE PUEDE UTILIZAR EL DIRECCIONAMIENTO DE href="{{route('comprobante.create')}}" ES IGUAL DE EFECTIVO PARA DIRECCIONAR Y MAS CORTO-->
	<h2><strong>Busqueda Automatica</strong></h2>
    {!! Form::open(['route'=>'comprobante.index', 'method'=>'GET', 'class'=>'navbar-form navbar-left', 'role'=>'search']) !!}
    <div class="form-group">
        {!! Form::text('name', null,['id'=>'search-box','class' => 'form-control', 'placeholder'=>'Buscar codigo(mayuscula)']) !!}
    </div>
    {!! Form::close() !!}
		<div class="form-group" align="right">
			<a href="{{url('comprobante/create')}}" class="btn btn-info btn-add"><span class="glyphicon glyphicon-erase"></span> Registrar Comprobante</a>
			<a href="{{url('reportecomprobante/create')}}" class="btn btn-info btn-add"><span class="glyphicon glyphicon-list-alt"></span> Generar Reporte</a>
			<a href="{{url('prestamo')}}" class="btn btn-info btn-add"><span class="glyphicon glyphicon-tasks"></span> Prestamos</a>
		</div>
<table class="table table-striped" id="table">
	<tr align="center" >
		<!--<td width="20px"><strong> NUMERO<br>COMPROBANTE</strong></td>-->
		<td><strong>FECHA<br>DESPACHO</strong></td>
		<td><strong>GESTION</strong></td>
		<td><strong>CODIGO<br>ARCHIVO</strong></td>
		<td><strong>TIPO<br>ARCHIVO</strong></td>
		<td><strong>FECHA<br>RECEPCION</strong></td>
		<td width="100px"><strong>ACCION</strong></td>
	</tr>
	<tbody>
	@foreach($comprobantes as $comprobante)
	<tr align="center">
		<!--<td><center>{{ $comprobante->id }}</center></td>-->
		<td>{{ $comprobante->fecha_despacho }}</td>
		<td>{{ $comprobante->gestion }}</td>
		<td>{{ $comprobante->cod_archivo }}</td>
		<td>{{ $comprobante->tipo_archivo }}</td>
		<td>{{ $comprobante->fecha_recepcion }}</td>
		<td>
			<a href='{{url("/comprobante/{$comprobante->id}/edit")}}' class="action edit"><span class="glyphicon glyphicon-refresh"></span></a>
			<a href="{{route('comprobante.show', $comprobante->id)}}" class="action delete"><span class="glyphicon glyphicon-trash"></span></a>
		</td>
	</tr>
	</tbody>
	@endforeach
</table>
<div class="row text-center">{{ $comprobantes->links() }}</div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('#search-box').keyup(function(){
                var texto=$(this).val();
                $('.table tbody tr').hide();
                $('.table tbody').find('tr').each(function(){
                    if($(this).children('td').eq(3).text().search(texto)>=0)
                            $(this).show();
                });
            });
        });
    </script>
@stop