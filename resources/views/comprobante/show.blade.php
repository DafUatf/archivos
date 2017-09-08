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
	<a href="{{route('comprobante.index')}}"><span class="glyphicon glyphicon-triangle-left ">Volver</span></a><br>
	<center> ¿Desea Eliminar el Registro del Comprobante : <i><strong>{{$compro->cod_archivo}} ?</strong></i></h1></center><br>
	<h2>DATOS</h2><br>
	<p><strong>Numero de Comprobante: </strong>{{$compro->id}}</p>
	<p><strong>Fecha de Despacho: </strong>{{$compro->fecha_despacho}}</p>
	<p><strong>Gestion: </strong>{{$compro->gestion}}</p>
	<h4><i><p><strong>Codigo de Archivo: </strong>{{$compro->cod_archivo}}</p></i></h4>
	<p><strong>Tipo archivo: </strong>{{$compro->tipo_archivo}}</p>
	<p><strong>fecha de Recepcion: </strong>{{$compro->fecha_recepcion}}</p>
	<hr>
	{!! Form::open(['route'=>['comprobante.destroy', $compro->id], 'method'=>'DELETE']) !!}
		{!! Form::submit(" Eliminar comprobante: $compro->cod_archivo", ['class'=>'btn btn-danger']) !!}
	{!! Form::close() !!}
	<h1 class="title-pg">
	<a href="{{route('comprobante.index')}}" class="btn btn-warning"><span class="glyphicon glyphicon-floppy-remove"></span> Cancelar</a>
    </h1>
@endsection