<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cartList()
    {
        $cartItems = \Cart::getContent();
        return view('cart', compact('cartItems'));
    }

    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        session()->flash('success', 'El articulo se añadió con exito');
        return redirect()->route('user.cart.list');
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );
        session()->flash('success', 'El articulo fue actualizado correctamente');
        return redirect()->route('user.cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
            session()->flash('success', 'Se ha removido el articulo');
        return redirect()->route('user.cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();
        session()->flash('success', 'Carrito vacio !');
        return redirect()->route('user.cart.list');
    }
}