
        <!DOCTYPE html>
<html dir="rtl">

<head>
    <title></title>
    <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css" integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="{{asset('/css/simple-sidebar.css')}}" rel="stylesheet">
    <style type="text/css">
        h3 {
            margin-bottom: 4%
        }

        .classForm {
            margin-top: 30%;
            margin-left: 10%
        }

        .alert {
            padding: 20px;
            background-color: #f44336;
            color: white;
        }

        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .closebtn:hover {
            color: black;
        }

        @media only screen and (max-width: 600px) {
            .classImg {
                display: none;
            }

            .classForm {
                margin-right: 30%;
            }

            h3 {
                margin-bottom: 10%;
            }
        }
    </style>
</head>

<body>
<div class="row">
    <div class="col-md-6 classImg" style="height: 650px">
        <img src="{{asset('/image/3.jpg')}}" class="img-fluid" alt="Responsive image" style="height: 100%">
    </div>



    <div class=" col-md-4  col-sm-12">
        <div class="classForm">
            <h3>تسجيل الدخول</h3>

            <form method="POST" action="{{ route('login') }}">

                @csrf
                <div class="form-group">
                    <label for="email" >{{ __('اسم المستخدم') }}</label>

                    <div>
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" >{{ __('كلمة المرور') }}</label>

                    <div >
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="form-check mb-4">
                    <div >
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <div >
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
            @endif
        </div>
    </div>
    <div class="form-group">
        <a href="reg" style="width: 100%" class="btn btn-primary">انشاء حساب جديد</a>
    </div>
            </form>
<!--
-->
        </div>

    </div>

</div>
<!-- Bootstrap core JavaScript -->
<script src="{{asset('/js/jquery.min.js')}}"></script>
<script src="{{asset('/js/bootstrap.bundle.min.js')}}"></script>


</body>

</html>
