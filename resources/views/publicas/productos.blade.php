@extends('layout.plantilla')

@section('tituloPagina', 'Crud laravel 8')

@section('contenido')
<div class="row m-4">
    @foreach($productos as $items)
    <div class="card col-xs-5 col-sm-5 col-md-5 col-lg-2 m-1">
        <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
            <img src="{{asset($items -> img)}}" class="img-fluid pt-2" style="width: 800px; height: 250px" />
        </div>
        <!-- {{ number_format($items->valor, 0, ',', '.') }} -->
        <div class="card-body">
            <h5 class="card-title">{{ $items -> nombre}}</h5>
            <p class="card-text">Precio: {{ number_format($items->precio_venta, 0, ',', '.') }}</strong></p>
            <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-form">
                @csrf
                <input type="hidden" name="product_id" value="{{ $items->id }}">
                <input type="hidden" name="product_name" value="{{ $items->nombre }}">
                <input type="hidden" name="product_price" value="{{ $items->precio_venta }}">
                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-cart-plus"></i>
                </button>
            </form>
        </div>
    </div>
    @endforeach
</div>
@endsection
