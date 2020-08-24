@extends('admin.layouts.dashboard')
@section('title','Add New Product')
@section('content')
    <div class="container">
        <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" placeholder="Name" >
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="price" placeholder="Price" >
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10" >
                    <textarea class="form-control" name="description" rows="5"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Quality</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="qty" placeholder="Quality" >
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                    <select class="form-control" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                    <input type="file" name="image" class="form-control"  required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">ADD</button>
            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
        </form>
    </div>
@endsection
