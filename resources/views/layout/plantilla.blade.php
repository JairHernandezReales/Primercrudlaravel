<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Link iconos -->
    <script src="https://kit.fontawesome.com/4cdb4e4662.js" crossorigin="anonymous"></script>
    
    <!-- CDN sweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

    <!-- Jquery  -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" crossorigin="anonymous">
    
    <title>Burger</title>
</head>

<body>
    <div class="navBar">
    <nav class="navbar navbar-expand-xxl bg-navbar v-100">
            <div class="container-fluid">
                <img src="{{asset('img/Russo.png')}}" class="img-responsive-header">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link text-black" aria-current="page" href="{{ route('public.inicio') }}">
                                <img src="{{asset('icons/dashboard.svg')}}" alt="Inicio" class="nav-icon">
                                INICIO
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ route('public.productos') }}"><img
                                    src="{{asset('icons/productos1.svg')}}" alt="Nuestros productos" class="nav-icon">
                                NUESTROS
                                PRODUCTOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ route('public.quienessomos') }}"><img
                                    src="{{asset('icons/quienes_somos.svg')}}" alt="quienes somos" class="nav-icon">
                                QUIENES
                                SOMOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ route('public.contactanos') }}"><img
                                    src="{{asset('icons/contactanos.svg')}}" alt="contactanos" class="nav-icon">
                                CONTACTANOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ route('login') }}"><img
                                    src="{{asset('icons/user.svg')}}" alt="Proveedores" class="nav-icon"> INICIAR
                                SESION</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item">
                            <a class="nav-link text-black" aria-current="page" href="{{ route('personas.dashboard') }}">
                                <img src="{{asset('icons/dashboard.svg')}}" alt="Inicio" class="nav-icon">
                                INICIO
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-black" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{asset('icons/docs.svg')}}" alt="Facturas" class="list__arrow">
                                FACTURAS
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('facturas.crear') }}">Crear Facturas</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('facturas.index') }}">Ver totas las
                                        facturas</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-black" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{asset('icons/productos.svg')}}" alt="Productos" class="nav-icon">
                                PRODUCTOS
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('categorias.index') }}">Categorias</a></li>
                                <li><a class="dropdown-item" href="{{ route('productos.index') }}">Crear Producto</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-black" href="" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{asset('icons/compras.svg')}}" alt="Compras" class="nav-icon">
                                COMPRAS
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('compras.crear') }}">Ingresar Compras</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('compras.index') }}">Ver todas las
                                        compras</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ route('inventario.index') }}">
                                <img src="{{asset('icons/inventario.svg')}}" alt="Inventario" class="nav-icon">
                                INVENTARIO
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{route('personas.clientes')}}">
                                <img src="{{asset('icons/customer.svg')}}" alt="Clientes" class="nav-icon">
                                CLIENTES
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ route('proveedores.index') }}">
                                <img src="{{asset('icons/proveedor.svg')}}" alt="Proveedores" class="nav-icon">
                                PROVEEDORES
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link text-black dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img src="{{asset('icons/user.svg')}}" alt="Proveedores" class="nav-icon">
                                {{ Auth::user()->name }}
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesion') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                            @endguest
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <main>
        @yield('contenido')
        @guest
        @if (Route::has('login'))
        <div id="cart-button" style="position: fixed; bottom: 100px; right: 30px; z-index: 1000;">
        <a href="{{ route('cart.view') }}" class="btn btn-primary rounded-circle position-relative d-flex justify-content-center align-items-center" style="width: 60px; height: 60px;">
            <i class="fa-solid fa-cart-shopping" style="font-size: 24px;"></i>
            <span id="cart-count" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{ session('cart') ? count(session('cart')) : 0 }}
            </span>
        </a>
        </div>
        @endif
        @endguest
    </main>

    <div class="footer">
        <div class="footer-area">
            @yield('footer')
            <!-- Footer -->
            <footer class="text-center text-lg-start bg-body-tertiary text-muted">
                <!-- Section: Social media -->
                <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
                    <!-- Left -->
                    <div class="me-5 d-none d-lg-block">
                        <span>Conéctate con nosotras en las redes sociales:</span>
                    </div>
                    <!-- Right -->
                    <div>
                        <a href="" class="me-4 text-reset">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="" class="me-4 text-reset">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                        <a href="" class="me-4 text-reset">
                            <i class="fa-brands fa-google"></i>
                        </a>
                        <a href="" class="me-4 text-reset">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="" class="me-4 text-reset">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                    </div>
                    <!-- Right -->
                </section>
                <!-- Section: Social media -->

                <!-- Section: Links  -->
                <section class="">
                    <div class="container text-center text-md-start mt-5">
                        <!-- Grid row -->
                        <div class="row mt-3">
                            <!-- Grid column -->
                            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                                <!-- Content -->
                                <h6 class="text-uppercase fw-bold mb-4">
                                    BURGER
                                </h6>
                                <p>
                                    Here you can use rows and columns to organize your footer content. Lorem ipsum
                                    dolor sit amet, consectetur adipisicing elit.
                                </p>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold mb-4">
                                    Products
                                </h6>
                                <p>
                                    <a href="#!" class="text-reset">Inicio</a>
                                </p>
                                <p>
                                    <a href="#!" class="text-reset">Nuestros productos</a>
                                </p>
                                <p>
                                    <a href="#!" class="text-reset">Conocenos</a>
                                </p>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold mb-4">Contactanos</h6>
                                <p><i class="fas fa-home me-3"></i> Calle 64B N° 11-45</p>
                                <p>
                                    <i class="fas fa-envelope me-3"></i>
                                    burger@example.com
                                </p>
                                <p><i class="fas fa-phone me-3"></i> +57 310 574 6945</p>
                            </div>
                            <!-- Grid column -->
                        </div>
                        <!-- Grid row -->
                    </div>
                </section>
                <!-- Section: Links  -->

                <!-- Copyright -->
                <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                    © 2024 Copyright:
                    <a class="text-reset fw-bold" href="#">Diseñado por JOTADEV</a>
                </div>
                <!-- Copyright -->
            </footer>
        </div>
    </div>

    <div class="scripts">
        @yield('scripts')
        <script>
            function previewImage(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        document.getElementById('imagePreview').src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            }

        </script>

<script>
    function formatNumber(value) {
        return value.replace(/\D/g, "") // Elimina caracteres no numéricos
                    .replace(/\B(?=(\d{3})+(?!\d))/g, "."); // Agrega puntos para miles
    }

    document.getElementById('precio_venta').addEventListener('input', function(e) {
        e.target.value = formatNumber(e.target.value);
    });

    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById('imagePreview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" crossorigin="anonymous"></script>
    <script src="{{asset('js/main.js')}}"></script>

    <!-- USO DE AJAX -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.add-to-cart-form').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#cart-count').text(response.cartCount);
                    },
                    error: function() {
                        alert('Hubo un error al añadir el producto al carrito.');
                    }
                });
            });
        });
    </script>
</body>
</html>