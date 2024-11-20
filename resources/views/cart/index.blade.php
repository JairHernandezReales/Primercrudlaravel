@extends('layout.plantilla')

@section('tituloPagina', 'Carrito de compras')

@section('contenido')
<div class="container mt-4 fondo-disf">
    <h2>Carrito de Compras</h2>

    @if(session('cart') && count(session('cart')) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($cart as $id => $details)
                    @php $subtotal = $details['price'] * $details['quantity']; @endphp
                    @php $total += $subtotal; @endphp
                    <tr>
                        <td>{{ $details['name'] }}</td>
                        <td>{{ number_format($details['price'], 0, ',', '.') }}</td>
                        <td>
                            <div class="input-group" style="width: 120px;">
                                <button class="btn btn-outline-secondary btn-decrease" data-id="{{ $id }}">-</button>
                                <input type="text" class="form-control text-center" value="{{ $details['quantity'] }}" readonly>
                                <button class="btn btn-outline-secondary btn-increase" data-id="{{ $id }}">+</button>
                            </div>
                        </td>
                        <td class="subtotal">{{ number_format($subtotal, 0, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-start mt-3">
            <h4>Total a Pagar: <span class="text-whith">{{ number_format($total, 0, ',', '.') }} COP</span></h4>
        </div>

        <div class="text-start mt-4">
            <a href="#" class="btn btn-success btn-lg">
                <i class="fa-solid fa-credit-card"></i> Pagar
            </a>
        </div>
    @else
        <p class="msn-carrito">No hay productos en el carrito.</p>
    @endif
</div>
@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        function updateCart(id, quantity) {
            $.ajax({
                url: '/cart/update/' + id,
                method: 'PUT',
                data: {
                    _token: '{{ csrf_token() }}',
                    quantity: quantity
                },
                success: function(response) {
                    location.reload();
                },
                error: function() {
                    alert('Hubo un error al actualizar el carrito.');
                }
            });
        }

        $('.btn-increase').click(function() {
            let id = $(this).data('id');
            let input = $(this).siblings('input');
            let newQuantity = parseInt(input.val()) + 1;
            input.val(newQuantity);
            updateCart(id, newQuantity);
        });

        $('.btn-decrease').click(function() {
            let id = $(this).data('id');
            let input = $(this).siblings('input');
            let newQuantity = parseInt(input.val()) - 1;
            if (newQuantity >= 1) {
                input.val(newQuantity);
                updateCart(id, newQuantity);
            }
        });
    });
</script>
@endsection
