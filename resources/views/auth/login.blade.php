@extends('layout.plantilla')

@section('contenido')
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card-body p-5 text-center">
                    <div class="mb-md-5 mt-md-4 pb-5">
                        <form method="POST" action="{{ route('login') }}" class="login-form">
                            @csrf
                            <h2 class="login-title mb-2 text-uppercase">Iniciar sesion</h2>
                            <p class="text-white-50 mb-5">¡Por favor, introduce tu usuario y contraseña!</p>

                            <div data-mdb-input-init class="mb-4 input-box">
                                <i class="fa-regular fa-envelope position-icon-login"></i>
                                <input type="email" id="typeEmailX" name="email"
                                    class=" @error('email') is-invalid @enderror" value="{{ old('email') }}" required
                                    autocomplete="email" autofocus placeholder="Correo" />

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div data-mdb-input-init class="form-outline form-white mb-4 input-box">
                                <i class="fa-solid fa-lock position-icon-login"></i>
                                <input type="password" id="typePasswordX" name="password"
                                    class="@error('password') is-invalid @enderror" required
                                    autocomplete="current-password" placeholder="contraseña" />

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="remember-forgot-box">
                                <label for="remember">
                                    <input type="checkbox" id="remember">
                                    Recordar contraseña
                                </label>
                                <a href="{{ route('password.request') }}">¿Recuperar contraseña?</a>
                            </div>

                <button  class="login-btn"
                    type="submit">Ingresar</button>
                <div>
                    <p class="register">¿No tienes una cuenta? <a href="{{ route('register') }}"
                            class="text-white-50 fw-bold">Registrate</a>
                    </p>
                </div>
                </form>

            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
