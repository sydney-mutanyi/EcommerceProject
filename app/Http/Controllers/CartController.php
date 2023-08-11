<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Http\Controllers\toJson;
use App\Models\Category;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartList1()
    {

        $cartItems = \Cart::getContent();

   


        $cartTotal = \Cart::getTotal() + 300;
        $categories = Category::orderBy('id','asc')->take(6)->get();

        return view('client.cart',[
            'cartItems'=> $cartItems,
            'cartTotal' =>$cartTotal,
            'categories' => $categories

        ] );


    }

    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' =>$request->quantity,
            'attributes' => array(
                'image' => $request->image,
                'product_size' => $request->product_size,
                'product_color' => $request->product_color
            )
        ]);


        session()->flash('success', 'Product Added to Cart !');

        return redirect()->route('cart.list1');
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
        session()->flash('success', 'Product Updated !');

        return redirect()->route('cart.list1');
    }



    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Product Removed !');

        return redirect()->route('cart.list1');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list1');
    }

    public function cartList()
    {
        $cartItems = \Cart::getContent();


        //  dd(gettype($cartItems));
        // // dd($cartItems);

       //  $data->amount = json_encode($request->get('amount'));
        return view('trials.cart', compact('cartItems'));
    }

    public function create1(){

        return view ('trials.trials');
    }







}



