@extends("maestra")
@section("titulo", "Productos")
@section("contenido")
    <div class="row">
        <div class="col-12">
            <h1>Productos <i class="fa fa-box"></i></h1>
            <a href="{{route("productos.create")}}" class="btn btn-success mb-2">Agregar</a>
            @include("notificacion")
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Código de barras</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Precio de compra</th>
                        <th scope="col">Precio de venta</th>
                        <th scope="col">Utilidad</th>
                        <th scope="col">Existencia</th>

                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($productos as $producto)
                        <tr>
                            <td>{{$producto->codigo_barras}}</td>
                            <td>{{$producto->descripcion}}</td>
                            <td>{{$producto->precio_compra}}</td>
                            <td>{{$producto->precio_venta}}</td>
                            <td>{{$producto->precio_venta - $producto->precio_compra}}</td>
                            <td>{{$producto->existencia}}</td>
                            <td>
                                <a class="btn btn-warning" href="{{route("productos.edit",[$producto])}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{route("productos.destroy", [$producto])}}" method="post">
                                    @method("delete")
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
        </div>
    </div>
@endsection
