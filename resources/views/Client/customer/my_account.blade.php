@extends('Client.layout')
@section('title')
Tài khoản của tôi
@endsection
@section('css')
<style type="text/css">
    .modal-body b {
        color: #3862f5;
    }

    .modal-body span.text_black {
        color: black;
        font-weight: 600;
    }
</style>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <!-- My Account Page Start -->
            <div class="myaccount-page-wrapper">
                <!-- My Account Tab Menu Start -->
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <div class="myaccount-tab-menu nav" role="tablist">
                            <a href="#dashboad" class="active" data-toggle="tab"><i class="fa fa-dashboard"></i>
                                Dashboard</a>
                            <a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Danh sách đặt
                                hàng</a>
                            <a href="#payment-method" data-toggle="tab"><i class="fa fa-credit-card"></i> Phương thức
                                thanh toán</a>
                            <a href="#address-edit" data-toggle="tab"><i class="fa fa-map-marker"></i> Thông tin tài
                                khoản</a>
                            <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> Thay đổi thông tin</a>
                            <a href="#" id="btnLogout"><i class="fa fa-sign-out"></i> Đăng xuất</a>
                        </div>
                    </div>
                    <!-- My Account Tab Menu End -->
                    <!-- My Account Tab Content Start -->
                    <div class="col-lg-9 col-md-8">
                        <div class="tab-content" id="myaccountContent">
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Dashboard</h3>
                                    <div class="welcome">
                                        <p>Xin chào, <strong>{{ Auth::guard('customer')->user()->name }}</strong></p>
                                    </div>
                                    <p class="mt-2">Chào mừng bạn quay trở lại !</p>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="orders" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Orders</h3>
                                    @if ($orders->count() > 0)
                                    <div class="myaccount-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tên người đặt</th>
                                                    <th>Ngày đặt</th>
                                                    <th>Trạng thái</th>
                                                    <th>Tổng tiền</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $i = 0;
                                                @endphp
                                                @foreach ($orders as $order)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $order->order_name }}</td>
                                                    <td>{{ date('d/m/Y H:i:s A', strtotime($order->created_at)) }}</td>
                                                    <td>
                                                        @switch($order->payment_status)
                                                        @case(0)
                                                        <span class="badge badge-secondary">Chưa xác thực</span>
                                                        @break
                                                        @case(1)
                                                        <span class="badge badge-primary">Đã xác thực</span>
                                                        @break
                                                        @case(2)
                                                        <span class="badge badge-warning">Đang giao hàng</span>
                                                        @break
                                                        @case(3)
                                                        <span class="badge badge-success">Đã thanh toán</span>
                                                        @break
                                                        @default
                                                        <span class="badge badge-danger">Đã huỷ</span>
                                                        @endswitch
                                                    </td>
                                                    <td>{{ number_format($order->total_money) }} đ</td>
                                                    <td><button type="button" class="btn btn-primary btn-sm"
                                                            id="btnViewOrder" data-toggle="modal"
                                                            data-target=".ModalView" data-id="{{$order->id}}">Xem chi
                                                            tiết</button></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    @else
                                    <p style="color: red; font-weight: bold">Tài khoản chưa đặt đơn hàng nào</p>
                                    @endif
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="download" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Downloads</h3>
                                    <div class="myaccount-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Date</th>
                                                    <th>Expire</th>
                                                    <th>Download</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Haven - Free Real Estate PSD Template</td>
                                                    <td>Aug 22, 2018</td>
                                                    <td>Yes</td>
                                                    <td><a href="#" class="check-btn sqr-btn "><i
                                                                class="fa fa-cloud-download"></i> Download File</a></td>
                                                </tr>
                                                <tr>
                                                    <td>HasTech - Profolio Business Template</td>
                                                    <td>Sep 12, 2018</td>
                                                    <td>Never</td>
                                                    <td><a href="#" class="check-btn sqr-btn"><i
                                                                class="fa fa-cloud-download"></i> Download File</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Payment Method</h3>
                                    <p class="saved-message">You Can't Saved Your Payment Method yet.</p>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Thông tin tài khoản</h3>
                                    <address>
                                        <p>Tên tài khoản: <strong>{{Auth::guard('customer')->user()->username}}</strong>
                                        </p>
                                        <p>Họ và tên: <strong>{{Auth::guard('customer')->user()->name}}</strong></p>
                                        <p>Địa chỉ: <strong>{{Auth::guard('customer')->user()->address}}</strong></p>
                                        <p>Email: <strong>{{Auth::guard('customer')->user()->email}}</strong></p>
                                        <p>Avartar: <strong>Không có</strong></p>
                                        <p>Điện thoại: <strong>{{Auth::guard('customer')->user()->phone}}</strong></p>
                                        <p>Giới tính:
                                            <strong>
                                                @if (Auth::guard('customer')->user()->gender == 0)
                                                Nữ
                                                @else
                                                @if (Auth::guard('customer')->user()->gender == 1)
                                                Nam
                                                @else
                                                Khác
                                                @endif
                                                @endif
                                            </strong>
                                        </p>
                                        <p>Ngày sinh:
                                            <strong>{{Auth::guard('customer')->user()->date_of_birth}}</strong></p>
                                        <p>Ngày tạo:
                                            <strong>{{Auth::guard('customer')->user()->created_at->format('d/m/Y H:i:s A')}}</strong>
                                        </p>
                                    </address>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="account-info" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Account Details</h3>
                                    <div class="account-details-form">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="single-input-item">
                                                        <label for="first-name" class="required">First Name</label>
                                                        <input type="text" id="first-name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="single-input-item">
                                                        <label for="last-name" class="required">Last Name</label>
                                                        <input type="text" id="last-name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-input-item">
                                                <label for="display-name" class="required">Display Name</label>
                                                <input type="text" id="display-name">
                                            </div>
                                            <div class="single-input-item">
                                                <label for="email" class="required">Email Addres</label>
                                                <input type="email" id="email">
                                            </div>
                                            <fieldset>
                                                <legend>Password change</legend>
                                                <div class="single-input-item">
                                                    <label for="current-pwd" class="required">Current Password</label>
                                                    <input type="password" id="current-pwd">
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="single-input-item">
                                                            <label for="new-pwd" class="required">New Password</label>
                                                            <input type="password" id="new-pwd">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="single-input-item">
                                                            <label for="confirm-pwd" class="required">Confirm
                                                                Password</label>
                                                            <input type="password" id="confirm-pwd">
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <div class="single-input-item">
                                                <button class="check-btn sqr-btn ">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> <!-- Single Tab Content End -->
                        </div>
                    </div> <!-- My Account Tab Content End -->
                </div>
            </div> <!-- My Account Page End -->
        </div>
    </div>
</div>
<div class="modal fade ModalView" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="myLargeModalLabel" style="font-weight: bold;font-size: 18px;">
                    Thông tin đơn đặt hàng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Tên người đặt:</b> <span id="order_name" class="text_black"></span></p>
                <p><b>Địa chỉ:</b> <span id="order_address" class="text_black"></span></p>
                <p><b>Email:</b> <span id="order_email" class="text_black"></span></p>
                <p><b>Điện thoại:</b> <span id="order_phone" class="text_black"></span></p>
                <p><b>Ngày đặt:</b> <span id="created_at" class="text_black"></span></p>
                <p><b>Trạng thái:</b> <span id="payment_status" class="text_black"></span></p>
                <div class="table-responsive mt-3">
                    <table class="table cart-table" style="border: 1px solid #e6e6e6;">
                        <thead>
                            <tr>
                                <th>Ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody id="order_details">
                        </tbody>
                    </table>
                </div>
                <p><b style="color: #3862f5">Lời nhắn:</b> <span id="order_note" class="text_black"></span></p>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark btn-rounded mt-3 mb-3" data-dismiss="modal">Hủy</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function () {
        var account = {
            init: function() {
                account.registersEvent();
            },
            registersEvent: function() {

                //Đăng xuất
                $('#btnLogout').off('click').on('click', function(event) {
                    event.preventDefault();
                    account.LogoutCustomer();
                });

                //Xem chi tiết đơn hàng
                $('#btnViewOrder').off('click').on('click', function() {
                    var id_order = $(this).data('id');
                    if(id_order != "")
                        account.ViewOrder(id_order);
                });
            },
            LogoutCustomer: function() {
                var url_logout = "{!! route('customer.logout') !!}";
                $.ajax({
                    url: url_logout,
                    type: 'GET',
                    dataType: 'json',
                    success: function(res) {
                        if(res.status)
                        {
                            toastr["success"]("Đăng xuất thành công");
                            var url_login = "{!! route('customer.login') !!}";
                            setTimeout(function() {
                                window.location.href = url_login;
                            }, 1000);
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            },
            ViewOrder: function(id_order) {
                var url_view_order = "{!! route('customer.view_order') !!}";
                $.ajax({
                    url: url_view_order,
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        id_order: id_order
                    },
                    success: function(res) {
                        if(res.status) {
                            $('#order_name').text(res.order.order_name);
                            $('#order_address').text(res.order.order_address);
                            $('#order_email').text(res.order.order_email);
                            $('#order_phone').text(res.order.order_phone);
                            $('#created_at').text(res.created_at);
                            $('#order_note').text(res.order.order_note);
                            var html_payment_status = ``;
                            switch (res.order.payment_status) {
                                case 0:
                                    html_payment_status = `<span class="badge badge-secondary">Chưa xác thực</span>`;
                                    break;
                                case 1:
                                    html_payment_status = `<span class="badge badge-primary">Đã xác thực</span>`;
                                    break;
                                case 2:
                                    html_payment_status = `<span class="badge badge-warning">Đang giao hàng</span>`;
                                    break;
                                case 3:
                                    html_payment_status = `<span class="badge badge-success">Đã thanh toán</span>`;
                                    break;
                                case -1:
                                    html_payment_status = `<span class="badge badge-danger">Đã huỷ</span>`;
                                    break;
                            }
                            $('#payment_status').html(html_payment_status);
                            var url = "{{url('/')}}";
                            var html = ``;
                            $.each(res.products, function(index, value) {
                                var url_view_detail = "{!! url('/') !!}" + `/product/${value.alias}/${value.id}`;
                                html += `<tr>
                                                <td><a href="${url_view_detail}"><img class="product-thumbnail img-fluid" src="${url+value.image}"
                                                    alt="" style="max-width: 80px"></a>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0"><a href="${url_view_detail}">${value.name}</a></h6>
                                                </td>
                                                <td>${parseFloat(value.price).toLocaleString('it-IT', {style : 'currency', currency : 'VND'})}</td>
                                                <td>
                                                    <p class="product-quantity">x ${value.quantity}</p>
                                                </td>
                                                <td>${(value.price * value.quantity).toLocaleString('it-IT', {style : 'currency', currency : 'VND'})}</td>
                                            </tr>`;
                            });
                            var total_money = parseFloat(res.order.total_money).toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
                            html += `<tr class="total-amount">
                                        <td>Tổng tiền</td>
                                        <td>${total_money}</td>
                                    </tr>`;
                            $('#order_details').html(html);
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            }
        };
        account.init();
    });
</script>
@endsection