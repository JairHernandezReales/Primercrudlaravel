@extends('layout.plantilla')

@section('tituloPagina', 'Contáctanos')

@section('contenido')
<div class="container fondo-disf">
    <h2 class="text-center mb-4" style="color: #ff5733; font-weight: bold; font-size: 2.5rem;">Contáctanos</h2>
    
    <p class="text-center text-white" style="font-size: 1.2rem; line-height: 1.8; color: #555;">
        ¿Tienes alguna pregunta, sugerencia o simplemente quieres saludarnos? 
        Completa el formulario a continuación y te responderemos lo antes posible.
    </p>

    <form action="#" method="POST" class="mt-4" style="max-width: 600px; margin: 0 auto;">
        @csrf
        <div class="mb-3 input-box">
            <label for="name" class="form-label" style="font-weight: bold; color: #900c3f;">Nombre Completo</label>
            <input type="text" id="name" name="name" required placeholder="Ingresa tu nombre">
        </div>
        
        <div class="mb-3 input-box">
            <label for="email" class="form-label" style="font-weight: bold; color: #900c3f;">Correo Electrónico</label>
            <input type="email" id="email" name="email" required placeholder="Ingresa tu correo electrónico">
        </div>

        <div class="mb-3 input-box">
            <label for="message" class="form-label" style="font-weight: bold; color: #900c3f;">Mensaje</label>
            <textarea class="form-control" id="message" name="message" rows="5" required placeholder="Escribe tu mensaje aquí"></textarea>
        </div>

        <div class="text-center">
            <button type="submit" class="login-btn" style="background-color: #ff5733; border: none;">
                Enviar Mensaje
            </button>
        </div>
    </form>

    <div class="text-center mt-5">
        <h4 style="color: #900c3f;">O si prefieres, contáctanos directamente:</h4>
        <p style="font-size: 1.1rem;">Teléfono: +57 310 574 6945</p>
        <p style="font-size: 1.1rem;">Correo:  burger@example.com</p>
        <p style="font-size: 1.1rem;">Dirección: Calle 64B N° 11-45</p>
    </div>
</div>
@endsection
