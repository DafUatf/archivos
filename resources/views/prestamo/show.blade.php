@extends('templade')
@section('content')
@if( isset($errors) && count($errors) > 0)
<div class="alert alert-danger">
	@foreach($errors->all() as $error)
		<p>{{$error}}</p>
	@endforeach
</div>
@endif
<h1 class="title-pg">
	<a href="{{route('prestamo.index')}}"><span class="glyphicon glyphicon-triangle-left "></span></a>
	Quiere Eliminar el Registro del Prestamo: <i><strong>{{$presta->comprobante_cod_archivo}}</strong></i></h1><br>
	<h2>DATOS</h2><br>
	<p><strong><u>Numero de Prestamo:</u> </strong>{{$presta->id}}</p>
	<p><strong><u>Fecha de Prestamo:</u> </strong>{{$presta->fecha_prestamo}}</p>
	<p><strong><u>Codigo Archivo:</u> </strong>{{$presta->comprobante_cod_archivo}}</p>
	<p><strong><u>Documento de Identificacion Personal:</u> </strong>{{$presta->persona_dip}}</p>
	<p><strong><u>Unidad:</u> </strong>{{$presta->unidad}}</p>
	<p><strong><u>Fecha de Devolucion:</u> </strong>{{$presta->fecha_devolucion}}</p>
	<p><strong><u>Observaciones: PRESTAMO | DEVOLUCION</u> </strong>{{$presta->observacion}}</p>
	<hr>
	{!! Form::open(['route'=>['prestamo.destroy', $presta->id], 'method'=>'DELETE']) !!}
		{!! Form::submit(" Eliminar prestamo: $presta->comprobante_cod_archivo", ['class'=>'btn btn-danger']) !!}
	{!! Form::close() !!}
	<h1 class="title-pg">
	<a href="{{route('prestamo.index')}}" class="btn btn-warning"><span class="glyphicon glyphicon-floppy-remove"></span> Cancelar</a>
    </h1>
@endsection