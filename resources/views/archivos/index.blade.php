@extends('templade')
@section('content')
<p align="right"><?php echo date('l j \of F Y H:i:s');?></p>
<h1 class="title-pg"><center><STRONG>SISTEMA DE ARCHIVOS<BR><H3>REGISTRO DE ARCHIVOS</H3></STRONG></center></h1><br>
    <script src="js/easyTree.js"></script>
     <link href="/css/treeview.css" rel="stylesheet">
   
<div class="col-md-11">
     <div class="easy-tree">
        <ul>
            <li>Example 1</li>
            
               </ul>
            </li>
            
        </ul>
    </div>
</div>
<script>
    (function ($) {
        function init() {
            $('.easy-tree').EasyTree({
                addable: true,
                editable: true,
                addable2: true,
                drop:true,
            });
        }

        window.onload = init();
    })(jQuery)
</script>



@endsection