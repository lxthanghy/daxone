<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Admin | Register</title>
    <link rel="icon" type="image/x-icon" href="{{asset('public/admin/assets/img/favicon.ico')}}" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <link href="{{asset('public/admin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/admin/assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/admin/assets/css/users/register-1.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/admin/plugins/notification/snackbar/snackbar.min.css')}}" rel="stylesheet"
        type="text/css">
    <!-- END GLOBAL MANDATORY STYLES -->

</head>

<body class="register">
    <form class="form-register">
        <div class="row">
            <div class="col-md-12 text-center mb-4">
                <img alt="logo" src="{{asset('public/admin/assets/img/logo-5.png')}}" class="theme-logo">
            </div>
            <div class="col-md-12">
                <label for="" class="">Full Name</label>
                <input type="text" name="fullname" class="form-control mb-4" placeholder="Full Name">
                <label for="" class="">Username</label>
                <input type="text" name="username" class="form-control mb-4" placeholder="Username">
                <label for="" class="">Password</label>
                <input type="password" name="password" class="form-control mb-5" placeholder="Password">
                <label for="" class="">Repeat Password</label>
                <input type="password" name="confirm_password" class="form-control mb-5" placeholder="Repeat Password">
                <button class="btn btn-lg btn-gradient-danger btn-block btn-rounded mb-4 mt-5" type="button"
                    id="btnRegister">Đăng ký</button>
                <a href="{{route('admin.login')}}" class="btn btn-lg btn-outline-dark btn-block btn-rounded mb-3">Đăng nhập</a>
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
            var register = {
                init: function() {
                    register.registersEvent();
                },
                registersEvent: function() {
                    $('#btnRegister').off('click').on('click', function(event) {
                        event.preventDefault();
                        register.register();
                    });
                },
                register: function() {
                    var url = "{!! route('admin.register') !!}";
                    $.ajax({
                        url: url,
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            fullname: $("input[name='fullname']").val(),
                            username: $("input[name='username']").val(),
                            password: $("input[name='password']").val(),
                            confirm_password: $("input[name='confirm_password']").val()
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
                                        text: 'Đăng ký thành công',
                                        actionTextColor: '#fff',
                                        backgroundColor: '#1abc9c'
                                    });
                                }
                                else
                                {
                                    Snackbar.show({
                                        text: 'Đăng ký thất bại',
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
            }
            register.init();
        });
    </script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
</body>

</html>