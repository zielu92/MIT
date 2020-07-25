@extends('admin.layout.admin')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1>Users </h1>
                <ol class="breadcrumb">
                    <li><i class="fa fa-user"></i> Users</li>
                    <li class="active"><i class="fa fa-pencil"></i> Add user </li>
                </ol>
                @yield('alerts')
            </div>
        </div><!-- /.row -->

        <div class="row">
            <h4>Add new user</h4>
            {!! Form::open(['method'=>'POST', 'action'=>'AdminUserController@store', 'files'=>true]) !!}
            <div class="row">
                <div class="form-group col-md-6">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group col-md-6">
                    {!! Form::label('email', 'E-mail') !!}
                    {!! Form::email('email', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group col-md-6">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class'=>'form-control']) !!}
                </div>

                <div class="form-group col-md-6">
                    {!! Form::label('role', 'Role') !!}
                    {!! Form::select('role', [3 => 'User', 2 => 'Moderator', 1=>'Admin'],
                    null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group col-md-6">
                    {!! Form::submit('Add user', ['class'=>'btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}
        </div>

    </div><!-- /#page-wrapper -->

@endsection
