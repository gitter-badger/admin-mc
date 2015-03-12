<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Settings</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('passwordReset')}}"><i class="fa fa-circle-o"></i>Admin Settings</a></li>
                </ul>
            </li>

            <li>
                <a href="{{route('notice.index')}}">
                    <i class="fa fa-th"></i> <span>Notice</span>
                </a>
            </li>
            <li class="header">Quick Links</li>
            <li><a href="#"><i class="fa fa-circle-o text-info"></i> View Site</a></li>
            <li><a href="{{route('passwordReset')}}"><i class="fa fa-circle-o text-danger"></i>Change Password</a></li>
            <li><a href="{{route('logout')}}"><i class="fa fa-circle-o text-danger"></i>Logout</a></li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>