@extends('maestra')
@section("titulo", "Inicio")
@section('contenido')
<style>

.cards {
  width: 65%
  margin: 16px auto;
}

.title {
  font-weight: 700;
  font-size: 24px;
  text-transform: uppercase;
}

.image img {
    display: block;
    width: 65%;
    margin-left: auto;
    margin-right: auto;
}

button {
  padding: 4px 8px;
  color: #0e3f6e;
  border: 2px solid #0e3f6e;
  background-color: transparent;
}

.content {
  background-color: #edf4f7;
  padding: 24px 32px;
}

.card {
  display: inline-block;
  width: 32%;
  margin-right: 1%;
  margin-bottom: 16px;
  vertical-align: top;
}

/* Grid with Flex */
@supports (display: grid) {
  .cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    grid-gap: 16px;
    grid-auto-rows: 1fr;
  }

  /* to make background fill entire height */

  .card {
    width: auto;
    margin: 0;
    display: flex;
    flex-direction: column;
  }

/* Uncomment to make text same height */
.content {
    flex: 1;
    display: flex;
    flex-direction: column;
  }

  button {
    margin-top: auto;
  }
}

</style>
    {{-- <div class="col-12 text-center">
        <h1>Bienvenido, {{Auth::user()->name}}</h1>
    </div> --}}

    {{-- Creando el menu --}}
    @foreach(
        [
            ["productos", "ventas", "vender", "clientes", "usuarios", "acerca_de"]
        ] as $modulos
    )

        <div class="cards">
            @foreach($modulos as $modulo)
                <article class="card">
                <div class="image">
                    <img src="{{url("/img/$modulo.png")}}"/>
                </div>
                <div class="content">
                    <a href="{{route("$modulo.index")}}" class="btn btn-success">
                        Ir a&nbsp;{{$modulo === "acerca_de" ? "Acerca de" : ucwords($modulo)}}
                        <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
                </article>
            @endforeach
        </div>

    @endforeach
@endsection
