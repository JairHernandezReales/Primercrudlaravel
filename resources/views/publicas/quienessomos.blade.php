@extends('layout.plantilla')

@section('tituloPagina', 'Quiénes somos - Nuestra Historia')

@section('contenido')
<div class="container mt-4 mb-4 fondo-disf">
    <h2 class="text-center mb-4" style="color: #ff5733; font-weight: bold; font-size: 2.5rem;">Quiénes Somos</h2>
    
    <p style="font-size: 1.2rem; line-height: 1.8; text-align: justify;">
        Bienvenidos a <strong style="color: #c70039;">BURGER</strong>, donde transformamos simples ingredientes en 
        experiencias gastronómicas inolvidables. Desde nuestros inicios, hemos tenido un único objetivo: 
        brindar a nuestros clientes las mejores hamburguesas artesanales, preparadas con ingredientes frescos 
        y de la más alta calidad.
    </p>
    
    <h3 class="mt-5" style="color: #900c3f; font-weight: bold;">Nuestra Historia</h3>
    <p style="font-size: 1.1rem; line-height: 1.8; text-align: justify;">
        Todo comenzó en un pequeño local familiar, con la pasión de ofrecer algo diferente: hamburguesas que 
        combinan el sabor tradicional con un toque moderno. Gracias al apoyo de nuestros clientes, hemos crecido 
        y nos hemos convertido en un referente local.
    </p>
    
    <h3 class="mt-5" style="color: #900c3f; font-weight: bold;">Nuestra Misión</h3>
    <p style="font-size: 1.1rem; line-height: 1.8; text-align: justify;">
        Nuestro compromiso es ofrecer productos que deleiten tu paladar y creen momentos especiales con tus 
        seres queridos. Creemos en la calidad, la innovación y el buen servicio como pilares fundamentales 
        de nuestra empresa.
    </p>
    
    <h3 class="mt-5" style="color: #900c3f; font-weight: bold;">¿Por qué elegirnos?</h3>
    <ul style="font-size: 1.1rem; line-height: 1.8;">
        <li style="margin-bottom: 10px;">Ingredientes frescos y seleccionados.</li>
        <li style="margin-bottom: 10px;">Recetas únicas y originales.</li>
        <li style="margin-bottom: 10px;">Atención personalizada y amable.</li>
        <li>Compromiso con la satisfacción de nuestros clientes.</li>
    </ul>

    <h3 class="mt-5" style="color: #900c3f; font-weight: bold;">Nuestro Equipo</h3>
    <p style="font-size: 1.1rem; line-height: 1.8; text-align: justify;">
        Detrás de cada hamburguesa hay un equipo apasionado y dedicado que trabaja arduamente para garantizar 
        que cada cliente disfrute de una experiencia única.
    </p>

    <div class="text-center mt-5">
        <img src="https://www.elheraldo.co/resizer/v2/2UGUZBONDZH6ZDASW3V53J5YRA.jpg?auth=a0cc495bfb81dc58dc85d77bf5a313f258c32703fe92e2bbb83c5402d1f89e49&smart=true&width=1200&height=675&quality=70" alt="Nuestro equipo" class="img-fluid rounded shadow" 
        style="max-width: 60%; border: 5px solid #ff5733;">
        <p class="mt-3" style="font-style: italic; color: #fff;">El corazón detrás de nuestras hamburguesas.</p>
    </div>

    <p class="text-center mt-4" style="font-size: 1.3rem; color: #fff;">
        ¡Gracias por elegirnos y ser parte de nuestra historia!
    </p>
</div>
@endsection
