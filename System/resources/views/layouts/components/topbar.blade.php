<div id="topbar">
    <div class="container">
        <div class="float-left" style="margin-left: 36px;">
            <a href="{{config('app.sso_base_url').('home/'.Session::get('service_type').'/').(Session::get('pws'))}}">
                <strong class="text-white"><i class="fa fa-mail-reply"></i> Go Back to Assigned Apps</strong>
            </a>
        </div>
        <div class="social-links">
            <a href="" class="text-white"><i class="fa fa-inbox"></i> Messages</a>
            <a href="" class="text-white"><i class="fa fa-cog"></i> Help</a>
            <a href="{{config('app.sso_base_url').'custom-logout'}}" class="text-white">
                <i class="fa fa-sign-out"></i> Logout
            </a>
        </div>
        <h5 class="text-left" id="app-name">
            <strong>{{Session::get("company_name").' - '.Session::get("app_name")}}</strong>
        </h5>
    </div>
</div>
