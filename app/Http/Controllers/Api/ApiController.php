<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function addToCart(Request $request)
    {
        //dd($request->all());
        try{
            $addToCart = new Cart();
            $addToCart->ip_address = $request->ip();
            $addToCart->product_id = $request->product_id;
            $addToCart->qty = 1;
            $addToCart->price = $request->price;
            $addToCart->total_price = 1*$request->price;
            $addToCart->save();
            return response()->json([
                'status' => 200,
                'message' => 'Product added to cart'
            ]);
        }catch(Exception $exception){
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ]);
        }
    }

    public function getNewArrivalProducts()
    {
        try{
            $products = Product::with('category', 'brand')->where('status', 1)->orderBy('created_at', 'desc')->get();
            return response()->json([
                'status' => 200,
                'message' => 'Get all products',
                'products' => $products
            ]);
        }catch(Exception $exception){
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ]);
        }
    }

    public function cartProducts()
    {
        try{
            $carts = Cart::with('product')->where('ip_address', request()->ip())->get();
            return response()->json([
                'status' => 200,
                'message' => 'Get all cart products',
                'carts' => $carts
            ]);
        }catch(Exception $exception){
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ]);
        }
    }

    public function cartProductUpdate(Request $request, $id)
    {
        try{
            $updateCartProduct = Cart::find($id);
            $updateCartProduct->qty = $request->qty;
            $updateCartProduct->save();
            return response()->json([
                'status' => 200,
                'message' => 'Cart product has been updated',
                'cartProduct' => $updateCartProduct
            ]);
        }catch(Exception $exception){
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ]);
        }
    }
    public function cartProductDelete($id)
    {
        try{
            $updateCartDelete = Cart::find($id);
            $updateCartDelete->delete();
            return response()->json([
                'status' => 301,
                'message' => 'Cart product has been deleted',
            ]);
        }catch(Exception $exception){
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ]);
        }
    }
}
