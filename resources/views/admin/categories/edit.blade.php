@extends('admin.layout.admin')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1>Categories <small>Store categories</small></h1>
                <ol class="breadcrumb">
                    <li><i class="fa fa-bar-chart-o"></i> Categories</li>
                    <li class="active"><i class="fa fa-pencil"></i> Edit Category {{$category->name}}</li>
                </ol>
                @yield('alerts')
            </div>
        </div><!-- /.row -->

        <div class="row">
            <h4>Add new category</h4>
            {!! Form::model($category,['method'=>'PUT', 'action'=>['AdminCategoryController@update',$category->id], 'class'=>'form-row']) !!}

            <div class="form-group col-md-6">
                {!! Form::label('name', 'Category name') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-grop col-md-6">
                <br>
                {!! Form::submit('Edit category', ['class'=>'btn btn-primary pull-right']) !!}
            </div>

            {!! Form::close() !!}
        </div>

    </div><!-- /#page-wrapper -->

@endsection
