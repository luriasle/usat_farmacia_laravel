@extends("maestra")
@section("titulo", "Agregar producto")
@section("contenido")
    <div class="row">
        <div class="col-12">
            {{-- <h1>Agregar producto</h1> --}}
            <div class="card">
                <div class="card-header">
                    Agregar Producto
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route("productos.store")}}">
                        @csrf
                        <div class="form-row">
                          <div class="form-group col-md-4">
                            <label for="descripcion">Descripción</label>
                            <input required type="text" class="form-control" name="descripcion" placeholder="Descripción">
                          </div>
                          <div class="form-group col-md-4">
                            <label for="laboratorio">Laboratorio</label>
                            <select name="laboratory_id" class="form-control">
                                <option value="1">PHARMA</option>
                                <option value="2">ELIFARMA</option>
                            </select>
                          </div>
                          <div class="form-group col-md-4">
                            <label for="presentation">Presentación</label>
                            <select name="presentation_id" class="form-control">
                                <option value="1">Aerosol</option>
                                <option value="2">Capsula</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="registro_sanitario">Registro Sanitario</label>
                                <input required name="registro_sanitario" class="form-control" type="text" placeholder="Registro Sanitario">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="fecha_vencimiento">F. Vencimiento</label>
                                <input required name="fecha_vencimiento" class="form-control" type="text" placeholder="F. Vencimiento">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="stock">Stock</label>
                                <input required name="stock" class="form-control" type="text" placeholder="Stock">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="costo">Costo</label>
                                <input required name="costo" class="form-control" type="text" placeholder="Costo">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="precio_venta">Precio Venta</label>
                                <input required name="precio_venta" class="form-control" type="text" placeholder="Precio Venta">
                            </div>
                        </div>

                        @include("notificacion")
                        <button class="btn btn-success">Guardar</button>
                        <a class="btn btn-primary" href="{{route("productos.index")}}">Volver al listado</a>

                      </form>
                </div>
            </div>
        </div>
    </div>
@endsection
