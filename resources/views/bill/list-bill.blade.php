@extends('admin.layouts.dashboard')
@section('title','List Bill')
@section('content')
    <table class="table table-bordered" >
        <thead>
        <tr>
            <th>STT</th>
            <th>Price</th>
            <th>Status</th>
            <th>Note</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody>
        @forelse($bills as $key => $bill)
            <tr>
                <th>{{++$key}}</th>
                <th>{{$bill->totalPrice}}</th>
                <th>{{$bill->status}}</th>
                <th>{{$bill->note}}</th>
                <th><a href="{{route('bill.viewdetail',$bill->id)}}" class=" btn btn-primary"><i class="fa fa-edit"></i></a></th>
            </tr>
        @empty
            <tr>
                <th colspan="9">No Data</th>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
