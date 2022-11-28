@extends("maestra")
@section("titulo", "Clientes")
@section("contenido")
    <div class="row">
        <div class="col-12">
            <h1>Clientes <i class="fa fa-users"></i></h1>
            <a href="{{route("clientes.create")}}" class="btn btn-success mb-2">Agregar</a>
            @include("notificacion")
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Teléfono</th>

                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clientes as $cliente)
                        <tr>
                            <td>{{$cliente->nombre}}</td>
                            <td>{{$cliente->telefono}}</td>
                            <td>
                                <a class="btn btn-warning" href="{{route("clientes.edit",[$cliente])}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{route("clientes.destroy", [$cliente])}}" method="post">
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
