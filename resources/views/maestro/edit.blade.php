@extends('welcome')

@section('titulo', 'Editar Maestros')

@section('contenido')

<form action="/maestros/{{$maestro->id}}" method="post">
    @method('PUT')
    @csrf
    <div>
        <label for="" class="form-label">Codigo</label>
        <input type="text" name="codigo" id="codigo" class="form-control" value="{{$maestro->codigo}}">
        @error('codigo')
            <small style="color: red">{{$message}}</small>
        @enderror
    </div>
    <div>
        <label for="" class="form-label">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control" value="{{$maestro->nombre}}">
        @error('nombre')
        <small style="color: red">{{$message}}</small>
        @enderror
    </div>
    <div>
        <label for="" class="form-label">Apellido Paterno</label>
        <input type="text" name="apellidopaterno" id="apellidopaterno" class="form-control" value="{{$maestro->apellidopaterno}}">
        @error('apellidopaterno')
        <small style="color: red">{{$message}}</small>
        @enderror
    </div>
    <div>
        <label for="" class="form-label">Apellido Materno</label>
        <input type="text" name="apellidomaterno" id="apellidomaterno" class="form-control" value="{{$maestro->apellidomaterno}}">
        @error('apellidomaterno')
        <small style="color: red">{{$message}}</small>
        @enderror
    </div>
    <div>
        <label for="" class="form-label">NSS</label>
        <input type="text" name="nss" id="nss" class="form-control" value="{{$maestro->nss}}">
        @error('nss')
        <small style="color: red">{{$message}}</small>
        @enderror
    </div>
    <div>
        <label for="" class="form-label">Correo</label>
        <input type="email" name="correo" id="correo" class="form-control" value="{{$maestro->correo}}">
        @error('correo')
        <small style="color: red">{{$message}}</small>
        @enderror
    </div>
    <p></p>
    <a href="/estudiantes" class="btn btn-danger text-light">Cancelar</a>
    <button type="submit" class="btn btn-success">Guardar</button>
</form>


@endsection