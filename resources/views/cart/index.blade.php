@extends('admin.layouts.index')
@section('title','Your Cart')
@section('content')
    <div class="container">
        <table class="table table-bordered">

            <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Amount</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>

            @forelse($carts->items as $item)
                <tr>
                    <th>{{$item['item']->name}}</th>
                    <th>{{number_format($item['item']->price)}}</th>
                    <th>{{$item['totalQty']}}</th>

                    <th><a href="#" onclick="confirm('Ban chac chan muon xoa?')" class="btn btn-danger">
                            <i class="fa fa-trash "></i>
                        </a></th>

                </tr>
            @empty
                <tr>
                    <th colspan="4">No Data</th>
                </tr>
            @endforelse
            @if($carts)
                <tr>
                    <th colspan="2">Total Price</th>
                    <th colspan="2">{{number_format($carts->totalPrice)}} VNĐ</th>
                </tr>
            @else
                <tr>
                    <th colspan="2">Total Price</th>
                    <th colspan="2">0 VNĐ</th>
                </tr>
            @endif
            </tbody>

        </table>
        <a href="{{route('cart.checkout')}}" class="primary-btn order-submit">Checkout</a>
        <a href="#" class="primary-btn order-submit" onclick="confirm('Ban co chac muon xoa gio hang?')">Delete cart</a>
    </div>
@endsection
