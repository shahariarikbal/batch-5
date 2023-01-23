@extends('frontend.master')


@section('content')
<!--banner-->
<div class="banner1">
    <div class="container">
        <h3><a href="{{ url('/') }}">Home</a> / <span>Checkout</span></h3>
    </div>
</div>
<!--banner-->

<!--content-->
<div class="content">
    <div class="cart-items">
        <div class="container">
             <h2>My Shopping Bag (3)</h2>
             <table class="table table-bordered">
                <tr>
                    <th>SL</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </tr>
                @php
                    $sum = 0;
                    $qty = 0;
                @endphp
                @foreach ($carts as $cart)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>
                            <img src="{{ asset('/product/'.$cart->product->image) }}" height="50" width="50"/>
                        </td>
                        <td>{{ $cart->product->name }}</td>
                        <td>
                            <form action="{{ url('/cart/product/update/'.$cart->id) }}" method="post">
                                @csrf
                                <input type="number" name="qty" value="{{ $totalQty = $cart->qty }}"/> <button type="submit" class="btn btn-sm btn-primary">Update</button>
                            </form>
                        </td>
                        <td>{{ $cart->price }}</td>
                        <td>
                            {{ $totalPrice = $cart->qty*$cart->price }}
                        </td>
                        <td>
                            <a href="{{ url('/cart/product/delete/'.$cart->id) }}" onclick="return confirm('Are you sure delete this product ?')" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>

                    @php
                        $sum += $totalPrice;
                        $qty += $totalQty;
                    @endphp
                @endforeach
             </table>
        </div>
        <div class="container">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h1>
                            <center>Billing Information</center>
                        </h1>
                        <form action="{{ url('/order/place') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="total_price" value="{{ $sum }}" class="form-control" placeholder="Enter name" />
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="total_qty" value="{{ $qty }}" class="form-control" placeholder="Enter email" />
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name" />
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="tel" name="phone" class="form-control" placeholder="Enter phone" />
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" name="address" rows="5" placeholder="Enter address"></textarea>
                        </div>
                        <button type="submit" class="btn btn-block btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
    </div>
<!-- checkout -->
@endsection
