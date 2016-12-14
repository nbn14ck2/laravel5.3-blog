@extends('admin.layouts.master')

@section('title', ' | Add New Category')

@section('content')
        @include('admin.partials.req_category')
        <div class="lead">Add New Category</div>
        <!-- Create Article Form -->
        <form action="{{ route('categories.create') }}" method="POST">
             {{ csrf_field() }} 
            <div id="name" class="form-group">
                <label for="title">Category name:</label>
                <input type="text" class="form-control" name="name" placeholder="Category Title" value="{{ old('name') }}">
            </div>

            <div id="description" class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control" rows="3" placeholder="Description">{{ old('description') }}</textarea>
            </div>
            <button type="submit" class="btn btn-success pull-right">Add Category</button>
        </form>
    </div>
@endsection