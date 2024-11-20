@extends('layout.plantilla')

@section('tituloPagina', 'Agregar registro')

@section('contenido')
    <form action="{{route('productos.store')}}" method="post" class="mt-5 border rounded-3 p-5 fondo-disf"
        enctype="multipart/form-data">
        @csrf
        <legend>AGREGAR UN NUEVO PRODUCTO</legend>
        <figure class="photo-preview mb-4">
            <img id="imagePreview" src="{{ asset('img/productos/photo-lg-0.svg') }}" alt="">
        </figure>
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Código" name="codigo" required>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Nombres" name="nombre" required>
        </div>
        <div class="mb-3">
            <select name="categoria_id" class="form-control" required>
                <option value="">Seleccione una categoría</option>
                @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Precio venta" name="precio_venta" id="precio_venta"
                required>
        </div>
        <div class="mb-4">
            <button type="button" class="upload btn btn-primary" onclick="document.getElementById('imagen').click();">
                Subir Portada
            </button>
            <input type="file" id="imagen" name="imagen" style="display:none;" onchange="previewImage(event);">
        </div>
        <button type="submit" class="btn btn-success"><i class="fa-regular fa-floppy-disk ms-2"></i>Guardar</button>
        <a href="{{route('productos.index')}}" class="btn btn-danger">Cancelar</a>
    </form>
@endsection
