<?php

namespace App\Http\Controllers;
use App\Models\AdminSetting;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    private $product;
    private $products;

    public function cart(Request $request, $id)
    {

        $this->product = Product::find($id);

        Cart::add([

                'id' => $id,
                'name' => $this->product->name,
                'price' => $this->product->selling_price,
                'quantity' => $request->qty,
                'attributes' => [
                    'image' => $this->product->image,
                    ]
        ]);

        return redirect('/cart-products');
    }

    public function remove($id)
    {
        Cart::remove($id);
        return redirect('/cart-products');

    }

    public function cartProduct()
    {
        $this->products = Cart::getContent();

        return view('front.cart.cart', [
            'products' => $this->products,
            'setting'  => AdminSetting::get('shipping_in_dhaka'),
            'setting2'  => AdminSetting::get('shipping_outside_dhaka'),
            ]);
    }

    public function update(Request $request, $id)
    {
        Cart::update($id, [
            'quantity' => [
                'relative' => false,
                'value' => $request->qty
            ]
        ]);

        return redirect('/cart-products');
    }
}
