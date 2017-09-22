@extends('templade')
@section('content')
@if(Session::has('sms'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{Session::get('sms')}}
    </div>
@endif
<h1 class="title-pg">
	Registro de Prestamo de Archivos : <br>
	<a href="{{route('prestamo.index')}}"><span class="glyphicon glyphicon-triangle-left ">Volver</span></a>
	<span class="glyphicon glyphicon-edit"></span> <i><strong> {{$pres->comprobante_cod_archivo or 'Nuevo'}}</strong></i></h1>
</h1>
<h4>(*) DATOS OBLIGATORIOS</h4>
@if( isset($errors) && count($errors) > 0)
<div class="alert alert-danger">
	@foreach($errors->all() as $error)
		<p>{{$error}}</p>
	@endforeach
</div>
@endif
@if( isset($pres)) 
{!! Form::model($pres, ['route' => ['prestamo.update', $pres->id], 'class '=> 'form', 'method' => 'put']) !!}		
@else
 {!! Form::open(['route'=>'prestamo.store', 'class'=>'form']) !!}
@endif
	{{csrf_field()}}
	<div class="form-group">
		{{ Form::label('fecha_prestamo', 'Fecha de Prestamo (*)', ['class' => 'control-label']) }}
		{!! Form::text('fecha_prestamo', null, ['class'=>'form-control', 'required'=>'true', 'placeholder' => 'aaaa-mm-dd', 'id'=>'fecha_prestamo']) !!}
	</div>
	<div class="form-group">
		{{ Form::label('unidad', 'Unidad Solicitante (*)', ['class' => 'control-label', 'required'=>'true']) }}
		{!! Form::text('unidad', null, ['class'=>'form-control', 'placeholder' => 'Ingrese la unidad que Solicita el Prestamo', 'required'=>'true']) !!}
	</div>
	<div class="form-group">
		{{ Form::label('persona_dip', 'Documento de Identificacion Personal(Dip) (*)', ['class' => 'control-label', 'required'=>'true']) }}
		{!! Form::text('persona_dip', null, ['class'=>'form-control', 'placeholder' => 'registro personal', 'required'=>'true']) !!}
	</div>
	<div class="form-group">
		{{ Form::label('comprobante_cod_archivo', 'Codigo de Archivo (*)', ['class' => 'control-label', 'required'=>'true']) }}
		{{--{!!Form::text('comprobante_cod_archivo', null, ['class'=>'form-control', 'placeholder' => 'codigo del archivo', 'required'=>'true', 'autocomplete'])!!}--}}
		{!!Form::select('comprobante_cod_archivo', \App\Model\Comprobante::pluck('cod_archivo','cod_archivo'), ['class'=>'form-control', 'required'=>'true', 'autocomplete'])!!}
	</div>
	<div class="form-group">
		{{ Form::label('fecha_devolucion', 'Fecha de Devolucion(AÑO-MES-DIA)', ['class' => 'control-label']) }}
		{!! Form::text('fecha_devolucion', null, ['class'=>'form-control', 'placeholder' => 'aaaa-mm-dd', 'autocomplete'=>'true', 'id'=>'fecha_devolucion']) !!}
	</div>
	<div class="form-group">
		{{ Form::label('observacion', 'Observaciones del Prestamo', ['class' => 'control-label']) }}
		{!! Form::textarea('observacion', null, ['class'=>'form-control', 'placeholder' => 'introdusca un detalle de salida', 'rows'=>'2']) !!}
	</div>
	<div class="form-group">
		{{ Form::label('observacion2', 'Observaciones de la Recepcion', ['class' => 'control-label']) }}
		{!! Form::textarea('observacion2', null, ['class'=>'form-control', 'placeholder' => 'introdusca un detalle de la recepcion', 'rows'=>'2']) !!}
	</div>
	{!! Form::submit('Registrar', ['class'=>'btn btn-info'])!!}
	<h1 class="title-pg">
	<a href="{{route('prestamo.index')}}" class="btn btn-warning"><span class="glyphicon glyphicon-floppy-remove"></span> Cancelar</a>
    </h1>
</h1>
<script>
        $('#fecha_prestamo').datepicker({  
                format: "yyyy-mm-dd",   
                language: "es",
            });
        $('#fecha_devolucion').datepicker({  
                format: "yyyy-mm-dd",   
                language: "es",
            });
    </script>
{!! Form::close() !!}

@endsection