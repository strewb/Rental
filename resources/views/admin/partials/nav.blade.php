<ul class="nav nav-pills nav-stacked" id="menu">
    <li {{ (Request::is('admin/dashboard') ? ' class=active' : '') }}>
        <a href="{{URL::to('admin/dashboard')}}">
            <i class="fa fa-dashboard fa-fw"></i>
            <span class="hidden-sm text"> Dashboard</span>
        </a>
    </li>


    <li  {{ (Request::is('admin/place') ? ' class=active' : '') }} >
        <a href="{{URL::to('admin/place')}}">
            <i class="glyphicon glyphicon-list"></i><span
                    class="hidden-sm text"> Place</span>
        </a>
    </li>


    <li {{ (Request::is('admin/users*') ? ' class=active' : '') }} >
        <a href="{{URL::to('admin/users')}}">
            <i class="glyphicon glyphicon-user"></i>
            <span class="hidden-sm text"> Users</span>
        </a>
    </li>
</ul>
