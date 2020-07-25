@extends('admin.layout.admin')

@section('content')

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1>Users</h1>
                <ol class="breadcrumb">
                    <li class="active"><i class="fa fa-user"></i> users</li>
                </ol>
                @yield('alerts')
            </div>
        </div><!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <a href="{{route('admin.users.create')}}" class="btn btn-success pull-right">Add new user</a>
            </div>
            <div class="col-md-12">
                <h4>User in system</h4>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-5">
                        {{$users->render()}}
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Register date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($users)
                        @foreach($users->sortByDesc('id') as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{$user->email }}</td>
                                <td>{{$user->isAdmin() ? 'Admin' : 'Regular' }}</td>
                                <td>{{$user->created_at}}</td>
                                <td><a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-info">Edit</a>
                                    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUserController@destroy', $user->id]]) !!}
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
                        {{$users->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /#page-wrapper -->

@endsection
