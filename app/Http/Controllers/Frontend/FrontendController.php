<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPasswordMail;
use App\Mail\UserRegistartionEmail;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class FrontendController extends Controller
{
    public function index()
    {
        //$categories = Category::orderBy('id', 'desc')->where('status', 1)->get();
        $products = Product::with('category', 'brand')->where('status', 1)->orderBy('created_at', 'desc')->get();
        return view('frontend.home.index', compact('products'));
    }

    public function productDetails($id, $slug)
    {
        //$categories = Category::orderBy('id', 'desc')->where('status', 1)->get();
        $product = Product::with('productDetails')->find($id);
        return view('frontend.home.details', compact('product'));
    }

    public function categoryProducts($id, $slug)
    {
        //$categories = Category::with('products')->orderBy('id', 'desc')->where('status', 1)->get();
        $category = Category::with('products')->find($id);
        return view('frontend.home.category-products', compact('category'));
    }

    public function addToCart(Request $request)
    {
        $addToCart = new Cart();
        $addToCart->ip_address = $request->ip();
        $addToCart->product_id = $request->product_id;
        $addToCart->qty = $request->qty ? $request->qty : 1;
        $addToCart->price = $request->product_price;
        $addToCart->total_price = 1*$request->product_price;
        $addToCart->save();
        return redirect()->back()->withSuccess('Product has been added to cart');
    }

    public function checkout()
    {
        //$categories = Category::orderBy('id', 'desc')->where('status', 1)->get();
        //$carts = Cart::with('product')->where('ip_address', request()->ip())->get();
        return view('frontend.home.checkout');
    }

    public function payment()
    {
        return view('frontend.home.payment');
    }

    public function updateCartProduct(Request $request, $id)
    {
        $updateCartProduct = Cart::find($id);
        $updateCartProduct->qty = $request->qty;
        $updateCartProduct->save();
        return redirect()->back()->withSuccess('Product qty has been updated');
    }

    public function deleteCartProduct($id)
    {
        $deleteCartProduct = Cart::find($id);
        $deleteCartProduct->delete();
        return redirect()->back()->withError('Product has been deleted');
    }

    public function orderPlace(Request $request)
    {
        $order = new Order();
        $order->name = $request->name;
        $order->ip_address = $request->ip();
        $order->invoice_id = Str::random(5);
        $order->billing_address = $request->address;
        $order->shipping_address	 = $request->address;
        $order->shipping_address	 = $request->address;
        $order->phone	 = $request->phone;
        $order->total_price	 = $request->total_price;
        $order->total_qty	 = $request->total_qty;
        $order->save();
        return redirect('/payment')->withSuccess('Please payment');
    }

    public function userLogin()
    {
        //
    }

    public function userLoginRegister()
    {
        return view('frontend.home.auth.login-register');
    }
    public function forgotPassword()
    {
        return view('frontend.home.auth.forgot-password');
    }

    public function userForgotPassword(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if(!$user){
            return redirect()->back()->withError('Your request email not match our system.');
        }else{
            Mail::to($user->email)->send(new ForgotPasswordMail($user));
        }

        return redirect()->back()->withSuccess('Your reset password link send your email. Please check and set your new password.');

    }

    public function setNewPassword($id)
    {
        $user = User::find($id);
        return view('frontend.home.auth.set-password', compact('user'));
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required'
        ]);

        $passwordUpdate = User::where('id', $request->id)->first();
        $passwordUpdate->password = bcrypt($request->password);
        $passwordUpdate->save();
        return redirect()->back()->withSuccess('Your new password has been successfully updated.');
    }

    public function userRegistration(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = bcrypt($request->password);
        $user->save();
        if($user->save()){
            Mail::to($user->email)->send(new UserRegistartionEmail($user));
        }
        return redirect()->back()->withSuccess('Your registration has been successfully submitted, You can login now.');
    }
}
