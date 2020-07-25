@extends('admin.layout.admin')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1>Categories <small>Store categories</small></h1>
                <ol class="breadcrumb">
                    <li class="active"><i class="fa fa-bar-chart-o"></i> Categories</li>
                </ol>
                @yield('alerts')
            </div>
        </div><!-- /.row -->

        <div class="row">
            <h4>Add new category</h4>
            {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoryController@store','files'=>true, 'class'=>'form-row']) !!}

            <div class="form-group col-md-6">
                {!! Form::label('name', 'Category name') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>


            <div class="form-group col-md-6">
                {!! Form::label('photo', 'Icon') !!}
                {!! Form::file('photo', ['class'=>'form-control-file']) !!}
            </div>

            <div class="form-grop col-md-6">
                <br>
                {!! Form::submit('Add new category', ['class'=>'btn btn-primary pull-right']) !!}
            </div>

            {!! Form::close() !!}
        </div>

        <div class="row">
            <div class="col-md-12">
                <h4>Categories in system</h4>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-5">
                        {{$categories->render()}}
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Icon</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($categories)
                        @foreach($categories->sortByDesc('id') as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td><img src="{{$category->photo['path']}}" style="max-height: 60px; max-width: 60px"></td>
                                <td><a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-info">Edit</a>
                                    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoryController@destroy', $category->id]]) !!}
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
                        {{$categories->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /#page-wrapper -->

@endsection
