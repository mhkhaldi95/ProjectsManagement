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
            margin-top: 5%;
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
    <div class="col-md-6 classImg" style="height: 1100px">
        <img src="{{asset('/image/3.jpg')}}" class="img-fluid" alt="Responsive image" style="height: 100%">
    </div>

    <div class=" col-md-4  col-sm-12">
        <div class="classForm">
            <h3>تسجيل الحساب</h3>
            <form id="myform" method="POST" action="{{ route('register') }}">


                @csrf
                <div class="form-group">
                    <label for="type1">نوع الحساب </label><br>
                    <input id="type" name="type" type="radio" class="" value="Student"> <label for="type1">طالب
                    </label><br>
                    <input id="type" name="type" type="radio" class="" value="Teacher"> <label for="type2">معلم
                    </label><br>
                </div>

                <div class="form-group" id="u_id">
                    <label for="IDD"> الرقم الجامعي</label>
                    <input id="IDD" name="IDD" type="text" class="form-control" placeholder="الرقم الجامعي">
                </div>

                    <div class="form-group">
                            <label for="name" >{{ __('الاسم') }}</label>


                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"  placeholder="الاسم" name="name" value="{{ old('name') }}" required autocomplete="name" >

                                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                </div>

{{--                <div class="form-group">--}}
{{--                    <label for="name">الاسم</label>--}}
{{--                    <input id="name" name="name" type="text" class="form-control" placeholder="الاسم">--}}
{{--                </div>--}}


                <div class="form-group">
                    <label for="email" >{{ __('البريد الالكتروني') }}</label>
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="البريد الالكتروني" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>

{{--                <div class="form-group">--}}
{{--                    <label for="email">البريد الالكتروني</label>--}}
{{--                    <input id="email" name="email" type="email" class="form-control" placeholder="البريد الالكتروني">--}}
{{--                </div>--}}
                <div class="form-group">
                    <label for="phone" >{{ __('رقم الهاتف') }}</label>
                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="رقم الهاتف" name="phone" value="{{ old('phone') }}" required autocomplete="email">
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

{{--                <div class="form-group">--}}
{{--                    <label for="phone">رقم الهاتف</label>--}}
{{--                    <input id="phone" name="phone" type="text" class="form-control" placeholder="رقم الهاتف">--}}
{{--                </div>--}}
                <div class="form-group">
                    <label for="username" >{{ __('اسم المستخدم:') }}</label>
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" placeholder="اسم المستخدم" name="username" value="{{ old('username') }}" required autocomplete="email">
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

{{--                <div class="form-group">--}}
{{--                    <label for="username">اسم المستخدم:</label>--}}
{{--                    <input id="username" name="username" type="text" class="form-control" placeholder="اسم المستخدم">--}}
{{--                </div>--}}
                <div class="form-group ">
                    <label for="password" >{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                     @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                </div>
                <div class="form-group ">
                    <label for="password-confirm" >{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control @error('password-confirm') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password-confirm')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>


{{--                <div class="form-group">--}}
{{--                    <label for="password">كلمة المرور</label>--}}
{{--                    <input id="password" name="password" type="password" class="form-control" placeholder="كلمة المرور">--}}
{{--                </div>--}}

{{--                <div class="form-group">--}}
{{--                    <label for="password2">تأكيد كلمة المرور</label>--}}
{{--                    <input id="password2" name="password2" type="password" class="form-control" placeholder="تأكيد كلمة المرور">--}}
{{--                </div>--}}
                <div class="form-group">
                    <label for="specialization">التخصص</label>
                    <input id="specialization" name="specialization" type="text" class="form-control" placeholder="التخصص">
                </div>
                <div id="std">

                    <div class="form-group">
                        <label for="level">المستوى</label>
                        <input id="level" name="level" type="text" class="form-control" placeholder="المستوى">
                    </div>
                </div>


                <button type="submit" class="btn btn-primary" style="width: 100%">تسجيل</button>

                <div class="form-group">
                    <a href="/logintest" style="width: 100%;margin-top: 20px" class="btn btn-primary">الصفحة الرئيسية</a>
                </div>

            </form>

        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript -->
<script src="{{asset('/js/jquery.min.js')}}"></script>
<script src="{{asset('/js/bootstrap.bundle.min.js')}}"></script>


<script >
    $('input[type=radio][name=type]').change(function() {
        if (this.value == 'Teacher') {
            $("#std").fadeOut();
            // $("#u_id").hide();
        } else if (this.value == 'Student') {
            $("#std").fadeIn();
            // $("#u_id").show();
        }
    });
</script>


</body>

</html>
