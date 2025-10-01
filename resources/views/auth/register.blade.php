<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shoonah | Signup</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('assets/register/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('assets/register/css/style.css')}}">
    <style>
        @font-face {
            font-family: 'icomoon';
            src: url("{{asset('assets/fonts/ArbFONTS-The-Sans-Plain.otf')}}");
            src: url("{{asset('assets/fonts/ArbFONTS-The-Sans-Plain.otf')}}");
            font-weight: normal;
            font-style: normal;
        }

        *:not(.fa) {
            font-family: 'icomoon' !important;
        }
        .createbtn:hover {
            color: white;
        }
    </style>
</head>
<body>

<div class="main">

    <div class="container">

            <form method="POST" action="{{ route('register') }}" class="appointment-form"
                  id="appointment-form"  @if(Config::get('app.locale')=='ar' ) style="direction: rtl" @endif>
                      @csrf

            <h2>{{__('main.register_title')}}</h2>
            <div class="form-group-1">
                <input type="text" name="name" id="name" placeholder="{{__('main.user_name_placeholder')}}" required autocomplete="off" />
                <input type="email" name="email" id="email" placeholder="{{__('main.email_placeholder')}}" required  autocomplete="off"/>
                <input type="password" name="password" id="password" placeholder="{{__('main.password_placeholder')}}" required autocomplete="off" />
               <input type="password" placeholder="{{__('main.password_renter_placeholder')}}" name="password_confirmation" required  autocomplete="off"/>


            </div>

            <div class="form-check">
                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                <label for="agree-term" class="label-agree-term"><span><span></span></span>{{__('main.agree')}}  <a href="{{route('terms')}}" class="term-service" target="_blank">{{__('main.terms')}}</a></label>
            </div>
                <div class="form-check">
                  <a href="{{route('login')}}"> {{__('main.i_have_account')}} </a>
                </div>
            <div class="form-submit" @if(Config::get('app.locale')=='en' ) style="direction: rtl"  @else style="direction: ltr"  @endif>
                <input type="submit" name="submit" id="submit" class="submit" value="{{__('main.register_btn')}}" />
            </div>
        </form>
    </div>

</div>


<script src="{{asset('assets/register/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/register/js/main.js')}}"></script>
</body>
</html>














