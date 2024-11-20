<?php

namespace App\Http\Controllers;

use App\Models\productos;
use Illuminate\Http\Request;

class ControladorController extends Controller
{
    public function index()
    {
        $productos = productos::latest()->get();
        return view('publicas.inicio', compact('productos'));
    }

    public function productos()
    {
        $productos = productos::all();
        return view('publicas.productos', compact('productos'));
    }

    public function quienessomos()
    {
        return view('publicas.quienessomos');
    }

    public function contactanos()
    {
        return view('publicas.contactanos');
    }

    public function addToCart(Request $request)
    {
        $cart = session()->get('cart', []);

        $productId = $request->input('product_id');
        $productName = $request->input('product_name');
        $price = $request->input('product_price');

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                'name' => $productName,
                'price' => $price,
                'quantity' => 1
            ];
        }

        session()->put('cart', $cart);

        return response()->json(['cartCount' => count($cart)]);
    }


    public function viewCart()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->input('quantity');
            session()->put('cart', $cart);
        }

        return response()->json(['success' => true]);
    }


    public function remove($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return back()->with('success', 'Producto eliminado del carrito.');
    }


}
