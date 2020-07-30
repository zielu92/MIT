@extends('admin.layout.admin')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1>Orders <small>Store orders</small></h1>
                <ol class="breadcrumb">
                    <li class="active"><i class="fa fa-shopping-cart"></i> Orders</li>
                </ol>
                @yield('alerts')
            </div>
        </div><!-- /.row -->


        <div class="row">
            <div class="col-md-12">
                <h4>Orders in system</h4>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-5">
                        {{$orders->render()}}
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Product name</th>
                        <th>Sold by</th>
                        <th>Order By</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($orders)
                        @foreach($orders->sortByDesc('id') as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->product->title }}</td>
                                <td>{{ $order->product->user->name }}</td>
                                <td>{{ $order->user->name }}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>

                <div class="row bottom-air">
                    <div class="col-sm-6 col-sm-offset-5">
                        {{$orders->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /#page-wrapper -->

@endsection
