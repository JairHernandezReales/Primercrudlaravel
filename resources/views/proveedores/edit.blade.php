@extends('layout/plantilla')

@section('tituloPagina', 'Editar Registro')

@section('contenido')
<div class="card mt-5" style="width: 100%;">
    <div class="card-body">
        <h5 class="card-tittle">EDITAR PROVEEDOR</h5>
        <div class="container">
            <form action="{{route('proveedores.updateProveedor',  ['proveedores' => $proveedores->id])}}" method="POST" class="mt-5">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nit</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Codigo" name="nit"
                        value="{{$proveedores->nit}}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nombre o razon social</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Nombre o razon social" name="nombre"
                        value="{{$proveedores->nombre}}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Direccion</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Direccion" name="direccion"
                        value="{{$proveedores->direccion}}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Telefono</label>
                    <input type="number" class="form-control form-control-sm" placeholder="Telefono" name="telefono"
                        value="{{$proveedores->telefono}}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Correo</label>
                    <input type="email" class="form-control form-control-sm" placeholder="Correo" name="correo"
                        value="{{$proveedores->correo}}">
                </div>
                
                <button type="submit" class="btn btn-success"><i class="fa-regular fa-floppy-disk ms-2"></i>Guardar
                    cambios</button>
                <a href="{{route('proveedores.index')}}" class="btn btn-danger">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection
