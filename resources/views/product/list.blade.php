@extends('admin.layouts.dashboard')
@section('title','List Product')
@section('content')
    <table class="table table-bordered" >
        <thead>
        <tr>
            <th>STT</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Quality</th>
            <th>Category</th>
            <th>Image</th>
            <th colspan="2">Edit</th>
        </tr>
        </thead>
        <tbody>
        @forelse($products as $key => $product)
            <tr>
                <th>{{++$key}}</th>
                <th>{{$product->name}}</th>
                <th>{{$product->price}}</th>
                <th>{{$product->description}}</th>
                <th>{{$product->qty}}</th>
                <th>{{$product->category->name}}</th>
                <th><img src="{{asset('storage/'.$product->image)}}" height="50px" width="50px"></th>
                <th><a href="{{route('product.edit',$product->id)}}" class=" btn btn-primary"><i class="fa fa-edit"></i></a></th>
                <th><a href="{{route('product.delete',$product->id)}}" onclick="confirm('Ban chac chan muon xoa?')" class="btn btn-danger">
                        <i class="fa fa-trash "></i>
                    </a></th>
            </tr>
        @empty
            <tr>
                <th colspan="9">No Data</th>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
