<!-- Sidebar -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">MIT Admin</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{route('admin.categories.index')}}"><i class="fa fa-bar-chart-o"></i> Categories</a></li>
            <li><a href="{{route('admin.products.index')}}"><i class="fa fa-gift"></i> Products</a></li>
            <li><a href="{{route('admin.orders.index')}}"><i class="fa fa-shopping-cart"></i> Orders</a></li>
            <li><a href="{{route('admin.users.index')}}"><i class="fa fa-user"></i> Users</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Auth::user()->name }}  <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="{{route('admin.users.edit',Auth::user()->id )}}"><i class="fa fa-user"></i> Profile</a></li>
                    <li class="divider"></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i>
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form></li>
                </ul>
            </li>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>
