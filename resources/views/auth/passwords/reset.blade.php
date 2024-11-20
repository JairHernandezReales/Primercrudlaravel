@extends('layout.plantilla')

@section('contenido')
<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <div class="mb-md-5 mt-md-4 pb-5">
                            <form method="POST" action="{{ route('password.reset') }}">
                                @csrf
                                <h2 class="fw-bold mb-2 text-uppercase">Restablecer contraseña</h2>
                                <p class="text-white-50 mb-5">¡Por favor, introduce correo electronico para restablecer!
                                </p>

                                <div data-mdb-input-init class="form-outline form-white mb-4">
                                    <input type="email" id="typeEmailX" name="email"
                                        class="form-control-lg form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"
                                        autofocus placeholder="Correo" />

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <button data-mdb-button-init data-mdb-ripple-init
                                    class="btn btn-outline-light btn-lg px-5" type="submit">Ingresar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
