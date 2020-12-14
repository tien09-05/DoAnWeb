<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function index()
    {
        return view('pages.cart');
    }
    public function show_cart()
    {
        $cart = DB::table('tbl_cart')->orderBy('cart_id', 'desc')->get();
        return view('cart.show_cart')->with('cart', $cart);;
    }
    public function save_cart(Request $request)
    {
        $product_id = $request->product_id_hidden;
        $data = DB::table('tbl_product')->where('product_id', $product_id)->get();
        foreach ($data as $key => $value) {
            $dataCart = array();

            $dataCart['product_id'] = $value->product_id;
            $dataCart['product_name'] = $value->product_name;
            $dataCart['product_price'] = $value->product_price;
            $dataCart['quantity'] = 1;
            DB::table('tbl_cart')->insert($dataCart);
            return Redirect::to('show-cart');
        }
    }

    public function delete_cart($cart_id)
    {

        DB::table('tbl_cart')->where('cart_id', $cart_id)->delete();
        return Redirect::to('show-cart');
    }
    public function increse_quantity($cart_id)
    {
        $data = DB::table('tbl_cart')->where('cart_id', $cart_id)->get();
        foreach ($data as $key => $value) {
            DB::table('tbl_cart')->where('cart_id', $cart_id)->update(['quantity' => $value->quantity + 1]);
            return Redirect::to('show-cart');
        }
    }
    public function decrese_quantity($cart_id)
    {
        $data = DB::table('tbl_cart')->where('cart_id', $cart_id)->get();
        foreach ($data as $key => $value) {
            DB::table('tbl_cart')->where('cart_id', $cart_id)->update(['quantity' => $value->quantity - 1]);
            return Redirect::to('show-cart');
        }
    }
}
