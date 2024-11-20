@extends('layout.plantilla')

@section('contenido')
    <div class="container py-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card-body p-5 text-center">
                            <form method="POST" action="{{ route('register') }}" class="login-form">
                                @csrf
                                <h2 class="login-title mb-2 text-uppercase">Registrate</h2>
                                <p class="text-white-50 mb-5">¡Por favor, introduce tus datos para
                                    <strong>registrarte</strong>!</p>

                                <div class="row mb-4 input-box">
                                    <div class="col-md-12">
                                    <i class="fa-solid fa-signature position-icon-register"></i>
                                        <input type="text" id="name"
                                            class="@error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                            placeholder="Nombre" />

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 input-box">
                                    <div class="col-md-12">
                                    <i class="fa-regular fa-envelope position-icon-register"></i>
                                        <input id="email" type="email"
                                            class="@error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email"
                                            placeholder="Correo">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 input-box">
                                    <div class="col-md-12">
                                    <i class="fa-solid fa-lock position-icon-register"></i>
                                        <input id="password" type="password"
                                            class="@error('password') is-invalid @enderror"
                                            name="password" required autocomplete="new-password"
                                            placeholder="Contraseña">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4 input-box">
                                    <div class="col-md-12">
                                    <i class="fa-solid fa-lock position-icon-register"></i>
                                        <input id="password-confirm" type="password"
                                            name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar Contraseña">
                                    </div>
                                </div>

                                <button class="login-btn" type="submit">Registrarse</button>
                                    <p class="small mb-2 pb-lg-2 mt-4">o registrate con: </p>
        
                                    <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                        <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                        <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4"></i></a>
                                        <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                                    </div>
        
        
                                
                                    <p class="register">¿Ya tienes una cuenta? <a href="{{ route('login') }}"
                                            class="text-white-50 fw-bold">inicia sesion</a>
                                    </p>
                                
                            </form>


                </div>
            </div>
        </div>
    </div>
@endsection
