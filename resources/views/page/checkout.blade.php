@extends('master')
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <form action="{{ route('checkout') }}" class="form-horizontal" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Thông Tin Cá Nhân</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="control-label col-xs-2">Họ Tên</label>
                                    <div class="col-xs-10">
                                        <input value="@if(Auth::check()){{ Auth::user()->full_name }}@endif" type="text" name="full_name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-2">Email</label>
                                    <div class="col-xs-10">
                                        <input value="@if(Auth::check()){{ Auth::user()->email }}@endif" type="email" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-2">Địa chỉ</label>
                                    <div class="col-xs-10">
                                        <textarea rows="3" name="address" class="form-control">@if(Auth::check()){{ Auth::user()->address }}@endif</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-2">Số Điện Thoại</label>
                                    <div class="col-xs-10">
                                        <input value="@if(Auth::check()){{ Auth::user()->phone }}@endif" type="number" name="phone" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-2">Ghi Chú</label>
                                    <div class="col-xs-10">
                                        <textarea rows="6" name="note" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-2">Hình Thức Thanh Toán</label>
                                    <div class="col-xs-10">
                                        <div class="radio">
                                            <label><input type="radio" name="payment" value="Home">Trực Tiếp</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="payment" value="ATM">Chuyển Khoản</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-offset-2 col-xs-10">
                                        <button type="submit" class="btn btn-success btn-lg pull-right">Xác Nhận Đặt
                                            Hàng
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 col-md">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Giỏ Hàng Của Bạn: {{ Session('cart')->totalQty . ' Sản Phẩm'}}</h3>
                        </div>
                        <div class="panel-body">
                            @foreach($product_cart as $product)
                                <div class="thumbnail">
                                    <img src="images/{{ $product['item']['image'] }}" alt="" style="max-width: 100px;">
                                    <div class="caption text-center">
                                        <h5>{{ $product['item']['title'] }}</h5>
                                        <p>Số lượng: {{ $product['qty'] }}</p>
                                        <p>Giá: {{ number_format($product['price']) . 'VNĐ' }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="panel-footer">
                            <h3 class="panel-title">Tổng
                                Tiền: {{ number_format(Session('cart')->totalPrice) . 'VNĐ' }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---->
@endsection