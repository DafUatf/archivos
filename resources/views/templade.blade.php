<!DOCTYPE html>
<html>
<head>
	<title>{{$title or 'Sistema Archivos'}}</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
    <link rel="stylesheet" type="text/css" href="{{url('assets/panel/css/style.css')}}">
	{!!Html::style('assets/css/estilo.css')!!}
	<!--ESTOS 4 COMPONENTES AYUDAN A EL USO DE DATEPICKER .. CALENDARIO-->
	{!!Html::script('http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js')!!}

    {!!Html::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js')!!}
    {!!Html::script('assets/datepicker/js/bootstrap-datepicker.min.js')!!}
    {!!Html::script('assets/datepicker/locales/bootstrap-datepicker.es.min.js')!!}
    {!!Html::style('assets/datepicker/css/bootstrap-datepicker.css')!!}
	<style>
        body {background: #85929E;}
    </style>
	<style>
            html, body {
                background-color: #AEB6BF;
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
            p{
                color: #125465;
                background-color: #aaaaa0;
                font-family: comic, sans-serif;
                font-weight:bold;
               font-style:italic;
               line-height:10px;
               text-indent:30px;

}
            .datepicker {color: #2980B9;}
        </style>

</head>
<body>
	<div class="container">
		<nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Sistema Archivos - Inicio
                    </a>
                    {{--<a class="navbar-brand" href="{{ url('/register') }}">Registro de Usuario</a>--}}
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <!--<li><a href="{{ url('/register') }}">Registro</a></li>-->
                        @else
                                <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Cerrar Sesion
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                </li>
                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="glyphicon glyphicon-user"></span>
                                </a>
                                </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>


		@yield('content')

	</div>

	{!!Html::script('assets/js/jquery.js')!!}
    {!!Html::script('assets/js/bootstrap.min.js')!!}

<footer><p>copyright - uatf.edu.bo   Derechos Recervados</p> <p>Direccion Administrativa Financiera -- Sistema de Archivos</p></footer>
    @yield('pie')
    @yield('script')
</body>
</html>