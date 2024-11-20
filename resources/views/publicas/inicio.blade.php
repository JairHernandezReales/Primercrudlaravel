@extends('layout.plantilla')

@section('tituloPagina', 'Crud laravel 8')

@section('contenido')
<div class="fondo-disf">

    <div id="productosCarousel" class="carousel slide mt-4" data-bs-ride="carousel">
        <h2>Nuestros productos</h2>
        <div class="carousel-inner">
            @foreach($productos->chunk(4) as $chunk)
            <!-- Divide productos en grupos de 4 -->
            <div class="carousel-item @if($loop->first) active @endif">
                <div class="d-flex justify-content-start flex-wrap">
                    @foreach($chunk as $items)
                    <div class="card col-xs-12 col-sm-6 col-md-4 col-lg-3 m-1">
                        <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
                            <img src="{{ asset($items->img) }}" class="img-fluid p-2"
                                style="width: 100%; height: 200px; object-fit: cover;" />
                            <a href="#">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </a>
                        </div>
                        <div class="card-body d-flex flex-column">
    <h5 class="card-title">{{ $items->nombre }}</h5>
    <p class="card-text">Categoría: {{ $items->categoria->nombre }}</p>
    <p class="card-text">Precio: <strong>${{ number_format($items->precio_venta, 0, ',', '.') }}</strong></p>
    <div class="mt-auto d-flex justify-content-end">
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
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>

        <!-- Controles del Carousel -->
        <button class="carousel-control-prev" type="button" data-bs-target="#productosCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#productosCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>


    <!-- Jumbotron -->
    <div class="p-5 text-center">
        <h2 class="mb-3 text-uppercase ">Tenemos las mejores hamburguesas de la ciudad</h2>
        <h4 class="mb-3">con salsas unicas para tu paladar</h4>
        <a data-mdb-ripple-init class="btn btn-primary" href="#" role="button">Realiza tu pedido</a>
    </div>
    <!-- Jumbotron -->
    <div class="row m-4 ">
        <h4 class="m-4">Conoce los productos usados</h4>
        <div class="card-presentacion col-lg-2 m-2">
            <div class="first-content">
                <span>PAN</span>
            </div>
            <div class="second-content  text-center">
                <span>
                    <img class="size-img"
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ1cxGjfiieto08E2_m5P_cr9QwUMVDzEzoIQ&s"
                        alt="">
                    <p class="size-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis sunt optio
                        a repellendus,
                        nesciunt porro ipsum ducimus? Quisquam ea cum quas possimus illum neque adipisci molestias natus
                        aut
                        corporis. Non.</p>
                </span>
            </div>
        </div>
        <div class="card-presentacion col-lg-2 m-2">
            <div class="first-content">
                <span>CARNE</span>
            </div>
            <div class="second-content  text-center">
                <span>
                    <img class="size-img" src="https://i.blogs.es/12f34d/if_new_recipe_03-min/1366_2000.jpg" alt="">
                    <p class="size-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis sunt optio
                        a repellendus,
                        nesciunt porro ipsum ducimus? Quisquam ea cum quas possimus illum neque adipisci molestias natus
                        aut
                        corporis. Non.</p>
                </span>
            </div>
        </div>
        <div class="card-presentacion col-lg-2 m-2">
            <div class="first-content">
                <span>VEGETALES</span>
            </div>
            <div class="second-content  text-center">
                <span>
                    <img class="size-img" src="https://cdn7.kiwilimon.com/ss_secreto/2632/640x640/2632.jpg.webp" alt="">
                    <p class="size-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis sunt optio
                        a repellendus,
                        nesciunt porro ipsum ducimus? Quisquam ea cum quas possimus illum neque adipisci molestias natus
                        aut
                        corporis. Non.</p>
                </span>
            </div>
        </div>
        <div class="card-presentacion col-lg-2 m-2">
            <div class="first-content">
                <span>SALSAS</span>
            </div>
            <div class="second-content  text-center">
                <span>
                    <img class="size-img" src="https://i.blogs.es/78995c/salsas/1366_2000.jpg" alt="">
                    <p class="size-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis sunt optio
                        a repellendus,
                        nesciunt porro ipsum ducimus? Quisquam ea cum quas possimus illum neque adipisci molestias natus
                        aut
                        corporis. Non.</p>
                </span>
            </div>
        </div>
    </div>
</div>
@endsection
