<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminLoginForm()
    {
        return view('backend.admin.login');
    }

    public function adminLogin(Request $request)
    {
        $admin = Admin::where('email', $request->email)->first();
        if(!$admin){
            return redirect()->back()->with('error', 'Invalid user');
        }else{
            if(password_verify($request->password, $admin->password)){
                session()->put('adminId', $admin->id);
                return redirect('/admin/dashboard');
            }else{
                return redirect()->back()->with('error', 'Password Invalid');
            }

        }
    }

    public function adminDashboard()
    {
        return view('backend.home.index');
    }

    public function adminLogout()
    {
        session()->flush();
        return redirect('/admin/login')->withSuccess('You are successfully logout');
    }

    public function orders()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('backend.order.orders', compact('orders'));
    }

    public function orderView($id)
    {
        $order = Order::orderBy('created_at', 'desc')->where('id', $id)->first();
        return view('backend.order.order-view', compact('order'));
    }
}
