@extends('admin.layouts.master')

@section('title', ' | Edit User')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        @if(count($errors) > 0)
            <div class="alert alert-danger fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <ul>
                    @foreach($errors->all() as $error)
                        <li><strong>Oh snap! </strong>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <div class="lead">Edit User</div>
        @foreach($user as $u)
            <form action="{{ url('admin/users/'.$u->id.'/edit') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input name="name" type="text" class="form-control" value="{{ $u->name }}">
                </div>

                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <div class="clearfix"></div>
                    <label class="checkbox-inline"><input name="gender" type="radio" value="Male">&nbsp;Male</label>
                    <label class="checkbox-inline"><input name="gender" type="radio" value="Female">&nbsp;Female</label>
                </div>

                <div class="form-group">
                    <label for="like">Like:</label>
                    <textarea name="like" class="form-control">{{ $u->like }}</textarea>
                </div>

                <div class="form-group">
                    <label for="slogan">Slogan:</label>
                    <textarea name="slogan" class="form-control">{{ $u->slogan }}</textarea>
                </div>

                <button type="submit" class="btn btn-success pull-right">Save Changes</button>
            </form>
        @endforeach
    </div>
@endsection