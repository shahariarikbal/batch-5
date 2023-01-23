@extends('frontend.master')

@section('content')
<div class="banner1">
    <div class="container">
        <h3><a href="{{ url('/') }}">Home</a> / <span>Products</span></h3>
    </div>
</div>
<!--banner-->
<!--content-->
    <div class="content">
        <div class="products-agileinfo">
                <h2 class="tittle">Women's Wear</h2>
            <div class="container">
                <div class="product-agileinfo-grids w3l">
                    <div class="col-md-3 product-agileinfo-grid">
                        <div class="categories">
                            <h3>Categories</h3>
                            <ul class="tree-list-pad">
                                @foreach ($categories as $category)
                                <li><input type="checkbox" checked="checked" id="item-0" /><label for="item-0"><span></span>{{ $category->name }}</label>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-9 product-agileinfon-grid1 w3l">
                        <div class="product-agileinfon-top">
                            <div class="col-md-6 product-agileinfon-top-left">
                                <img class="img-responsive " src="images/img1.jpg" alt="">
                            </div>
                            <div class="col-md-6 product-agileinfon-top-left">
                                <img class="img-responsive " src="images/img2.jpg" alt="">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="mens-toolbar">
                            <p >Showing 1–9 of 21 results</p>
                             <p class="showing">Sorting By
                                <select>
                                      <option value=""> Name</option>
                                      <option value="">  Rate</option>
                                        <option value=""> Color </option>
                                        <option value=""> Price </option>
                                </select>
                              </p>
                              <p>Show
                                <select>
                                      <option value=""> 9</option>
                                      <option value="">  10</option>
                                        <option value=""> 11 </option>
                                        <option value=""> 12 </option>
                                </select>
                              </p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav1 nav1-tabs left-tab" role="tablist">
                                <ul id="myTab" class="nav nav-tabs left-tab" role="tablist">
                            <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><img src="images/menu1.png"></a></li>
                            <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile"><img src="images/menu.png"></a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                                    <div class="product-tab">
                                        @foreach ($category->products as $product)
                                            <div class="col-md-4 product-tab-grid simpleCart_shelfItem">
                                                <div class="grid-arr">
                                                    <div  class="grid-arrival">
                                                        <figure>
                                                            <a href="#" class="new-gri">
                                                                <div class="grid-img">
                                                                    <img  src="{{ asset('/product/'.$product->image) }}" class="img-responsive" alt="">
                                                                </div>
                                                                <div class="grid-img">
                                                                    <img  src="{{ asset('/product/'.$product->image) }}" class="img-responsive"  alt="">
                                                                </div>
                                                            </a>
                                                        </figure>
                                                    </div>
                                                    <div class="block">
                                                        <div class="starbox small ghosting"> </div>
                                                    </div>
                                                    <div class="women">
                                                        <h6><a href="{{ url('/product/details/'.$product->id . '/' . $product->slug) }}">{{ $product->name }}</a></h6>
                                                        <span class="size">XL / XXL / S </span>
                                                        <p ><em class="item_price">${{ $product->price }}</em></p>
                                                        <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
    </div>
@endsection
