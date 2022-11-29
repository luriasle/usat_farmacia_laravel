<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{env("APP_NAME")}}">
    <meta name="author" content="Parzibyte">
    <title>@yield("titulo") - {{env("APP_NAME")}}</title>
    <link href="{{url("/css/bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{url("/css/all.min.css")}}" rel="stylesheet">
    <style>

/* hover dropdown menus */
@media only screen and (max-width: 991px) {
    .navbar-hover .show > .dropdown-toggle::after{
        transform: rotate(-90deg);
    }
}
@media only screen and (min-width: 992px) {
    .navbar-hover .collapse ul li{position:relative;}
    .navbar-hover .collapse ul li:hover> ul{display:block}
    .navbar-hover .collapse ul ul{position:absolute;top:100%;left:0;min-width:250px;display:none}
    .navbar-hover .collapse ul ul ul{position:absolute;top:0;left:100%;min-width:250px;display:none}
}
    </style>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-hover">
    <a class="navbar-brand" href="#">{{env("APP_NAME")}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHover" aria-controls="navbarDD" aria-expanded="false" aria-label="Navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{route("home")}}">Inicio &nbsp;<i class="fa fa-home"></i><span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Registro
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route("productos.index")}}">Productos</a></li>
                    <li><a class="dropdown-item" href="{{route("clientes.index")}}">Clientes</a></li>
                    <li><a class="dropdown-item" href="#">Empleados</a></li>
                    <li><a class="dropdown-item" href="#">Proveedores</a></li>
                    <li><a class="dropdown-item" href="#">Presentación</a></li>
                    <li><a class="dropdown-item" href="#">Laboratorios</a></li>
                    <li><a class="dropdown-item" href="#">Comprobantes</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Movimiento
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Compras</a></li>
                    <li><a class="dropdown-item" href="#">Ventas</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<main class="container-fluid">
    @yield("contenido")
</main>

<footer class="px-2 py-2 fixed-bottom bg-dark">
    <span class="text-muted">Sistema de farmacia en Laravel</span>
</footer>

    </body>
</html>
