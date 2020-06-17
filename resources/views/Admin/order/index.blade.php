@extends('Admin.layout')
@section('title')| Đơn hàng @endsection
@section('css')
<link href="{{asset('public/admin/plugins/animate/animate.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('public/admin/assets/css/modals/component.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('public/admin/assets/css/ui-kit/custom-modal.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('public/admin/assets/css/ui-kit/buttons/creative/creative-material.css')}}" rel="stylesheet"
    type="text/css">
<link href="{{asset('public/admin/plugins/notification/snackbar/snackbar.min.css')}}" rel="stylesheet" type="text/css">
<script src="{{asset('public/admin/plugins/sweetalerts/promise-polyfill.js')}}"></script>
<link href="{{asset('public/admin/plugins/sweetalerts/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('public/admin/plugins/sweetalerts/sweetalert.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('public/admin/assets/css/ui-kit/custom-sweetalert.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('public/admin/assets/css/ui-kit/custom-pagination.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/css/ecommerce/order.css')}} ">
<link rel="stylesheet" type="text/css" href="{{ asset('public/admin/plugins/font-icons/linea/linea-icons.css')}} ">
<link href=" {{asset('public/admin/assets/css/ecommerce/checkout.css')}} " rel="stylesheet" type="text/css">
<style>
    .form-control {
        border: 1px solid #ccc;
        color: #888ea8;
        font-size: 15px;
        border-radius: 2px;
    }

    code {
        color: #3862f5;
    }

    .form-control:disabled,
    .form-control[readonly] {
        background-color: #f1f3f9;
        border-color: #f1f3f1;
    }

    .btn-primary.disabled,
    .btn-primary:disabled {
        background-color: #3862f5;
        border-color: #3862f5;
    }

    label {
        color: #3b3f5c;
        margin-bottom: 14px;
    }

    .form-control::-webkit-input-placeholder {
        color: #888ea8;
        font-size: 15px;
    }

    .form-control::-ms-input-placeholder {
        color: #888ea8;
        font-size: 15px;
    }

    .form-control::-moz-placeholder {
        color: #888ea8;
        font-size: 15px;
    }

    .form-control:focus {
        border-color: #f1f3f1;
        border-left: solid 3px #3862f5;
    }

    .page-item.active .page-link {
        z-index: 1;
        color: #fff;
        background-color: #6156ce;
        border-color: #6156ce;

    }

    ul.pagination li .page-link {
        width: 100%;
        height: 100%;
        color: #6156ce;
        padding: .5rem .75rem;
    }

    ul.pagination li a:hover:not(.active) {
        background-color: #6156ce;
        color: #fff;
    }

    .modal-body b {
        color: #3862f5;
    }

    .modal-body span {
        color: black;
        font-weight: 600;
    }
</style>
@endsection
@section('content')
<div class="container">
    <div class="page-header">
        <div class="page-title">
            <h3 style="color: #e95f2b">Quản lý đơn hàng</h3>
        </div>
    </div>
    <div class="crumbs">
        <ul id="breadcrumbs" class="breadcrumb">
            <li><a href="index.html"><i class="flaticon-home-fill"></i></a></li>
            <li><a href="#">Tables</a></li>
            <li class="active"><a href="#">Basic</a> </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="order-top-section">
                <h4 class="mb-5 card-title text-center">Trạng thái đơn hàng</h4>
                <div class="card-section mx-md-auto">
                    <div class="row mt-5">
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 mb-5">
                            <div class="o-cards">
                                <h5 class="txt-o-placed">Chưa xác thực</h5>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-6 mt-4">
                                        <div id="o-progress-preparing" class="">
                                            <i class="icon icon-ecommerce-cart-download" style="font-size: 50px"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-6 mt-4 text-right">
                                        <h4>2215</h4>
                                        <h6>Đơn hàng</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 mb-5">
                            <div class="o-cards" style="color: #1A73E9">
                                <h5 class="txt-o-preparing">Đã xác thực</h5>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-6 mt-4">
                                        <div id="o-progress-preparing" class="">
                                            <i class="icon icon-ecommerce-cart-plus" style="font-size: 50px"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-6 mt-4 text-right">
                                        <h4>1344</h4>
                                        <h6>Đơn hàng</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 mb-5">
                            <div class="o-cards" style="color: #1ABC9C">
                                <h5 class="txt-o-shipped">Đã thanh toán</h5>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-6 mt-4">
                                        <div id="o-progress-preparing" class="">
                                            <i class="icon icon-ecommerce-cart-check" style="font-size: 50px"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-6 mt-4 text-right">
                                        <h4>924</h4>
                                        <h6>Đơn hàng</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 mb-5">
                            <div class="o-cards" style="color: #E7515A">
                                <h5 class="txt-o-arrival">Đã huỷ</h5>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-6 mt-4">
                                        <div id="o-progress-preparing" class="">
                                            <i class="icon icon-ecommerce-cart-remove" style="font-size: 50px"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-6 mt-4 text-right">
                                        <h4>768</h4>
                                        <h6>Đơn hàng</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="input-group mb-4">
                <input type="search" class="form-control" name="txtSearch" value="" placeholder="Tìm kiếm">
                <div class="input-group-append">
                    <button type="button" class="btn btn-gradient-warning" id="btnSearch"><i
                            class="flaticon-search-1"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-3">
            <span>Hiển thị (hàng)</span>
            <select class="form-control" id="sl_page_size">
                <option value="">-- Chọn --</option>
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
            </select>
        </div>
        <div class="col-sm-3">
            <span>Trạng thái</span>
            <select class="form-control" id="sl_payment_status">
                <option value="">-- Chọn --</option>
                <option value="0">Chưa xác thực</option>
                <option value="1">Đã xác thực</option>
                <option value="2">Đang giao hàng</option>
                <option value="3">Đã thanh toán</option>
                <option value="-1">Đã huỷ</option>
            </select>
        </div>
    </div>
    <div class="row layout-spacing">
        <div class="col-lg-12 col-md-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                            <h4>Danh sách đơn hàng</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-4">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên khách hàng</th>
                                    <th>Ngày đặt hàng</th>
                                    <th>Tổng tiền</th>
                                    <th>Status</th>
                                    <th class="text-center" colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 0;
                                @endphp
                                @foreach ($model as $item)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $item->order_name }}</td>
                                    <td>{{ date('d/m/Y H:i:s A', strtotime($item->created_at)) }}</td>
                                    <td>{{ number_format($item->total_money) }} đ</td>
                                    <td>
                                        @switch($item->payment_status)
                                        @case(0)
                                        <span class="badge badge-default">Chưa xác thực</span>
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
                                    <td class="text-center">
                                        <a href="#" class="btn-material btn-material-primary btnView"
                                            data-toggle="modal"
                                            data-url="{{ route('order.show', ['order' => $item->id]) }}"
                                            data-target=".ModalView">
                                            <i class="flaticon-view-3"></i>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <select class="form-control form-control-sm" class="sl_change_payment_status">
                                            <option {{$item->payment_status == 0 ? "selected" : ""}}>Chưa xác thực
                                            </option>
                                            <option {{$item->payment_status == 1 ? "selected" : ""}}>Đã xác thực
                                            </option>
                                            <option {{$item->payment_status == 2 ? "selected" : ""}}>Đang giao hàng
                                            </option>
                                            <option {{$item->payment_status == 3 ? "selected" : ""}}>Đã thanh toán
                                            </option>
                                            <option {{$item->payment_status == -1 ? "selected" : ""}}>Đã huỷ</option>
                                        </select>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            {{$model->appends(request()->all())->links()}}
        </div>
    </div>
</div>
<div class="modal fade ModalView" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="myLargeModalLabel">Thông tin đơn hàng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Tên khách hàng:</b> <span id="order_name"></span></p>
                <p><b>Địa chỉ:</b> <span id="order_address"></span></p>
                <p><b>Email:</b> <span id="order_email"></span></p>
                <p><b>Tên tài khoản:</b> <span id="username"></span></p>
                <p><b>Điện thoại:</b> <span id="order_phone"></span></p>
                <p><b>Ngày đặt:</b> <span id="created_at"></span></p>
                <p><b>Trạng thái:</b> <span id="payment_status"></span></p>
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
                <p><b style="color: #3862f5">Lời nhắn:</b> <span id="order_note"></span></p>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark btn-rounded mt-3 mb-3" data-dismiss="modal">Hủy</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{asset('public/admin/assets/js/modal/classie.js')}}"></script>
<script src="{{asset('public/admin/assets/js/modal/modalEffects.js')}}"></script>
<script src="{{asset('public/js/genAlias.js')}}"></script>
<script src="{{asset('public/admin/plugins/notification/snackbar/snackbar.min.js')}}"></script>
<script src="{{asset('public/admin/assets/js/ui-kit/notification/custom-snackbar.js')}}"></script>
<script src="{{asset('public/admin/plugins/sweetalerts/sweetalert2.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var order = {
            init: function() {
                order.registersEvent();
            },
            registersEvent: function() {

                //Xem chi tiết đơn hàng
                $('.btnView').off('click').on('click', function() {
                    var url = $(this).data('url');
                    if(url != "" || url != null)
                        order.ShowOrder(url);
                });
            },
            ShowOrder: function(url) {
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    success: function(res) {
                        if(res.status) {
                            $('#order_name').text(res.order.order_name);
                            $('#order_address').text(res.order.order_address);
                            $('#order_email').text(res.order.order_email);
                            $('#username').text(res.username);
                            $('#order_phone').text(res.order.order_phone);
                            $('#created_at').text(res.created_at);
                            $('#order_note').text(res.order.order_note);
                            var html_payment_status = ``;
                            switch (res.order.payment_status) {
                                case 0:
                                    html_payment_status = `<span class="badge badge-default">Chưa xác thực</span>`;
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
        }
        order.init();
    });
</script>
@endsection