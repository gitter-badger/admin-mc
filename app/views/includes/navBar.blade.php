<header class="main-header">
    <a href="{{route('settings')}}" class="logo"><b>Admin Panel</b></a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <ul class="nav navbar-nav">

            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" >
                   <span class="hidden-xs"><b>SUST Admission 2014-2015</b></span>
                </a>
            </li>
        </ul>


        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" >
                        Current User: <span class="hidden-xs"><b>Administrator</b></span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Current Time: <span class="hidden-xs"><b>{{\Carbon\Carbon::now("Asia/Dhaka")->toDayDateTimeString()}}</b></span>
                    </a>
                </li>
            </ul>
        </div>

    </nav>
</header>