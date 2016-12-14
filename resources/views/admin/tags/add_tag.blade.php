@extends('admin.layouts.master')

@section('title', ' | Add New Tag')

@section('content')
        @include('admin.partials.req_category')
        <div class="lead">Add New Tag</div>
        <!-- Create Article Form -->
        <form action="{{ route('tags.create') }}" method="POST">
             {{ csrf_field() }} 
            <div id="name" class="form-group">
                <label for="title">Tag name:</label>
                <input type="text" class="form-control" name="name" placeholder="Tag Title" value="{{ old('name') }}">
            </div>

            <div id="description" class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control" rows="3" placeholder="Description">{{ old('description') }}</textarea>
            </div>
            <button type="submit" class="btn btn-success pull-right">Add Tag</button>
        </form>
    </div>
@endsection