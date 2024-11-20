@extends('layout.plantilla')

@section('content')
<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <div class="mb-md-5 mt-md-4 pb-5">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <h2 class="fw-bold mb-2 text-uppercase">Iniciar sesion</h2>
                                <p class="text-white-50 mb-5">¡Por favor, introduce tu usuario y contraseña!</p>

                                <div data-mdb-input-init class="form-outline form-white mb-4">
                                    <input type="email" id="typeEmailX" name="email"
                                        class="form-control-lg form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus
                                        placeholder="Correo" />

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div data-mdb-input-init class="form-outline form-white mb-4">
                                    <input type="password" id="typePasswordX" name="password"
                                        class="form-control-lg form-control @error('password') is-invalid @enderror"
                                        required autocomplete="current-password" placeholder="contraseña" />

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Recordar contraseña') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <p class="small mb-5 pb-lg-2"><a class="text-white-50"
                                        href="{{ route('password.request') }}">¿Has olvidado tu
                                        contraseña?</a></p>

                                <button data-mdb-button-init data-mdb-ripple-init
                                    class="btn btn-outline-light btn-lg px-5" type="submit">Ingresar</button>
                            </form>

                            <p class="small mb-2 pb-lg-2 mt-4">o inicia sesion con: </p>

                            <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4"></i></a>
                                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                            </div>

                        </div>

                        <div>
                            <p class="mb-0">¿No tienes una cuenta? <a href="{{ route('register') }}"
                                    class="text-white-50 fw-bold">Registrate</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
