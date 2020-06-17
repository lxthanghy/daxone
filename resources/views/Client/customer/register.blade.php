@extends('Client.layout')
@section('title')
Đăng ký
@endsection
@section('css')
<link rel="stylesheet" href="{{url('public/datetimepicker/jquery-ui.min.css')}}">
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-7 col-md-12 ml-auto mr-auto">
            <div class="login-register-wrapper">
                <div class="login-register-tab-list nav">
                    <a class="" data-toggle="tab" href="#lg1">
                        <h4> Đăng nhập </h4>
                    </a>
                    <a data-toggle="tab" href="#lg2" class="active">
                        <h4> Đăng ký </h4>
                    </a>
                </div>
                <div class="tab-content">
                    <div id="lg1" class="tab-pane">
                        <div class="login-form-container">
                            <div class="login-register-form">
                                <form action="#" method="post">
                                    <label for="" style="font-weight: bold; color: #FF5151;">Tên tài khoản</label>
                                    <input type="text" name="login_username" placeholder="Username">
                                    <label for="" style="font-weight: bold; color: #FF5151;">Mật khẩu</label>
                                    <input type="password" name="login_password" placeholder="Password">
                                    <div class="button-box">
                                        <div class="login-toggle-btn">
                                            <input type="checkbox" name="remember" value="remember-me">
                                            <label>Nhớ tài khoản</label>
                                            <a href="#">Quên mật khẩu?</a>
                                        </div>
                                        <button type="button" id="btnLoginCustomer">Đăng nhập</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="lg2" class="tab-pane active">
                        <div class="login-form-container">
                            <div class="login-register-form">
                                <form action="#" method="post">
                                    <label for="" style="font-weight: bold; color: #FF5151;">Tên tài khoản</label>
                                    <input type="text" name="res_username" placeholder="Username">
                                    <label for="" style="font-weight: bold; color: #FF5151;">Mật khẩu</label>
                                    <input type="password" name="res_password" placeholder="Password">
                                    <label for="" style="font-weight: bold; color: #FF5151;">Nhập lại mật khẩu</label>
                                    <input type="password" name="res_confirm_password" placeholder="Password">
                                    <label for="" style="font-weight: bold; color: #FF5151;">Họ và tên</label>
                                    <input type="text" name="res_name" placeholder="Họ và tên">
                                    <label for="" style="font-weight: bold; color: #FF5151;">Địa chỉ</label>
                                    <input type="text" name="res_address" placeholder="Địa chỉ">
                                    <label for="" style="font-weight: bold; color: #FF5151;">Email</label>
                                    <input type="text" name="res_email" placeholder="Email">
                                    <label for="" style="font-weight: bold; color: #FF5151;">Phone</label>
                                    <input type="text" name="res_phone" placeholder="Điện thoại">
                                    <label for="" style="font-weight: bold; color: #FF5151;">Giới tính</label>
                                    <select name="res_gender" class="mb-3">
                                        <option value="">--- Chọn ---</option>
                                        <option value="0"> Nữ</option>
                                        <option value="1"> Nam</option>
                                        <option value="2"> Khác</option>
                                    </select>
                                    <label for="" style="font-weight: bold; color: #FF5151;">Ngày sinh</label>
                                    <input type="text" name="res_date_of_birth" readonly placeholder="Ngày sinh">
                                    <div class="button-box">
                                        <button type="button" id="btnRegisterCustomer">Đăng ký</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{url('public/datetimepicker/jquery-ui.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var now = new Date();
        var register = {
            init: function() {
                register.registersEvent();
            },
            registersEvent: function() {
                //Định dạng lịch
                $("input[name='res_date_of_birth']").datepicker({
                    dateFormat: 'dd/mm/yy',
                    changeMonth: true,
                    changeYear: true,
                    maxDate: new Date(now.getFullYear(), now.getMonth(), now.getDate(), now.getHours(), now.getMinutes(), 0, 0)
                });

                //Register
                $('#btnRegisterCustomer').off('click').on('click', function(event) {
                    event.preventDefault();
                    register.RegisterCustomer();
                });

                //Login
                $('#btnLoginCustomer').off('click').on('click', function(event) {
                    event.preventDefault();
                    register.LoginCustomer();
                }); 
            },
            RegisterCustomer: function() {
                var url = "{!! route('customer.post_register') !!}";
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        res_username : $("input[name='res_username']").val(),
                        res_password : $("input[name='res_password']").val(),
                        res_confirm_password : $("input[name='res_confirm_password']").val(),
                        res_name : $("input[name='res_name']").val(),
                        res_address : $("input[name='res_address']").val(),
                        res_email : $("input[name='res_email']").val(),
                        res_phone : $("input[name='res_phone']").val(),
                        res_gender : $("select[name='res_gender']").val(),
                        res_date_of_birth : $("input[name='res_date_of_birth']").val()
                    },
                    success: function(res) {
                        if(res.errors)
                        {
                            var er = res.errors[0];
                            toastr.options = {
                                "showDuration": 250,
                                "hideDuration": 1500,
                                "timeOut": 1500,
                            };
                            toastr["warning"](er);
                        }
                        else
                        {
                            if(res.status)
                            {
                                var url_login = "{!! route('customer.login') !!}";
                                toastr["success"]("Đăng ký thành công");
                                setTimeout(function() {
                                    window.location.href = url_login;
                                }, 1000);
                            }
                            else
                            {
                                toastr["error"]("Đăng ký thất bại");
                            }
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            },
            LoginCustomer: function() {
                var url = "{!! route('customer.post_login') !!}";
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        login_username: $("input[name='login_username']").val(),
                        login_password: $("input[name='login_password']").val(),
                        remember: $("input[name='remember']:checked").val()
                    },
                    success: function(res) {
                        if(res.errors)
                        {
                            var er = res.errors[0];
                            toastr.options = {
                                "showDuration": 250,
                                "hideDuration": 1500,
                                "timeOut": 1500,
                            };
                            toastr["warning"](er);
                        }
                        else
                        {
                            if(res.status)
                            {
                                toastr["success"]("Đăng nhập thành công");
                                var my_account = "{!! route('customer.my_account') !!}";
                                setTimeout(function() {
                                    window.location.href = my_account;
                                }, 1000);
                            }
                            else
                            {
                                toastr["error"]("Thông tin đăng nhập không chính xác hoặc tài khoản của bạn bị khoá");
                            }
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    }
                })
            }
        };
        register.init();
    });
</script>
@endsection