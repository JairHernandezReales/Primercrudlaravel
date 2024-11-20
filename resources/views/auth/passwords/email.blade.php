@extends('layout.plantilla')

@section('contenido')
    <div class="container py-5 ">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card-body p-5 text-center">

                        <div class="mb-md-5 mt-md-4 pb-5">
                            <div class="card-body">
                                @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                                @endif

                                <form method="POST" action="{{ route('password.email') }}" class="reset-form">
                                    @csrf
                                    <h3 class="fw-bold mb-2 text-uppercase">Restablecer contraseña</h3>
                                    <p class="text-white-50 mb-5">¡Por favor, introduce tu correo para restablecer la
                                        contraseña!</p>

                                    <div data-mdb-input-init class="input-box mb-4">
                                        <i class="fa-regular fa-envelope position-icon-login"></i>
                                        <input type="email" id="email" name="email"
                                            class="@error('email') is-invalid @enderror"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus
                                            placeholder="Correo" />

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <button class="login-btn" type="submit">Enviar enlace</button>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
