@extends('admin.layouts.index')
@section('title','Checkout')
@section('content')
    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <h3 class="breadcrumb-header">Checkout</h3>
                    <ul class="breadcrumb-tree">
                        <li><a href="#">Home</a></li>
                        <li class="active">Checkout</li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /BREADCRUMB -->

    <!-- SECTION -->
    <form method="POST" action="{{route('cart.placeOder')}}">
        @csrf
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                    <div class="col-md-7">
                        <!-- Billing Details -->
                        <div class="billing-details">
                            <div class="section-title">
                                <h3 class="title">Billing address</h3>
                            </div>

                            <div class="form-group">
                                <input class="input" type="text" name="name" placeholder="Your Name">
                            </div>
                            <div class="form-group">
                                <input class="input" type="number" name="phone" placeholder="Telephone">
                            </div>
                            <div class="form-group">
                                <input class="input" type="email" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="address" placeholder="Address">
                            </div>

                        </div>
                        <!-- /Billing Details -->
                        <!-- Order notes -->
                        <div class="order-notes">
                            <textarea class="input" placeholder="Order Notes" name="note"></textarea>
                        </div>
                        <!-- /Order notes -->
                    </div>

                <!-- Order Details -->
                <div class="col-md-5 order-details">
                    <div class="section-title text-center">
                        <h3 class="title">Your Order</h3>
                    </div>
                    <div class="order-summary">
                        <div class="order-col">
                            <div><strong>PRODUCT</strong></div>
                            <div><strong>TOTAL</strong></div>
                        </div>
                        <div class="order-products">
                            @foreach($carts->items as $item)
                            <div class="order-col">
                                <div>{{$item['totalQty']}} x {{$item['item']->name}}</div>
                                <div>{{number_format($item['item']->price)}}</div>
                            </div>
                            @endforeach
                        </div>
                        <div class="order-col">
                            <div>Shiping</div>
                            <div><strong>FREE</strong></div>
                        </div>
                        <div class="order-col">
                            <div><strong>TOTAL</strong></div>
                            <div><strong class="order-total">{{number_format($carts->totalPrice)}} VNĐ</strong></div>
                        </div>
                    </div>
                    <div class="input-checkbox">
                        <input type="checkbox" id="terms">
                        <label for="terms">
                            <span></span>
                            I've read and accept the <a href="#">terms & conditions</a>
                        </label>
                    </div>
                    <button type="submit" href="#" class="primary-btn order-submit">Place order</button>
                </div>
                <!-- /Order Details -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    </form>
    <!-- /SECTION -->
@endsection
