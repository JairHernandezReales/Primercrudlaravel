@extends('layout/plantilla')

@section('tituloPagina', 'Agregar registro')

@section('contenido')
<div class="card-body">

    <form action="{{route('categorias.store')}}" method="post" class="color-formadd mt-5 border rounded-3 p-5" enctype="multipart/form-data">
        @csrf
        <legend>AGREGAR UNA NUEVA CATEGORIA</legend>
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Nombres" name="nombre" required>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fa-regular fa-floppy-disk ms-2"></i>Guardar</button>
        <a href="{{route('categorias.index')}}" class="btn btn-success">Cancelar</a>
    </form> 
</div>
@endsection
