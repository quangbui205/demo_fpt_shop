@extends('admin.layouts.dashboard')
@section('title','Edit Product')
@section('content')
    <div class="container">
        <form method="post" action="{{route('product.update', $product->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="{{$product->name}}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="price" value="{{$product->price}}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="description" rows="5" > {{$product ->description}}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Quatily</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="qty" value="{{$product->qty}}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                    <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option @if($product->category_id == $category->id)
                                    {{'selected'}}
                                    @endif
                                    value="{{$category->id}}">
                                {{$category->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="image" value="{{$product->image}}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
        </form>

    </div>
@endsection
