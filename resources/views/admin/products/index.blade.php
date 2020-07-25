@extends('admin.layout.admin')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1>products <small>Store products</small></h1>
                <ol class="breadcrumb">
                    <li class="active"><i class="fa fa-gift"></i> products</li>
                </ol>
                @yield('alerts')
            </div>
        </div><!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <a href="{{route('admin.products.create')}}" class="btn btn-success pull-right">Add new product</a>
            </div>
            <div class="col-md-12">
                <h4>Products in system</h4>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-5">
                        {{$products->render()}}
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Owned by</th>
                        <th>Price</th>
                        <th>Views</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($products)
                        @foreach($products->sortByDesc('id') as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->title}}</td>
                                <td>{{$product->user->name}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->views}}</td>
                                <td><a href="{{route('admin.products.edit', $product->id)}}" class="btn btn-info">Edit</a>
                                    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminProductController@destroy', $product->id]]) !!}
                                    <div class="form-group">
                                        {!! Form::submit('Delete', ['class'=>'btn btn-danger',
                                        'onclick'=>'return confirm(\'Are you sure?\');']) !!}
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>

                <div class="row bottom-air">
                    <div class="col-sm-6 col-sm-offset-5">
                        {{$products->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /#page-wrapper -->

@endsection
