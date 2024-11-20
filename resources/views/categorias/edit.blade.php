@extends('layout/plantilla')

@section('tituloPagina', 'Editar Registro')

@section('contenido')
<div class="card mt-5" style="width: 100%;">
    <div class="card-body">
        <h5 class="card-tittle">EDITAR CATEGORIA</h5>
        <div class="container">
            <form action="{{route('categorias.update',  ['categoria' => $categoria->id])}}" method="POST" class="mt-5">
                @csrf
                @method('put')
                
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nombres</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Nombres" name="nombre"
                        value="{{$categoria->nombre}}">
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa-regular fa-floppy-disk ms-2"></i>Guardar
                    cambios</button>
                <a href="{{route('categorias.index')}}" class="btn btn-success">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection
