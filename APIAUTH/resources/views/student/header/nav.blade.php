<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom  Sidebar_r">
    <button class="btn btn-primary" id="menu-toggle" style="margin-right:15px;">Toggle Menu</button>
    {{trans('main.welcome')}}: {{Auth::user()->username}}
    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">{{trans('main.Language')}}: {{app()->getLocale()== 'ar'?'Arabic':'English'}}
            <span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li><a href="{{route('lang',['lang'=>'en'])}}">{{trans('main.English')}}</a></li>
            <li><a href="{{route('lang',['lang'=>'ar'])}}">{{trans('main.Arabic')}}</a></li>

        </ul>

    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse  navbar-collapse"

         dir="{{app()->getLocale()== 'ar'?'ltr':'rtl'}}"



         aria-labelledby="navbarDropdown" id="navbarSupportedContent">

        <ul class="navbar-nav mt-2 mt-lg-0">


            <li class="nav-item ">
                <a class="nav-link"  href="{{ route('logout') }}"    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" style="color:#fff;"><i class="fas fa-sign-out-alt"></i> {{trans('main.logout')}}</a>
            </li>

        </ul>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
            @csrf
        </form>
    </div>
</nav>