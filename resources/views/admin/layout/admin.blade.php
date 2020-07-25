@include('admin.layout.header')
@include('admin.layout.nav')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div id="wrapper">
                @yield('admin.layout.nav')
                @yield('content')
            </div>
        </div>
    </div>
</div>
@include('admin.layout.footer')
