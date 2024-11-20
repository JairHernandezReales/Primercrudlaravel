@extends('layout/plantilla')

@section('tituloPagina', 'Agregar registro')

@section('contenido')
<div class="card-body">

    <form action="{{route('proveedores.storeProveedor')}}" method="post" class="color-formadd mt-5 border rounded-3 p-5">
        @csrf
        <legend>AGREGAR UN NUEVO PROVEEDOR</legend>
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Nit" name="nit" id="nit" required
                oninput="validarNit(this)">
            <div class="mt-2" id="errorNit" style="color: red; display: none;">SOLO SE PUEDE INGRESAR NUMEROS. <br> No
                se permiten caracteres especiales, signos de puntuacion o letras en este campo.
            </div>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Nombre o razon social" name="nombre" required>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Direccion" name="direccion" required>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Telefono" name="telefono" id="nit" required
                oninput="validarTelefono(this)">
            <div class="mt-2" id="errorTelefono" style="color: red; display: none;">SOLO SE PUEDE INGRESAR NUMEROS. <br> No
                se permiten caracteres especiales, signos de puntuacion o letras en este campo.
            </div>
        </div>
        <div class="mb-3">
            <input type="email" class="form-control" placeholder="Correo" name="correo" required>
        </div>
        <button type="submit" class="btn btn-success"><i class="fa-regular fa-floppy-disk ms-2"></i>Guardar</button>
        <a href="{{route('proveedores.index')}}" class="btn btn-danger">Cancelar</a>
    </form>
</div>
@endsection

@section('scripts')
<script>
    function validarNit(input) {
        const errorMessage = document.getElementById('errorNit');
        const invalidChars = /[^0-9]/g;

        if (invalidChars.test(input.value)) {
            errorMessage.style.display = 'block';
            input.value = input.value.replace(invalidChars, '');
        } else {
            errorMessage.style.display = 'none';
        }
    }

</script>

<script>
    function validarTelefono(input) {
        const errorMessage = document.getElementById('errorTelefono');
        const invalidChars = /[^0-9]/g;

        if (invalidChars.test(input.value)) {
            errorMessage.style.display = 'block';
            input.value = input.value.replace(invalidChars, '');
        } else {
            errorMessage.style.display = 'none';
        }
    }

</script>
@endsection
