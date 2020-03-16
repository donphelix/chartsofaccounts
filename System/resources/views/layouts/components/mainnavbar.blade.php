<div class="container-fluid">
    <div class="float-left">
        {{config('APP_LOGO')}}
        <a href="#" class="logo"><img src="{{Session::get('app_logo')}}" alt=""></a>
    </div>

    <nav class="main-nav d-none d-lg-block">
        <ul>
            <li id="custom_menu_item"><a href="{{config('app.sso_base_url').('home/'.Session::get('service_type').'/').(Session::get('pws'))}}"><i class="fa fa-mail-reply"></i> Go back to assigned apps</a></li>
            <li id="custom_menu_item"><a href="#"><i class="fa fa-inbox"></i> Messages</a></li>
            <li id="custom_menu_item"><a href="#"><i class="fa fa-cog"></i> Help</a></li>
{{--
===============================================================
                    Add additional links here>>>>>>>>>>>>>>>>>>>
===============================================================
--}}
            <li><a href="#">Agent Network</a></li>
            <li><a href="#">Our Services</a></li>
            <li><a href="#">Contact Us</a></li>
            <li><a href="#">XXXXXXX</a></li>

{{--
===============================================================
                   End of additional links <<<<<<<<<<<<<<<<<<<<
===============================================================
--}}



            <li class="dropdown-divider"  id="custom_menu_item"></li>
            <li id="custom_menu_item"><a href="{{config('app.sso_base_url').'custom-logout'}}">Logout <i class="fa fa-sign-out"></i> </a></li>

        </ul>
    </nav><!-- .main-nav -->

</div>
