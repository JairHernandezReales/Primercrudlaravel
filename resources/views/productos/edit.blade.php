@extends('layout/plantilla')

@section('tituloPagina', 'Editar Registro')

@section('contenido')
<div class="card mt-5" style="width: 100%;">
    <div class="card-body">
        <h5 class="card-tittle">EDITAR PRODUCTOS</h5>
        <div class="container">
            <form action="{{route('productos.update',  ['productos' => $productos->id])}}" method="POST" class="mt-5"
                enctype="multipart/form-data">
                @csrf
                @method('put')

                <figure class="photo-preview text-center mb-4">
                    <img id="imagePreview" src="{{asset($productos -> img)}}" alt="">
                </figure>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Codigo</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Codigo" name="codigo"
                        value="{{$productos->codigo}}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nombres</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Nombres" name="nombre"
                        value="{{$productos->nombre}}">
                </div>
                <div class="mb-3">
                    <label for="categoria" class="form-label">Categoria</label>
                    <select name="categoria_id" class="form-control form-control-sm" id="categoria">
                        @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}"
                            {{ $productos->categoria_id == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Precio</label>
                    <input type="number" class="form-control form-control-sm" placeholder="Precio" name="precio"
                        value="{{ number_format($productos->precio_venta, 0, ',', '.')}}">
                </div>
                <div class=" mb-4">
                    <button type="button" class="upload btn btn-primary"
                        onclick="document.getElementById('imagen').click();">Subir Portada</button>
                    <input type="file" id="imagen" name="imagen" style="display:none;" onchange="previewImage(event);">
                </div>
                <button type="submit" class="btn btn-success"><i class="fa-regular fa-floppy-disk ms-2"></i>Guardar
                    cambios</button>
                <a href="{{route('productos.index')}}" class="btn btn-danger">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection
