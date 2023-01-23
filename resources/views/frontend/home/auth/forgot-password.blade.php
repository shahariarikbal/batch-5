@extends('frontend.master')

@section('content')
<div class="banner1">
    <div class="container">
        <h3><a href="{{ url('/') }}">Home</a> / <span>Forgot Password</span></h3>
    </div>
</div>

<div class="container" style="height: auto; margin-top: 40px; margin-bottom: 40px;">
    <div class="card">
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger">{{ session()->get('error') }}</div>
            @endif
            <div class="col-lg-12 checkout">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <h3>Forgot Password</h3>
                            <form action="{{ url('/forgot/password') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter email" />
                                </div>
                                <button type="submit" name="btn" class="btn btn-primary">Reset Password</button>
                            </form>
                            <a href="{{ url('/user-login') }}">Login</a>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
