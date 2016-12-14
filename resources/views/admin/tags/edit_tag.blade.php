@extends('admin.layouts.master')

@section('title', ' | Edit Tag')

@section('content')
        @include('admin.partials.req_category')
    
        <div class="lead">Edit Tag</div>
            @foreach($tag as $item)      
            <!-- Edit Tag Form -->
            <form action="{{ url('/admin/tags/'.$item->id.'/edit') }}" method="POST">
                {{ csrf_field() }} 
                
                    <div id="name" class="form-group">
                        <label for="title">Tag name:</label>
                        <input type="text" class="form-control" name="name" value="{{ $item->name }}">
                    </div>

                    <div id="description" class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" class="form-control" rows="3">{{ $item->description }}</textarea>
                    </div>
                
                <button type="submit" class="btn btn-success pull-right">Update Tag</button>
            </form>
            @endforeach
        </div>
@endsection