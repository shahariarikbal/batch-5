<div class="header">
    <div class="header-top">
        <div class="container">
             <div class="top-left">
                <a href="#"> Help  <i class="glyphicon glyphicon-phone" aria-hidden="true"></i> +0123-456-789</a>
            </div>
            <div class="top-right">
            <ul>
                <li><a href="{{ url('/checkout') }}">Checkout</a></li>
                <li><a href="{{ url('/user/login-register') }}">Login</a></li>
                <li><a href="{{ url('/user/login-register') }}"> Create Account </a></li>
            </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="heder-bottom">
        <div class="container">
            <div class="logo-nav">
                <div class="logo-nav-left">
                    <h1><a href="{{ url('/') }}">New Shop <span>Shop anywhere</span></a></h1>
                </div>
                <div class="logo-nav-left1">
                    <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header nav_2">
                        <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="{{ url('/') }}" class="act">Home</a></li>
                            @foreach ($categories as $category)
                            <li><a href="{{ url('/category/products/'. $category->id . '/' .$category->slug) }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    </nav>
                </div>
                <div class="header-right2">
                    <div class="cart box_1">
                        <a href="{{ url('/checkout') }}">
                            <h3> <div class="total">
                                <span class=""></span> (<span class="">{{ App\Models\Cart::get()->count() }}</span> items)</div>
                                <img src="{{ asset('/frontend/assets/') }}/images/bag.png" alt="" />
                            </h3>
                        </a>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
</div>
