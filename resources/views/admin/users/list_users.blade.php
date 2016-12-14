@extends('admin.layouts.master')

@section('title', '| Users')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="table-responsive">
            <table class='table table-hover table-bordered'>
                <caption class="lead">List Users</caption>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Rule</th>
                        <th>Grant</th>
                        <th>Drop</th>
                        <th>Edit</th>
                    </tr>
                </thead>

                @foreach($users as $user)
                    <tbody>
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>
                                    <?php
                                        if($user->active == 1) echo 'Admin';
                                        else echo 'User';
                                    ?>
                                </td>
                                <td class="text-center"><a href="{{ url('admin/users/'.$user->id.'/grant') }}"><i class="fa fa-unlock-alt fa-2x"></i></a></td>
                                <td class="text-center" id="drop"><a href="{{ url('admin/users/'.$user->id.'/delete') }}"><i class="fa fa-times-circle-o fa-2x"></i></a></td>
                                <td class="text-center"><a href="{{ url('admin/users/'.$user->id.'/edit') }}"><i class="fa fa-pencil-square-o fa-2x"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>        
            </table>
        </div>
        <div class="pull-right">
            {{ $users->links() }}
        </div>
    </div>
@endsection