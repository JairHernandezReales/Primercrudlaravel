@extends('layout.plantilla')

@section('tituloPagina', 'Crud laravel 8')

@section('contenido')
<div class="card mt-5">
    <div class="card-header">
        <h5>Listado de categorias en el sistema</h5>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-lg-5 col-md-5 d-flex">
                <a href="{{route('categorias.create')}}" class="btn color-primary me-3"><i class="fa-solid fa-list ms-2"></i>Agregar nueva categoria</a>
            </div>
            <div class="col-lg-5 col-md-5">
                <form action="{{route('categorias.index')}}" method="GET" class="d-flex">
                    <input type="text" name="busqueda" class="form-control form-contol-lg me-4" placeholder="Buscar..."
                        value="{{ $busqueda }}">
                    @if ($busqueda)
                    <a href="{{ route('categorias.index') }}" class="btn btn-danger">Limpiar</a>
                    @else
                    <button type="submit" class="btn btn-primary">Buscar</button>
                    @endif
                </form>
            </div>
        </div>

        <hr>
        <p class="card-text">
            <div class="table table-responsive">
                <table class="table table-sm table-bordered">
                    <thead>
                        <th>Nombre</th>
                    </thead>
                    <tbody>
                        @foreach($categoria as $items)
                        <tr>
                            <td>{{$items -> nombre}}</td>
                            <td><a class="btn btn-primary btn-sm" href="{{route('categorias.edit', $items)}}"><i
                                        class="fa-solid fa-pen"></a></i></td>
                            <form id="formulario{{$loop->index}}" action="{{route('categorias.destroy', $items)}}"
                                method="POST">
                                @csrf
                                @method('delete')
                                <td><button type="submit" class="btn btn-danger btn-sm"><i
                                            class="fa-solid fa-trash"></i></button></td>
                            </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12">
                    {{ $categoria->appends(['busqueda' => $busqueda])->links() }}
                </div>
            </div>
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
            title: "¿Estás seguro que deseas eliminar esta categoria?",
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
            text: "La categoria fue eliminada correctamente",
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
            title: "Categoria agregada correctamente",
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
            title: "Categoria actualizada correctamente",
            showConfirmButton: false,
            timer: 1500
        });
    };

</script>
@endif

@endsection

@section('footer')

@endsection
