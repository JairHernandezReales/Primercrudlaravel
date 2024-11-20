@extends('layout.plantilla')

@section('tituloPagina', 'Crud laravel 8')

@section('contenido')
<div class="card mt-5 mb-5">
    <div class="card-header">
        <h3 class="nfactura">Crear Nueva compra</h3>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-lg-5 col-md-5 d-flex">
                <a href="" class="btn btn-primary me-3">
                    <i class="fa-solid fa-house"></i>
                </a>
            </div>
        </div>

        <hr>
        <p class="card-text">
            <form action="{{ route('compras.guardar') }}" method="POST">
                @csrf
                <!-- Datos de la Factura -->
                <div class="mb-3">
                    <input type="text" class="form-control" name="numero_factura" placeholder="numero de factura">
                </div>
                <div class="mb-3">
                    <select name="proveedor" class="form-control" required>
                        <option value="">Seleccione un proveedor</option>
                        @foreach($proveedores as $items)
                        <option value="{{ $items->id }}">{{ $items->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <h2>Productos</h2>
                <table id="productos_table">
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Descuento (%)</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>
                            <select name="productos[0][producto]" class="form-control" required>
                                <option value="">Seleccione un producto</option>
                                @foreach($productos as $producto)
                                <option value="{{ $producto->id }}">{{ $producto->codigo }} {{ $producto->nombre }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><input class="form-control ms-2" type="number" name="productos[0][cantidad]"
                                oninput="calcularTotal()" required></td>
                        <td><input class="form-control" type="number" name="productos[0][precio_unitario]" step="0.01"
                                required></td>
                        <td><input class="form-control" type="number" name="productos[0][descuento]" step="0.01"
                                oninput="calcularTotal()" required></td>
                        <td><button type="button" onclick="eliminarProducto(this)" class="btn btn-danger"><i
                                    class="fa-solid fa-trash"></i></button></td>
                    </tr>
                </table>
                <br>

                <!-- Resumen de Totales -->
                <div class="resumen">
                    <p>Cantidad de Ítems: <span id="cantidad_items">0</span></p>
                    <p>Precio Neto: $<span id="precio_neto">0.00</span></p>
                    <p>IVA 19%: $<span id="iva">0.00</span></p>
                    <p>Descuento: $<span id="descuento">0.00</span></p>
                    <p>Precio Total: $<span id="precio_total">0.00</span></p>
                </div>

                <!-- Campos ocultos para enviar los totales -->
                <input type="hidden" name="precio_neto" id="input_precio_neto" value="0.00">
                <input type="hidden" name="iva" id="input_iva" value="0.00">
                <input type="hidden" name="descuento" id="input_descuento" value="0.00">
                <input type="hidden" name="precio_total" id="input_precio_total" value="0.00">

                <button type="submit" class="btn btn-primary">Guardar compra</button>
            </form>

        </p>
    </div>
</div>


@endsection
