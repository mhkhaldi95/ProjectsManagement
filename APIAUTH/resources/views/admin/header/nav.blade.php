<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom  Sidebar_r">
{{--        <button class="btn btn-primary" id="menu-toggle" style="margin-right:15px;">Toggle Menu</button>--}}
    مرحبا : {{Auth::user()->username}}
{{--    <span>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Language : {{app()->getLocale()== "en"?"English":""}}</span>--}}
{{--    <div class="dropdown dropdown-user">--}}
{{--        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">--}}

{{--            <span class="username username-hide-on-mobile">--}}
{{--					Language : {{app()->getLocale()== "en"?"English":""}} </span>--}}
{{--            <i class="fa fa-angle-down"></i>--}}
{{--        </a>--}}
{{--        <ul class="dropdown-menu dropdown-menu-default">--}}
{{--            <li>--}}
{{--                <a href="extra_profile.html">--}}
{{--                    <i class="icon-user"></i> English </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="page_calendar.html">--}}
{{--                    <i class="icon-calendar"></i> Arabic </a>--}}
{{--            </li>--}}

{{--        </ul>--}}
{{--    </div>--}}

    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Language: {{app()->getLocale()== "en"?"English":"Arabic"}}
            <span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li><a href="{{route('lang',['lang'=>'en'])}}">English</a></li>
            <li><a href="{{route('lang',['lang'=>'ar'])}}">Arabic</a></li>

        </ul>

    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    {{--    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
    {{--        <a class="dropdown-item" href="{{ route('logout') }}"--}}
    {{--           onclick="event.preventDefault();--}}
    {{--                                                     document.getElementById('logout-form').submit();">--}}
    {{--            {{ __('Logout') }}--}}
    {{--        </a>--}}

    {{--        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
    {{--            @csrf--}}
    {{--        </form>--}}
    {{--    </div>--}}
    <div class="collapse  navbar-collapse"  dir="ltr" aria-labelledby="navbarDropdown" id="navbarSupportedContent">
        <ul class="navbar-nav mt-2 mt-lg-0">


            <li class="nav-item ">
                <a class="nav-link"  href="{{ route('logout') }}"    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" style="color:#fff;"><i class="fas fa-sign-out-alt"></i> خروج</a>
            </li>

        </ul>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
            @csrf
        </form>
    </div>
</nav>