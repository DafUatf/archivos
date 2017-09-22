@extends('templade')
@section('content')
<p align="right"><?php echo date('l j \of F Y H:i:s');?></p>
<h1 class="title-pg"><center><STRONG>SISTEMA DE ARCHIVOS<BR><H3>REGISTRO DE ARCHIVOS</H3></STRONG></center></h1><br>

	
<div class="row" >

<!-----------------PARTE DE CARPETAS ------------------------------------------------------ -->  
  <div class="col-md-6" style="background-color:white"> CARPETAS<br>
<div class="dropdown">
  <button class="btn btn-secondary btn-s dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    +
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <!-- Button trigger modal de CARPETAS-->
           <button type="button" class="btn btn-primary btn-s" data-toggle="modal" data-target="#myModal">
             Carpeta /Folder
           </button><br>..............................................<br>
    <!-- Button trigger modal de ARCHIVOS-->
          <button type="button" class="btn btn-primary btn-s" data-toggle="modal" data-target="#myModal">
           Archivo
          </button>
    
  </div>
</div>
  </div>


     <div class="col-md-6"  style="background-color:#EAF2F8" >Vista <br>


<!-- Modal -->
     <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   <h4 class="modal-title" id="myModalLabel">Nuevo Comprobante</h4>
              </div>
              <div class="modal-body">
 <!-- Parte del formulario -->      
                 <form>
                    <div class="form-group">
                        <label for="exampleInputName2">Detalle</label>
                             <input type="text" class="form-control" id="exampleInputName2" placeholder="nombre de la carpeta que contendra el archivo">
                    </div>
                  <div class="form-group">
                      <label for="Select">Tipo</label>
                        <select id="Select" class="form-control">
                          <option>RC2</option>
                        </select>
                  </div>
                       <div class="form-group">
                          <label for="exampleInputFile">Buscar imagen</label>
                             <input type="file" id="exampleInputFile">
                 
                       </div>
             
                 </form>

              </div>
                 <div class="modal-footer">
                   <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                   <button type="button" class="btn btn-primary">Guardar</button>
                 </div>
          </div>
       </div>
     </div>
<!--------------- Parte de ARCHIVO ------------------------------------------------------ -->

<!-- Button trigger modal -->


<!-- Modal -->
     <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   <h4 class="modal-title" id="myModalLabel">Adjuntar Archivo</h4>
              </div>
              <div class="modal-body">
 <!-- Parte del formulario -->      
                 <form>
                    <div class="form-group">
                        <label for="exampleInputName2">Titulo</label>
                             <input type="text" class="form-control" id="exampleInputName2" placeholder="nombre de la carpeta que contendra el archivo">
                    </div>
              
                       <div class="form-group">
                          <label for="exampleInputFile">Buscar imagen</label>
                             <input type="file" id="exampleInputFile">
                 
                       </div>
             
                 </form>

              </div>
                 <div class="modal-footer">
                   <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                   <button type="button" class="btn btn-primary">Guardar</button>
                 </div>
          </div>
       </div>
     </div>


     </div>
</div>






<!--ARBOL TREE DE ARCHIVOS  ...................-->

    <script>
//Parte del modal del formulario---------------------
 $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})

 //Parte del modal del Arbol ------------------------

 //Esta parte es del boton de mas para Carpeta y Archivos
$('.dropdown-toggle').dropdown()

     $(function () {
  $('[data-toggle="popover"]').popover()
})
    </script>

@endsection


