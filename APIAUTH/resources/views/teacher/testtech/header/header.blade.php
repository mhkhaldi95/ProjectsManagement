<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom  Sidebar_r">

{{--    <button class="btn btn-primary" id="menu-toggle" style="margin-left:15px;">القائمة</button>--}}
    مرحبا : {{Auth::user()->username}}
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
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