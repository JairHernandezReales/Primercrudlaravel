<?php

namespace App\Http\Controllers;

use App\Models\exitproduct;
use App\Models\facturas;
use App\Models\Personas;
use App\Models\productos;
use App\Models\salidainventario;
use Illuminate\Http\Request;

class FacturasController extends Controller
{
    public function index()
    {
        $facturas = facturas::all();
        return view('facturas.index', compact('facturas'));
    }

    public function create()
    {
        $clientes = Personas::all();
        $productos = productos::all();
        $productosJson = $productos->toJson(); // Convertir a JSON
        return view('facturas.create',compact('clientes', 'productos', 'productosJson'));
    }

    public function store(Request $request)
    {
        // Validar los datos recibidos
        $request->validate([
            'clientes' => 'required|exists:personas,id', // Suponiendo que tus clientes están en la tabla personas
            'precio_neto' => 'required|numeric',
            'iva' => 'required|numeric',
            'descuento' => 'required|numeric',
            'precio_total' => 'required|numeric',
        ]);

        // Crear una nueva factura
        $factura = new facturas();
        $factura->cliente_id = $request->clientes; // Asumiendo que 'clientes' es el ID del cliente
        $factura->precio_neto = $request->precio_neto;
        $factura->iva = $request->iva;
        $factura->descuento = $request->descuento;
        $factura->precio_total = $request->precio_total;
        $factura->save();

        // Registrar salidas de inventario
        foreach ($request->productos as $producto) {
            salidainventario::create([
                'factura_id' => $factura->id, // ID de la factura que acabamos de crear
                'producto_id' => $producto['producto'], // ID del producto
                'cantidad' => $producto['cantidad'], // Cantidad del producto
            ]);
        }

        // Redirigir o devolver una respuesta
        return redirect()->route('personas.dashboard')->with('success', 'Factura creada exitosamente.');
    }

    public function show(facturas $facturas)
    {
        //
    }

    public function edit(facturas $facturas)
    {
        return view('facturas.edit');
    }

    public function update(Request $request, facturas $facturas)
    {
        //
    }

    public function destroy(facturas $id)
    {
        // Eliminar un registro de la BD
        $id->delete();
        return back()->with('success','success');
    }
}
