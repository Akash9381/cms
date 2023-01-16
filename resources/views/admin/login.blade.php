<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Address Makers</title>
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min2167.css?v=3.2.0') }}">
    <style>
        .error{
            color: red;
        }
    </style>
</head>


<body class="hold-transition login-page">
    <div class="login-box">

        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{route('admin.dashboard')}}" class="h2"><b>ADDRESS</b> MAKERS</a>
            </div>
            @if (session()->has('error'))
            <div class=" alert alert-danger">
                {{session()->get('error')}}
            </div>
            @endif
            <div class="card-body">
                <form id="loginform" action="{{url('admin/authenticate')}}" method="post">
                    @csrf
                    <label id="email-error" class="error" for="email"></label>
                    @error('email')
                    <label id="email-error" class="error" for="email">{{$message}}</label>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="User id" name="email" class="form-control" value="{{old('email')}}" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <label id="password-error" class="error" for="password"></label>
                    @error('password')
                    <label id="password-error" class="error" for="password">{{$message}}</label>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" value="{{old('password')}}" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Login In</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#loginform").validate({
                rules:{
                    'email':{
                        required:true,
                        email:true
                    },
                    'password':{
                        required:true
                    },
                },
                message:{
                    'email':{
                        required:'Email is required.'
                    },
                    'password':{
                        required:'Password is required.'
                    }
                }
            });
        });
    </script>
</body>

</html>
