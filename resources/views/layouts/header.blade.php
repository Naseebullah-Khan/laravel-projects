<header>
    <div class="header_left d-flex flex-wrap align-items-center">
        <div class="header_icon"><i class="fal fa-bars"></i></div>
        <a href="#"><img src="{{ asset("assets/images/logo.jpg") }}" alt="logo" class="img-fluid"></a>
    </div>
    <ul class="header_right d-flex flex-wrap align-items-center">
        <form action="{{ route("logout") }}" method="POST" class="logout-form">
            @csrf
        </form>
        <li class="user_area">
            <div class="user">
                <img src="{{ asset("images/bg_1.jpg") }}" alt="user" class="img-fluid">
            </div>
            <ul class="drop_menu drop_menu_user">
                <li><a href="{{ route("profile.edit") }}">settings</a></li>
                <li><a href="javascript:;" onclick="$('.logout-form').submit()">logout</a></li>
            </ul>
        </li>
    </ul>
</header>