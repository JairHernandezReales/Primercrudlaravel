@extends('layout.plantilla')

@section('tituloPagina', 'Crud laravel 8')

@section('contenido')
<div class="card mt-5">
    <div class="card-header">
        <div class="mt-2 d-flex justify-content-between align-items-center">
            <h3 class="mb-0">INVENTARIO</h3>

            <form action="{{ route('inventario.index') }}" method="GET" class="d-flex">
                <input type="text" name="busqueda" class="form-control form-control-lg me-3" placeholder="Buscar..."
                    value="{{ $busqueda }}">

                @if ($busqueda)
                <a href="{{ route('inventario.index') }}" class="btn btn-danger">Limpiar</a>
                @else
                <button type="submit" class="btn btn-primary">Buscar</button>
                @endif
            </form>
        </div>


        <div class="card-body">
            <hr>
            <p class="card-text">
                <div class="table table-responsive">
                    <table id="inventarioTable" class="table mt-4">
                        <thead>
                            <tr>
                                <th scope="col">CODIGO </th>
                                <th scope="col">PRODUCTO </th>
                                <th scope="col">CATEGORIA </th>
                                <th scope="col">PRECIO DE COSTO </th>
                                <th scope="col">PRECIO DE VENTA </th>
                                <th scope="col">TOTAL ENTRADAS </th>
                                <th scope="col">TOTAL SALIDAS </th>
                                <th scope="col">EXISTENCIA ACTUAL </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($query as $items)
                            <tr>
                                <td>{{$items -> codigo_producto}}</td>
                                <td>{{$items -> nombre_producto}}</td>
                                <td>{{$items -> nombre_categoria}}</td>
                                <td>$ {{ number_format($items -> precio_costo_actual, 0, ',', '.')}}</td>
                                <td>$ {{ number_format($items -> precio_venta, 0, ',', '.')}}</td>
                                <td>{{$items -> total_entradas}}</td>
                                <td>{{$items -> total_salidas}}</td>
                                <td>{{$items -> existencia}}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8">No se encontraron resultados</td>
                            </tr>
                            @endforelse
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
