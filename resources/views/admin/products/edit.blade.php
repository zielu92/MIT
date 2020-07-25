@extends('admin.layout.admin')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1>Products <small>Products on store</small></h1>
                <ol class="breadcrumb">
                    <li><i class="fa fa-bar-chart-o"></i> Products</li>
                    <li class="active"><i class="fa fa-pencil"></i> Add product </li>
                </ol>
                @yield('alerts')
            </div>
        </div><!-- /.row -->

        <div class="row">
            <h4>Add new product</h4>
            {!! Form::model($product,['method'=>'PATCH', 'action'=>['AdminProductController@update', $product->id], 'files'=>true, 'class'=>'form-row']) !!}

            <div class="form-group col-md-6">
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group col-md-6">
                {!! Form::label('category_id', 'Category') !!}
                {!! Form::select('category_id', $categories, $product->category, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group col-md-6">
                {!! Form::label('user_id', 'Owner id') !!}
                {!! Form::select('user_id', $users, $product->user, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group col-md-6">
                {!! Form::label('price', 'Price') !!}
                {!! Form::text('price', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group col-md-12">
                {!! Form::label('description', 'Description') !!}
                {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group col-md-6">
                {!! Form::label('photo[]', 'Pictures') !!}
                {!! Form::file('photo[]', ['multiple' => 'multiple', 'class'=>'form-control-file']) !!}
            </div>

            <div class="form-grop col-md-6">
                <br>
                {!! Form::submit('Edit product', ['class'=>'btn btn-primary pull-right']) !!}
            </div>

            {!! Form::close() !!}
        </div>

    </div><!-- /#page-wrapper -->

@endsection
