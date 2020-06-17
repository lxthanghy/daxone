<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Admin | Login</title>
    <link rel="icon" type="image/x-icon" href="{{asset('public/admin/assets/img/favicon.ico')}}" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <link href="{{asset('public/admin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/admin/assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/admin/assets/css/users/login-1.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/admin/plugins/notification/snackbar/snackbar.min.css')}}" rel="stylesheet"
    type="text/css">
    <!-- END GLOBAL MANDATORY STYLES -->

</head>

<body class="login">

    <form class="form-login">
        <div class="row">
            <div class="col-md-12 text-center mb-4">
                <img alt="logo" src="{{asset('public/admin/assets/img/logo-5.png')}}" class="theme-logo">
            </div>

            <div class="col-md-12">
                <label for="" class="">Username</label>
                <input type="text" name="username" class="form-control mb-4" placeholder="Username">
                <label for="" class="">Password</label>
                <input type="password" name="password" class="form-control mb-5" placeholder="Password">
                <div class="checkbox d-flex justify-content-between mb-4 mt-3">
                    <div class="custom-control custom-checkbox mr-3">
                        <input type="checkbox" class="custom-control-input" name="remember" id="customCheck1" value="remember-me">
                        <label class="custom-control-label" for="customCheck1">Nhớ đăng nhập</label>
                    </div>
                    <div class="forgot-pass">
                        <a href="#">Quên mật khẩu?</a>
                    </div>
                </div>
                <button class="btn btn-lg btn-gradient-danger btn-block btn-rounded mb-4 mt-5"
                    type="button" id="btnLogin">Đăng nhập</button>
                <a href="{{route('admin.register')}}"
                    class="btn btn-lg btn-outline-dark btn-block btn-rounded mb-3">Đăng ký</a>
            </div>
        </div>
    </form>

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset('public/admin/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('public/admin/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('public/admin/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/admin/plugins/notification/snackbar/snackbar.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/ui-kit/notification/custom-snackbar.js')}}"></script>
    <script type="text/javascript">
    $(document).ready(function () {
        var login = {
            init: function() {
                login.registersEvent();
            },
            registersEvent: function() {
                $('#btnLogin').off('click').on('click', function(event) {
                    event.preventDefault();
                    login.login();
                });
            },
            login: function() {
                var url = "{!! route('admin.login') !!}";
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        username: $("input[name='username']").val(),
                        password: $("input[name='password']").val(),
                        remember: $("input[name='remember']:checked").val()
                    },
                    success: function(res) {
                        if(res.errors)
                        {
                            var er = res.errors[0];
                            Snackbar.show({
                                text: er,
                                actionTextColor: '#fff',
                                backgroundColor: '#e7515a'
                            });
                        }
                        else
                        {
                            if(res.status)
                            {
                                Snackbar.show({
                                    text: 'Đăng nhập thành công',
                                    actionTextColor: '#fff',
                                    backgroundColor: '#1abc9c'
                                });
                            }
                            else
                            {
                                Snackbar.show({
                                    text: 'Đăng nhập thất bại',
                                    actionTextColor: '#fff',
                                    backgroundColor: '#e7515a'
                                });
                            }
                        }   
                    },
                    error: function(err) {
                        Snackbar.show({
                            text: err,
                            actionTextColor: '#fff',
                            backgroundColor: '#e7515a'
                        });
                    }
                });
            }
        };
        login.init();
    });
    </script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
</body>

</html>