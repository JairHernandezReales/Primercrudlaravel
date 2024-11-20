@extends('layout/plantilla')

@section('tituloPagina', 'Agregar registro')

@section('contenido')
<div class="card-body">
    <form action="{{route('personas.store')}}" method="post" class="color-formadd mt-5 border rounded-3 p-5" enctype="multipart/form-data">
        @csrf
        <legend>AGREGAR UN NUEVO REGISTRO</legend>
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="N° cedula" name="dni" required>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Nombres" name="nombre" required>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="1er Apellido" name="paterno" required>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="2do Apellido" name="materno" required>
        </div>
        <div class="mb-3">
            <input type="date" class="form-control" placeholder="Fecha de nacimiento" name="Fnacimiento" required>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Edad" name="edad" required>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Telefono" name="telefono" required>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Direccion" name="direccion" required>
        </div>
        <div class="mb-3">
            <label class="foto" for="imagen">Agregar foto</label><br>
            <input type="file" name="imagen" id="imagen" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary"><i class="fa-regular fa-floppy-disk ms-2"></i>Guardar</button>
        <a href="{{route('personas.dashboard')}}" class="btn btn-success">Cancelar</a>
    </form> 
</div>
@endsection
