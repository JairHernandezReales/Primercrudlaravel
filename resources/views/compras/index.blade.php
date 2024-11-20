@extends('layout.plantilla')

@section('tituloPagina', 'Crud laravel 8')

@section('contenido')
<div class="card mt-5">
    <div class="card-header">
        <h5>Listado de facturas en el sistema</h5>
    </div>

    <div class="card-body">

        <hr>
        <p class="card-text">
            <div class="table table-responsive">
                <table class="table table-sm table-bordered">
                    <thead>
                        <th>Numero de compra</th>
                        <th>Proveedor</th>
                        <th>valor neto</th>
                        <th>iva</th>
                        <th>descuento</th>
                        <th>valor total</th>
                    </thead>
                    <tbody>
                        @foreach($compras as $items)
                        <tr>
                            <td>{{$items -> id}}</td>
                            <td>{{$items -> proveedores -> nombre}}</td>
                            <td>$ {{ number_format($items -> precio_costo, 0, ',', '.')}}</td>
                            <td>$ {{ number_format($items -> iva, 0, ',', '.')}}</td>
                            <td>$ {{ number_format($items -> descuento, 0, ',', '.')}}</td>
                            <td>$ {{ number_format($items -> precio_total, 0, ',', '.')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <hr>
        </p>
        <a href="{{route('personas.dashboard')}}" class="btn btn-primary me-3">
            <i class="fa-solid fa-arrow-left ms-2"></i></i>Volver</a>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('form[id^="formulario"]').on('submit', function (event) {
        event.preventDefault();
        var form = $(this); // Selecciona el formulario actual
        Swal.fire({
            title: "¿Estás seguro que deseas eliminar este producto?",
            text: "Al dar clic en confirmar, los datos no se podrán recuperar.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Confirmar"
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });

</script>

@if (Session::has('success'))
<script>
    window.onload = function () {
        Swal.fire({
            title: "Confirmado",
            text: "El producto fue eliminado correctamente",
            icon: "success"
        });
    };

</script>
@endif

@if (session('success_message'))
<script>
    window.onload = function () {
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Producto agregado correctamente",
            showConfirmButton: false,
            timer: 1500
        });
    };

</script>
@endif

@if (session('success_message_update'))
<script>
    window.onload = function () {
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Producto actualizado correctamente",
            showConfirmButton: false,
            timer: 1500
        });
    };

</script>
@endif

@endsection

@section('footer')

@endsection
