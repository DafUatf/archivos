@extends('templade')

@section('content')

@if(Session::has('sms'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{Session::get('sms')}}
    </div>
@endif
<p align="right"><?php echo date('l j \of F Y H:i:s');?></p>
<h1 class="title-pg">
	<a href="{{route('prestamo.index')}}"><span class="glyphicon glyphicon-triangle-left ">Volver</span></a><br>
	<center> Consulta de Reporte de Prestamos a partir de : <span class="glyphicon glyphicon-edit"></span> <i><strong> Fechas </strong></i>
</center></h1>

@if( isset($errors) && count($errors) > 0)
<div class="alert alert-danger">
	@foreach($errors->all() as $error)
		<p>{{$error}}</p>
	@endforeach
</div>
@endif
<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-default">
	<div class="panel-heading">Consulta de Reporte Prestamos</div>
    	<div class="panel-body">	
    	<!--AQUI SE ENVIA LAS FECHAS DE LA CONSULTA-->
			<form class="form-horizontal" role="form" method="POST" action='{{ route("reporteprestamo.index") }}'>
		        {{ csrf_field() }}

				<div class="form-group">
					<label for="consulta" class="col-md-4 control-label">Generar Reporte</label>
			        <div class="col-md-6">
					            {!! Form::select('consulta',[''=>'Seleccione un operacion','1'=>'Rango de Fechas', '2'=>'fecha de prestamo', '3'=>'Fecha de Devolucion', '4'=>'Consulta por Devoluciones'], null,['class'=>'form-control', 'onchange'=>'Cambio(this);', 'required'=>'true'])!!}
			            </div></div>
				<div class="form-group">
		            <p align="center">Consulta por Rango de Fechas</p>
		            <label for="fe_ini" class="col-md-4 control-label">Fecha Inicio</label>
		            <div class="col-md-6">
		            	{!! Form::text('fecha_inicio', null, ['class'=>'form-control', 'autofocus', 'disabled', 'placeholder'=>'aaaa-mm-dd', 'required'=>'true', 'id'=>'fecha_inicio'])!!}
		            </div>
		            <label for="fe_fin" class="col-md-4 control-label">Fecha Final</label>
		            <div class="col-md-6">
		                <input id="fecha_final" type="text" class="form-control" name="fecha_final" autofocus disabled placeholder="aaaa-mm-dd" required>
		            </div>
		        </div>
		        <div class="form-group">
		            <p align="center">Consulta por fecha de Registros</p>
		            <label for="fe_pre" class="col-md-4 control-label">Fecha de Prestamo</label>
		            <div class="col-md-6">
		                <input id="fecha_pre" type="text" class="form-control" name="fecha_pre" autofocus disabled placeholder="aaaa-mm-dd" required>
		            </div>
		            <label for="fe_dev" class="col-md-4 control-label">Fecha Devolucion</label>
		            <div class="col-md-6">
		                <input id="fecha_dev" type="text" class="form-control" name="fecha_dev" autofocus disabled placeholder="aaaa-mm-dd" required>
		            </div>
		        </div>
                <div class="form-group">
		            <p align="center">Consulta por Estado</p>
		            <label for="fe_pres" class="col-md-4 control-label">Estado</label>
		            <div class="col-md-6">
				       
				            <select name="tipo" id="tipo" class="form-control" disabled required>
								<option value="">-------Elija una Opcion-------</option>
								<option value="devuelto">Devueltos</option>
								<option value="nodevuelto" class="form-control">No Devueltos</option>
							</select>

		            </div>

		            

		        </div>
		        <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-list-alt"></span> Generar Reporte</button>
						
                </div>
		    </form>
		    <form class="form-horizontal" role="form" method="GET" action='{{ url("pdfgeneral") }}'>
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
        $('#fecha_pre').datepicker({  
                format: "yyyy-mm-dd",   
                language: "es",
            });
        $('#fecha_dev').datepicker({  
                format: "yyyy-mm-dd",   
                language: "es",
            });
    </script>

@section('script')
    <script>
    	/*$("#myselect").change(function(){
    		var a=$(this).val();
    		//alert(a);
    		//alert($(this).val());
    		//APARTIR DE AKI PUEDO CONDICIONAR
    		if(a=='1'){
                	//alert(a);
                    document.getElementById("fe_pre").disabled=false;
                    document.getElementById("fe_dev").disabled=true;
                    document.getElementById("tipo").disabled=false;
                    document.getElementById("fecha_inicio").disabled=true;
                    document.getElementById("fecha_final").disabled=false;
                }
    	});*/

    	/*function getNewVal(item)
		{
		    alert(item.value);
		}*/
		
        function Cambio(valor){

			if(valor.value!="0"){	
				valor.form.fecha_inicio.disabled = true;
				valor.form.fecha_final.disabled = true;
				valor.form.fecha_pre.disabled = true;
				valor.form.fecha_dev.disabled = true;
				valor.form.tipo.disabled = true;
				valor.form.fecha_inicio.value = "";
				valor.form.fecha_final.value = "";
				valor.form.fecha_pre.value = "";
				valor.form.fecha_dev.value = "";
				valor.form.tipo.value = "";
			}
			if(valor.value == "1"){
				valor.form.fecha_inicio.disabled = false;
				valor.form.fecha_final.disabled = false;
				valor.form.fecha_pre.disabled = true;
				valor.form.fecha_dev.disabled = true;
				valor.form.tipo.disabled = true;
			}
			if(valor.value == "2"){
				valor.form.fecha_inicio.disabled = true;
				valor.form.fecha_final.disabled = true;
				valor.form.fecha_pre.disabled = false;
				valor.form.fecha_dev.disabled = true;
				valor.form.tipo.disabled = true;
			}
			if(valor.value == "3"){
				valor.form.fecha_inicio.disabled = true;
				valor.form.fecha_final.disabled = true;
				valor.form.fecha_pre.disabled = true;
				valor.form.fecha_dev.disabled = false;
				valor.form.tipo.disabled = true;
				//valor.form.fecha_inicio.value = "";
				//valor.form.fecha_final.value = "";
			}
			if(valor.value == "4"){
				valor.form.fecha_inicio.disabled = true;
				valor.form.fecha_final.disabled = true;
				valor.form.fecha_pre.disabled = true;
				valor.form.fecha_dev.disabled = true;
				valor.form.tipo.disabled = false;

			}
		}
      
    </script>
@stop



@endsection

