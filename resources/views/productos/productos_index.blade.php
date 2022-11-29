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
                        <th scope="col">Presentación</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Costo</th>
                        <th scope="col">Venta</th>
                        <th scope="col">Vencimiento</th>
                        <th scope="col">Registro Sanitario</th>
                        <th scope="col">Laboratorio</th>
                        <th scope="col">Estado</th>

                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($productos as $producto)
                        <tr>
                            <td>{{$producto->presentation->descripcion}}</td>
                            <td>{{$producto->descripcion}}</td>
                            <td>{{$producto->stock}}</td>
                            <td>{{$producto->costo}}</td>
                            <td>{{$producto->precio_venta}}</td>
                            <td>{{$producto->fecha_vencimiento}}</td>
                            <td>{{$producto->registro_sanitario}}</td>
                            <td>{{$producto->laboratory->nombre}}</td>
                            <td>{{$producto->estado}}</td>
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
