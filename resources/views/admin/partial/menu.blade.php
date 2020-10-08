    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    {{get_data_user('admins','name')}}
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
        @if (Auth::guard('admins')->user()->role_id===1)
                <li class="{{ \Request::route()->getName() == 'get.dashboard.admin' ? 'active' : '' }}">
                    <a href="{{ route('get.dashboard.admin') }}">
                        <i class="fa fa-dashboard" aria-hidden="true"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="{{ \Request::route()->getName() == 'admin.get.list.admin' ? 'active' : '' }}">
                    <a href="{{ route('admin.get.list.admin') }}">
                        <i class="fa fa-magic" aria-hidden="true"></i> <span>Admin</span>

                    </a>
                </li>
                <li class="{{ \Request::route()->getName() == 'admin.get.list.role' ? 'active' : '' }}">
                    <a href="{{ route('admin.get.list.role') }}">
                        <i class="fa fa-magic" aria-hidden="true"></i> <span>Role</span>

                    </a>
                </li>

                <li class="{{ \Request::route()->getName() == 'admin.get.list.user' ? 'active' : '' }}">
                    <a href="{{ route('admin.get.list.user') }}">
                        <i class="fa fa-user-secret" aria-hidden="true"></i> <span>User</span>

                    </a>
                </li>

                <li class="{{ \Request::route()->getName() == 'admin.get.list.category' ? 'active' : '' }}">
                    <a href="{{ route('admin.get.list.category') }}">
                        <i class="fa fa-windows" aria-hidden="true"></i> <span>Category</span>

                    </a>
                </li>

                <li class="{{ \Request::route()->getName() == 'admin.get.list.product' ? 'active' : '' }}">
                    <a href="{{ route('admin.get.list.product') }}">
                        <i class="fa fa-windows" aria-hidden="true"></i> <span>Product</span>

                    </a>
                </li>

                <li class="{{ \Request::route()->getName() == 'admin.get.list.article' ? 'active' : '' }}">
                    <a href="{{ route('admin.get.list.article') }}">
                        <i class="fa fa-windows" aria-hidden="true"></i> <span>Article</span>
                    </a>
                </li>

                <li class="{{ \Request::route()->getName() == 'admin.get.list.spa' ? 'active' : '' }}">
                    <a href="{{ route('admin.get.list.spa') }}">
                        <i class="fa fa-windows" aria-hidden="true"></i> <span>Spa</span>
                    </a>
                </li>
                <li class="{{ \Request::route()->getName() == 'admin.get.list.service' ? 'active' : '' }}">
                    <a href="{{ route('admin.get.list.service') }}">
                        <i class="fa fa-windows" aria-hidden="true"></i> <span>Service</span>
                    </a>
                </li>

                    <li class="{{ \Request::route()->getName() == 'admin.get.list.employee' ? 'active' : '' }}">
                        <a href="{{ route('admin.get.list.employee') }}">
                            <i class="fa fa-windows" aria-hidden="true"></i> <span>Employee</span>
                        </a>
                    </li>
                    <li class="{{ \Request::route()->getName() == 'admin.get.list.transactions' ? 'active' : '' }}">
                        <a href="{{ route('admin.get.list.transactions') }}">
                            <i class="fa fa-windows" aria-hidden="true"></i> <span>Transaction</span>
                        </a>
                    </li>
                    <li class="{{ \Request::route()->getName() == 'admin.get.list.schedule' ? 'active' : '' }}">
                        <a href="{{ route('admin.get.list.schedule') }}">
                            <i class="fa fa-windows" aria-hidden="true"></i> <span>Schedule</span>
                        </a>
                    </li>

                <li class="{{ \Request::route()->getName() == 'admin.get.list.booking' ? 'active' : '' }}">
                    <a href="{{ route('admin.get.list.booking') }}">
                        <i class="fa fa-windows" aria-hidden="true"></i> <span>Booking</span>
                    </a>
                </li>

                <li class="{{ \Request::route()->getName() == 'admin.get.list.menu' ? 'active' : '' }}">
                    <a href="{{ route('admin.get.list.menu') }}">
                        <i class="fa fa-windows" aria-hidden="true"></i> <span>Menu</span>
                    </a>
                </li>

                    <li class="{{ \Request::route()->getName() == 'admin.get.list.rating' ? 'active' : '' }}">
                        <a href="{{ route('admin.get.list.rating') }}">
                            <i class="fa fa-windows" aria-hidden="true"></i> <span>Rating</span>
                        </a>
                    </li>
                    @endif

                @if (Auth::guard('admins')->user()->role_id===2)
                    <li class="{{ \Request::route()->getName() == 'get.dashboard.admin' ? 'active' : '' }}">
                        <a href="{{ route('get.dashboard.admin') }}">
                            <i class="fa fa-dashboard" aria-hidden="true"></i> <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="{{ \Request::route()->getName() == 'admin.get.list.employee' ? 'active' : '' }}">
                        <a href="{{ route('admin.get.list.employee') }}">
                            <i class="fa fa-windows" aria-hidden="true"></i> <span>Employee</span>
                        </a>
                    </li>
                    <li class="{{ \Request::route()->getName() == 'admin.get.list.transactions' ? 'active' : '' }}">
                        <a href="{{ route('admin.get.list.transactions.blade.php') }}">
                            <i class="fa fa-windows" aria-hidden="true"></i> <span>Transaction</span>
                        </a>
                    </li>
                    <li class="{{ \Request::route()->getName() == 'admin.get.list.schedule' ? 'active' : '' }}">
                        <a href="{{ route('admin.get.list.schedule') }}">
                            <i class="fa fa-windows" aria-hidden="true"></i> <span>Schedule</span>
                        </a>
                    </li>
                @endif
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
