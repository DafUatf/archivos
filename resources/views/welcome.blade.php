<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sistema Archivos</title>
        {!!Html::script('assets/js/jquery.js')!!}
        {!!Html::script('assets/js/bootstrap.min.js')!!}
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="{{url('assets/panel/css/style.css')}}">
        {!!Html::style('assets/css/estilo.css')!!}
        <!-- Styles //IMAGEN DE FONTO PAISAJE          https://newevolutiondesigns.com/images/freebies/city-wallpaper-18.jpg    
            IMAGEN DE ARCHIVOS PARTE SUPERIOR           http://www.infodf.org.mx/seminarioarchivos2015/imagenes/banner2.jpg
        -->

        <script src="assets/datepicker/js/bootstrap-datepicker.min.js"></script>
        <link rel="stylesheet" href="assets/datepicker/css/bootstrap-datepicker.css ">
        <style>
            html, body {
                background: url(http://www.infodf.org.mx/seminarioarchivos2015/imagenes/banner2.jpg) no-repeat fixed;;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            
        </style>
        <style>
        text {text-transform: uppercase;}
    </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ route('comprobante.index') }}">Ingresar</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <!--<a href="{{ url('/register') }}">Registro</a>-->
                    @endif
                </div>
            @endif
            <div class="content">
                <div class="title m-b-md">
                    <strong> BIENVENIDO !!!</strong>
                </div>
                <div class="title m-b-md">
                    <strong> SISTEMA DE INFORMACION</strong>
                </div>
                <div class="title m-b-md">
                    <strong><n>Unidad de Archivos</n></strong>
                </div>
                <div class="links">
                    <a href='{{ url("pdfgral") }}'>Reportes Gral. Comprobantes</a>
                    <a href='{{ url("pdfgeneral") }}'>Reportes Gral. Prestamos</a>
                </div>
            </div>
        </div>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
