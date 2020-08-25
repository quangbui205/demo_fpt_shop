@extends('admin.layouts.dashboard')
@section('content')
    <div class="container">
        <div class="table-responsive">
            <h2>Thông tin khách hàng</h2>
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <tr class="data-user">
                        <th>Họ và tên</th>
                        <td>{{ $bill->customer->name}}</td>
                    </tr>
                    <tr class="data-user">
                        <th>Địa chỉ</th>
                        <td>{{ $bill->customer->address }}</td>
                    </tr>
                    <tr class="data-user">
                        <th>Số điện thoại</th>
                        <td>{{ $bill->customer->phone }}</td>
                    </tr>
                    <tr class="data-user">
                        <th>Email</th>
                        <td>{{ $bill->customer->email }}</td>
                    </tr>
                </table>

                <h2 class="mt-5">Chi tiết đơn hàng</h2>
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                    <tr class="table-info">
                        <th>Sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                    </tr>
                    </thead>
                    @foreach($bill->products as $key => $value)

                        <tr class="data-user">
                            <td>{{ $value['name'] }}</td>
                            <td><img style="width: 100px" src="{{asset('storage/' . $value['image']) }}" alt=""></td>
                            <td>x {{ $detail[$key]['qtyOrder'] }}</td>
                            <td>{{number_format($value['price']) }}</td>
                        </tr>
                    @endforeach
                    <tr class="data-user">
                        <td colspan="3"><strong>Tổng tiền</strong></td>
                        <td>{{number_format($bill->totalPrice) }} VNĐ</td>
                    </tr>
                    <tr>
                        <td colspan="2"><strong>Trạng thái đơn hàng</strong></td>
                        <td>
                            <select name="status" id="">
                                <option value="Đang xử lý" @if($bill->status == "Đang xử lý")
                                selected
                                    @endif>
                                    Đang xử lý
                                </option>
                                <option value="Đang giao" @if($bill->status == "Đang giao" )
                                selected
                                    @endif>
                                    Đang giao
                                </option>
                                <option value="Hoàn thành" @if($bill->status == "Hoàn thành" )
                                selected
                                    @endif>
                                    Hoàn thành
                                </option>
                                <option value="Hủy bỏ" @if($bill->status == "Hủy bỏ" )
                                selected
                                    @endif>
                                    Hủy bỏ
                                </option>
                            </select>
                        </td>
                        <td>
                            <button class="btn-primary" type="submit">Cập nhật</button>
                        </td>
                    </tr>
                </table>
        </div>
    </div>
@endsection
