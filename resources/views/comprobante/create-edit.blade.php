@extends('templade')
@section('content')
@if(Session::has('sms'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{Session::get('sms')}}
    </div>
@endif
<h1 class="title-pg">
	<a href="{{route('comprobante.index')}}"><span class="glyphicon glyphicon-triangle-left ">Volver</span></a><br>
	<center> Registro de Recepcion de Comprobante : <span class="glyphicon glyphicon-edit"></span> <i><strong> {{$com->cod_archivo or 'Nuevo'}}</strong></i></center>
</h1>
<h4>(*) DATOS OBLICATORIOS</h4>
@if( isset($errors) && count($errors) > 0)
<div class="alert alert-danger">
	@foreach($errors->all() as $error)
		<p>{{$error}}</p>
	@endforeach
</div>
@endif
@if( isset($com))
{!! Form::model($com, ['route' => ['comprobante.update', $com->id], 'class '=> 'form', 'method' => 'put']) !!}
			{!! method_field('PUT')!!}
@else
 {!! Form::open(['route'=>'comprobante.store', 'class'=>'form']) !!}
@endif
	{{csrf_field()}}
	<div class="form-group date">
		<!--en esta parte nos permite ingresar los datos de la de==fecha de despacho ademas de recuperar los datos si se trata de una modificacion-->
		{{ Form::label('fecha_despacho', 'Fecha de Despacho(*)', ['class' => 'control-label']) }}
		{!! Form::text('fecha_despacho', null, ['class'=>'form-control', 'placeholder' => 'aaaa-mm-dd', 'required'=>'true', 'id'=>'fecha']) !!}
	</div>
	<div class="form-group">
		{{ Form::label('gestion', 'Gestion del Comprobante(*)', ['class' => 'control-label']) }}
		{!! Form::number('gestion', null, ['class'=>'form-control', 'placeholder' => 'Gestion(2017)', 'required'=>'true']) !!}
	</div>
	<div class="form-group">
		{{ Form::label('cod_archivo', 'Codigo de Archivo(*)', ['class' => 'control-label']) }}
		{!! Form::text('cod_archivo', null, ['class'=>'form-control', 'placeholder' => 'Codigo Archivo', 'required'=>'true']) !!}
	</div>
	<div class="form-group">
		 <!--esta nos permite recuperar la seleccion ademas de recuperar lo que ya se ingreso anteriormente en el caso de que sea una modificacion-->
		{{ Form::label('tipo_archivo', 'Tipo de Archivo(*)', ['class' => 'control-label']) }}
		<select name="tipo_archivo" class="form-control" required>
			<option value="">Escoja el Tipo Archivo</option>
			@foreach($tipo_archivos as $tipo)
				<option value="{{$tipo}}" class="form-control"
						@if( isset($com) && $com->tipo_archivo == $tipo )
							selected
						@endif
				>{{$tipo}}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		{{ Form::label('fecha_recepcion', 'Fecha de recepcion', ['class' => 'control-label']) }}
		{!! Form::text('fecha_recepcion', null, ['class'=>'form-control', 'placeholder' => 'aaaa-mm-dd', 'id'=>'f-rec']) !!}
	</div>
	{!! Form::submit('Registrar', ['class'=>'btn btn-info'])!!}
<!-- Esta parte es del modulo de archivos el boton-->
<a href="{{url('archivos')}}" class="btn btn-info btn-add"><span class="glyphicon glyphicon-tasks"></span> Siguiente</a>

	<h1 class="title-pg">
	<a href="{{route('comprobante.index')}}" class="btn btn-warning"><span class="glyphicon glyphicon-floppy-remove"></span> Cancelar</a>
    </h1>
</h1>
    <script>
        $('#fecha').datepicker({  
                format: "yyyy-mm-dd",   
                language: "es",
            });
        $('#f-rec').datepicker({  
                format: "yyyy-mm-dd",   
                language: "es",
            });
    </script>
{!! Form::close() !!}
@endsection

