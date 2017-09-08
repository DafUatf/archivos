@extends('templade')
@section('content')
<!--SALEN LOS MENSAJES-->
@if(Session::has('sms'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{Session::get('sms')}}
    </div>
@endif
<p align="right"><?php echo date('l j \of F Y H:i:s');?></p>
<h1 class="title-pg">
	<a href="{{route('comprobante.index')}}"><span class="glyphicon glyphicon-triangle-left ">Volver</span></a><br>
	<center> Consulta de Reporte que se Generara a partir de : <span class="glyphicon glyphicon-edit"></span> <i><strong> Fechas </strong></i></center>
</h1>
@if( isset($errors) && count($errors) > 0)
<div class="alert alert-danger">
	@foreach($errors->all() as $error)
		<p>{{$error}}</p>
	@endforeach
</div>
@endif
<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-default">
	<div class="panel-heading">Consulta de Reporte</div>
    	<div class="panel-body">	
    	<!--AQUI SE ENVIA LAS FECHAS DE LA CONSULTA-->
			<form class="form-horizontal" role="form" method="POST" action='{{ route("reportecomprobante.store") }}'>
		        {{ csrf_field() }}
				<div class="form-group">
		            <label for="fe_ini" class="col-md-4 control-label">Fecha Inicio</label>
		            <div class="col-md-6">
		            	{!! Form::text('fecha_inicio', null, ['class'=>'form-control', 'required', 'autofocus', 'placeholder'=>'aaaa-mm-dd', 'id'=>'fecha_inicio'])!!}
		            </div>
		            <label for="fe_fin" class="col-md-4 control-label">Fecha Final</label>
		            <div class="col-md-6">
		                <input id="fecha_final" type="text" class="form-control" name="fecha_final" required autofocus placeholder="aaaa-mm-dd">
		            </div>
		        </div>
		        <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-list-alt"></span> Generar Reporte</button>
                </div>
		    </form>
		    <form class="form-horizontal" role="form" method="GET" action='{{ url("pdfgral") }}'>
		   				<div class="col-md-8 col-md-offset-4">						
                
                        	<button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-list-alt"></span> Imprimir Reporte General</button>
                		</div>
            </form>
		</div>
</div>
</div>
 <script>
        $('#fecha_inicio').datepicker({  
                format: "yyyy-mm-dd",   
                language: "es",
            });
        $('#fecha_final').datepicker({  
                format: "yyyy-mm-dd",   
                language: "es",
            });
    </script>
@endsection
