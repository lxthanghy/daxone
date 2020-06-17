@extends('Client.layout')
@section('title')
Thanh toán
@endsection
@section('css')
<link rel="stylesheet" href="{{url('public/loaders/csspin.css')}}">
<link rel="stylesheet" href="{{url('public/loaders/custom-loader.css')}}">
<link rel="stylesheet" href="{{url('public/loaders/css-loader.css')}}">
<style type="text/css">
    #btnGenerateCode,
    #btnApplyCode {
        width: 230px;
        height: 50px;
        background-color: #273c75;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 16px;
        border-radius: 5px;
        color: #f5f6fa;
        cursor: pointer;
    }

    #btnGenerateCode span,
    #btnApplyCode span {
        margin-right: 5px;
        font-size: 16px;
    }
</style>
@endsection
@section('content')
<div class="container">
    <div class="checkout-wrap pt-30">
        @if ($count > 0)
        <div class="row">
            <div class="col-lg-7">
                <div class="billing-info-wrap mr-50">
                    <h3>Thông tin đặt hàng</h3>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="billing-info mb-20">
                                <label>Họ <abbr class="required" title="required">*</abbr></label>
                                <input type="text" name="first_name">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="billing-info mb-20">
                                <label>Tên <abbr class="required" title="required">*</abbr></label>
                                <input type="text" name="last_name">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="billing-info mb-20">
                                <label>Địa chỉ nhà <abbr class="required" title="required">*</abbr></label>
                                <input type="text" name="address_home">
                            </div>
                        </div>
                        <div class="col-lg-12 mb-20">
                            <div class="billing-info mb-20">
                                <label>Chọn tỉnh</label>
                                <select class="form-control" id="sl_province">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-20">
                            <div class="billing-info mb-20">
                                <label>Chọn huyện</label>
                                <select class="form-control" id="sl_district">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-20">
                            <div class="billing-info mb-20">
                                <label>Chọn xã</label>
                                <select class="form-control" id="sl_precinct">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="billing-info mb-20">
                                <label>Địa chỉ giao hàng</label>
                                <input type="text" readonly name="address_ship">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="billing-info mb-20">
                                <label>Email <abbr class="required" title="required">*</abbr></label>
                                <input type="text" name="order_email">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 mt-2">
                            <div id="btnGenerateCode">
                                <span>Gửi mã xác thực</span>
                            </div>
                            <div class="billing-info mb-20">
                                <label>Mã xác thực <abbr class="required" title="required">*</abbr></label>
                                <input type="text" name="order_verification_code">
                            </div>
                            <div id="btnApplyCode">
                                <span>Xác thực email</span>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="billing-info mb-20">
                                <label>Điện thoại <abbr class="required" title="required">*</abbr></label>
                                <input type="text" name="order_phone">
                            </div>
                        </div>
                    </div>
                    <div class="additional-info-wrap">
                        <label>Ghi chú / Lời nhắn</label>
                        <textarea placeholder="Ghi chú khi nhận sản phẩm" name="order_note"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="your-order-area">
                    <h3>Sản phẩm của bạn</h3>
                    <div class="your-order-wrap gray-bg-4">
                        <div class="your-order-info-wrap">
                            <div class="your-order-info">
                                <ul>
                                    <li>Sản phẩm <span>Tổng tiền</span></li>
                                </ul>
                            </div>
                            <div class="your-order-middle">
                                <ul>
                                    @php
                                    $total_price = 0;
                                    @endphp
                                    @foreach ($carts as $item)
                                    @php
                                    $subtotal = $item['price'] * $item['quantity'];
                                    $total_price += $subtotal;
                                    @endphp
                                    <li>{{ $item['name'] }} X {{ $item['quantity'] }}
                                        <span>{{ number_format($subtotal) }} đ</span></li>
                                    @endforeach
                                </ul>
                                <a href="{{ route('cart.view') }}" class="btn btn-primary mt-3">Xem giỏ hàng</a>
                            </div>
                            <div class="your-order-info order-subtotal">
                                <ul>
                                    <li>Tổng tiền <span id="total_price"
                                            data-totalprice="{{$total_price}}">{{ number_format($total_price) }}
                                            VNĐ</span></li>
                                </ul>
                            </div>
                            <div class="your-order-info order-shipping">
                                <ul>
                                    <li>Shipping <p>Enter your full address </p>
                                    </li>
                                </ul>
                            </div>
                            <div class="your-order-info order-total">
                                <ul>
                                    <li>Total <span>$273.00 </span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="payment-method">
                            <div class="pay-top sin-payment">
                                <input id="payment_method_1" class="input-radio" type="radio" value="cheque"
                                    checked="checked" name="payment_method">
                                <label for="payment_method_1"> Direct Bank Transfer </label>
                                <div class="payment-box payment_method_bacs" style="display: block;">
                                    <p>Make your payment directly into our bank account. Please use your Order ID as the
                                        payment reference.</p>
                                </div>
                            </div>
                            <div class="pay-top sin-payment">
                                <input id="payment-method-2" class="input-radio" type="radio" value="cheque"
                                    name="payment_method">
                                <label for="payment-method-2">Check payments</label>
                                <div class="payment-box payment_method_bacs">
                                    <p>Make your payment directly into our bank account. Please use your Order ID as the
                                        payment reference.</p>
                                </div>
                            </div>
                            <div class="pay-top sin-payment">
                                <input id="payment-method-3" class="input-radio" type="radio" value="cheque"
                                    name="payment_method">
                                <label for="payment-method-3">Cash on delivery </label>
                                <div class="payment-box payment_method_bacs">
                                    <p>Make your payment directly into our bank account. Please use your Order ID as the
                                        payment reference.</p>
                                </div>
                            </div>
                            <div class="pay-top sin-payment sin-payment-3">
                                <input id="payment-method-4" class="input-radio" type="radio" value="cheque"
                                    name="payment_method">
                                <label for="payment-method-4">PayPal <img alt=""
                                        src="{{url('public/client/assets/images/icon-img/payment.png')}}"><a
                                        href="#">What is PayPal?</a></label>
                                <div class="payment-box payment_method_bacs">
                                    <p>Make your payment directly into our bank account. Please use your Order ID as the
                                        payment reference.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Place-order mt-40">
                        <a href="#" id="btnPayment"
                            data-customerid="{{ Auth::guard('customer')->check() ? Auth::guard('customer')->user()->id : 0 }}">Thanh
                            toán</a>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-sm-12">
                <p style="color: red; font-weight: bold; font-size: 20px" class="ml-3">Bạn không có sản phẩm nào trong
                    giỏ hàng của bạn</p>
                <span class="ml-3">Nhấn <b>Quay lại trang chủ</b> để tiếp tục mua sắm</span>
            </div>
            <div class="col-sm-12 mt-2">
                <a href="{{ route('home.index') }}" class="btn btn-primary ml-3">
                    <i class="la la-arrow-left"></i>
                    Quay lại trang chủ</a>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function () {
        var province_id = "";
        var district_id = "";
        var verification_code = "";
        var seconds_generate = 15;
        var seconds_apply = 2;
        var click_generate_code = true;
        var click_apply_code = true;
        var check_verification_code = false;
        var check_click_generate_code = true;
        var change_province = false;
        var change_district = false;
        var change_precinct = false;
        var address_home = "";
        var payment = {
            init: function() {
                payment.registersEvent();
            },
            registersEvent: function() {

                //Load các tỉnh thành
                payment.LoadProvince();

                //Chọn tỉnh -> huyện
                $(document).off('change', '#sl_province').on('change', '#sl_province', function() {
                    province_id = $(this).val();
                    change_province = true;
                    change_district = false;
                    change_precinct = false;
                    payment.GetAddressShip();
                    if(province_id != "")
                        payment.LoadDistrict(province_id);
                    else
                        $('#sl_district').html('');
                    $('#sl_precinct').html('');
                });

                //Chọn huyện -> xã
                $(document).off('change','#sl_district').on('change','#sl_district', function() {
                    district_id = $(this).val();
                    change_district = true;
                    change_precinct = false;
                    payment.GetAddressShip();
                    if(province_id != "" && district_id != "")
                        payment.LoadPrecinct(province_id, district_id);
                    else
                        $('#sl_precinct').html('');
                });

                //Nhập địa chỉ nhà
                $(document).off('keyup', "input[name='address_home']").on('keyup', "input[name='address_home']", function() {
                    address_home = $(this).val().trim();
                    if(address_home != "" || address_home != null)
                        payment.GetAddressShip();
                });

                //Chọn xã
                $(document).off('change', '#sl_precinct').on('change', '#sl_precinct', function() {
                    var precinct_name = $('#sl_precinct option:selected').val();
                    change_precinct = precinct_name != "" ? true : false;
                    payment.GetAddressShip();
                });

                //Generate code xác nhận email
                $(document).off('click','#btnGenerateCode').on('click','#btnGenerateCode', function(event) {
                    event.preventDefault();
                    if(click_generate_code) {
                        payment.GenerateCode();
                    }
                    else
                        toastr["warning"]("Hãy đợi sau " + seconds_generate + " s nữa");
                });

                //Apply code xác nhận email
                $(document).off('click', '#btnApplyCode').on('click', '#btnApplyCode', function(event) {
                    event.preventDefault();
                    if(click_apply_code)
                        payment.ApplyCode();
                    else
                        toastr["warning"]("Đang xác thực email");
                });

                //Thanh toán
                $(document).off('click', '#btnPayment').on('click', '#btnPayment', function(event) {
                    event.preventDefault();
                    var customer_id = parseInt($(this).data('customerid'));
                    if(customer_id != 0)
                    {
                        if(!check_verification_code)
                            toastr["warning"]("Vui lòng xác thực email");
                        //payment.Payment(customer_id);
                    }
                    else
                        toastr["warning"]("Vui lòng đăng nhập tài khoản");
                });

                //Check change email
                $(document).on('keyup', "input[name='order_email']", function() {
                    if(!click_generate_code)
                        toastr["warning"]("Bạn đang thay đổi lại email, vui lòng xác nhận lại email");
                    check_verification_code = false;
                    verification_code = "";
                    $("input[name='order_verification_code']").val('');
                    
                });
            },
            LoadProvince: function() {
                var url_load_province = "{!! route('payment.load_province') !!}";
                $.ajax({
                    url: url_load_province,
                    type: 'GET',
                    dataType: 'json',
                    success: function(res) {
                        if(res.status) {
                            var html = `<option value="">-- Chọn Tỉnh --</option>`;
                            $.each(res.provinces, function(index, value) {
                                html += `<option value="${value.id[0]}">${value.name[0]}</option>`;
                            });
                            $('#sl_province').html(html);
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            },
            LoadDistrict: function(province_id) {
                var url_load_district = "{!! route('payment.load_district') !!}";
                $.ajax({
                    url: url_load_district,
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        province_id: province_id
                    },
                    success: function(res) {
                        if(res.status) {
                            var html = `<option value="">-- Chọn Huyện --</option>`;
                            $.each(res.districts, function(index, value) {
                                html += `<option value="${value.id[0]}">${value.name[0]}</option>`;
                            });
                            $('#sl_district').html(html);
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            },
            LoadPrecinct: function(province_id, district_id) {
                var url_load_precinct = "{!! route('payment.load_precinct') !!}";
                $.ajax({
                    url: url_load_precinct,
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        province_id: province_id,
                        district_id: district_id
                    },
                    success: function(res) {
                        if(res.status) {
                            var html = `<option value="">-- Chọn Xã --</option>`;
                            $.each(res.precincts, function(index, value) {
                                html += `<option value="${value[0]}">${value[0]}</option>`;
                            });
                            $('#sl_precinct').html(html);
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            },
            GenerateCode: function() {
                var url_generate_code = "{!! route('payment.generate_code') !!}";
                $.ajax({
                    url: url_generate_code,
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        order_email: $("input[name='order_email']").val()
                    },
                    success: function(res) {
                        if(res.errors)
                        {
                            var er = res.errors[0];
                            toastr["warning"](er);
                        }
                        else
                        {
                            if(res.status)
                            {
                                click_generate_code = false;
                                check_click_generate_code = false;
                                payment.WaitingSendCode();
                                toastr["success"]("Đã gửi mã xác thực");
                                verification_code = res.verification_code;
                                console.log(verification_code);
                            }
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            },
            ApplyCode: function() {
                if(!check_click_generate_code) {
                    var code = $("input[name='order_verification_code']").val();
                    code = code.trim();
                    if(code != "")
                    {
                        payment.WaitingApplyCode();
                        if(code == verification_code)
                        {
                            toastr["success"]("Xác thực thành công");
                            check_verification_code = true;
                        }
                        else
                            toastr["warning"]("Mã xác thực không chính xác");
                    }
                    else
                    {
                        toastr["warning"]("Mã xác thực không được để trống");
                        $("input[name='order_verification_code']").val('');
                    }
                }
                else
                    toastr["warning"]("Bạn chưa gửi mã xác thực");
            },
            WaitingSendCode: function() {
                $('#btnGenerateCode').css('background-color', '#778ca3');
                var html = `<span>Vui lòng đợi sau ${seconds_generate} s</span>`;
                $('#btnGenerateCode span').html(html);
                var load = '<div class="loader multi-loader"></div>';
                $('#btnGenerateCode').append(load);
                var interval = setInterval(function() {
                    --seconds_generate;
                    var html = `<span>Vui lòng đợi sau ${seconds_generate} s</span>`;
                    $('#btnGenerateCode span').html(html);
                    if (seconds_generate <= 0)
                    {
                        clearInterval(interval);
                        click_generate_code = true;
                        $('#btnGenerateCode').css('background-color', '#273c75');
                        $('#btnGenerateCode').html("<span>Gửi lại mã xác thực</span>");
                        seconds_generate = 15;
                    }
                }, 1000);
            },
            WaitingApplyCode: function() {
                click_apply_code = false;
                $('#btnApplyCode').css('background-color', '#778ca3');
                var html = `<span>Đang chờ xác thực</span>`;
                $('#btnApplyCode span').html(html);
                var load = '<div class="loader"></div>';
                $('#btnApplyCode').append(load);
                var interval = setInterval(function() {
                    --seconds_apply;
                    if (seconds_apply <= 0)
                    {
                        clearInterval(interval);
                        click_apply_code = true;
                        $('#btnApplyCode').css('background-color', '#273c75');
                        $('#btnApplyCode').html("<span>Xác thực lại email</span>");
                        seconds_apply = 2;
                    }
                }, 1000);
            },
            GetAddressShip: function() {
                if(change_precinct && change_district && change_province && address_home.trim() != "") {
                    var precinct_name = ", " + $('#sl_precinct option:selected').val();
                    var district_name = ", " + $('#sl_district option:selected').text();
                    var province_name = ", " + $('#sl_province option:selected').text();
                    var address_ship = address_home + precinct_name + district_name + province_name;
                    $("input[name='address_ship']").val(address_ship);
                }
                else
                    $("input[name='address_ship']").val('');
            },
            Payment: function(customer_id) {
                var url_payment = "{!! route('payment.payment') !!}";
                $.ajax({
                    url: url_payment,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        customer_id : customer_id,
                        first_name : $("input[name='first_name']").val(),
                        last_name : $("input[name='last_name']").val(),
                        address_ship : $("input[name='address_ship']").val(),
                        order_email : $("input[name='order_email']").val(),
                        order_phone : $("input[name='order_phone']").val(),
                        order_note : $("textarea[name='order_note']").val(),
                        total_price: parseFloat($('#total_price').data('totalprice'))
                    },
                    success: function(res) {
                        if(res.status)
                            toastr["success"]("Đặt hàng thành công");
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            }
        };
        payment.init();
    });
</script>
@endsection