<?php

namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use App\Order;
use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use Auth;

class ProductController extends Controller
{
    public function getIndex()
    {
        $products = Product::all();
        return view('shop.index', ['products' => $products]);
    }

    public function getAddToCart(Request $request, $id)
    {
    	$product = Product::find($id);
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
    	$cart = new Cart($oldCart);
    	$cart->add($product, $product->id);

    	$request->session()->put('cart', $cart);
    	return redirect()->route('product.index')->with('successAddToCart', 'Product successfuly added to cart!');
    }

    public function getReduceByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        if(count($cart->items) > 0) {
            Session::put('cart', $cart);
        }
        else {
            Session::forget('cart');
        }
        
        return redirect()->route('product.shoppingCart');
    }

    public function getRemoveItem($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if(count($cart->items) > 0) {
            Session::put('cart', $cart);
        }
        else {
            Session::forget('cart');
        }

        return redirect()->route('product.shoppingCart');
    }

    public function getCart() {
    	if (!Session::has('cart')) {
    		return view('shop.shopping-cart');
    	}
    	$oldCart = Session::get('cart');
    	$cart = new Cart($oldCart);
    	return view('shop.shopping-cart', ['products'=>$cart->items, 'totalPrice'=>$cart->totalPrice]);
    }

    public function getSubmitCart() {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkout', ['total' => $total]);
    }

    public function getCheckout() {
        if (!Session::has('cart')) {
            return redirect()->route('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $order = new Order();
        $order->cart = base64_encode(serialize($cart));
        $order->user_address = Auth::user()->address;
        $order->user_fullName = Auth::user()->fullName;
        
        Auth::user()->orders()->save($order);

        Session::forget('cart');
        return redirect()->route('product.index')->with('successOrder', 'Order successful!');
    }
}
