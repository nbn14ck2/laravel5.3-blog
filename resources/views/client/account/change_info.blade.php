@extends('client.account.index')

@section('title', '| User Edit')

@section('account_info')
@endsection

@section('change_account')
    <div class="col-sm-10 col-sm-offset-1">

        <div class="container-fluid">
            <form action="{{ url('user/'.Auth::user()->id.'/edit')}}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input name="name" type="text" class="form-control" value="{{ Auth::user()->name }}">
                </div>

                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <div class="clearfix"></div>
                    <label class="checkbox-inline"><input name="gender" type="radio" value="Male">&nbsp;Male</label>
                    <label class="checkbox-inline"><input name="gender" type="radio" value="Female">&nbsp;Female</label>
                </div>

                <div class="form-group">
                    <label for="like">Like:</label>
                    <textarea name="like" class="form-control" >{{ Auth::user()->like }}</textarea>
                </div>

                <div class="form-group">
                    <label for="slogan">Slogan:</label>
                    <textarea name="slogan"  class="form-control" >{{ Auth::user()->slogan }}</textarea>
                </div>

                <button type="submit" class="btn btn-success pull-right">Save Changes</button>
            </form>
        </div>
    </div>
@endsection