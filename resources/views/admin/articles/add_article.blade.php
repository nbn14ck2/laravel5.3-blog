@extends('admin.layouts.master')

@section('title', ' | Add New Article')

@section('style')
    <link rel="stylesheet" href="{{ asset('admin/libs/trumbowyg/dist/ui/trumbowyg.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/libs/select2/css/select2.min.css') }}">
@endsection @section('content')

<div class="col-md-8 col-md-offset-2">
    <div class="lead">Add New Article</div>

    @include('admin.partials.req_article')

    {{-- Form add field --}}
    <form action="{{ route('articles.add') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{-- Title --}}
        <div id="title" class="form-group">
            <label for="title">Article Title:</label>
            <input name="title" type="text" class="form-control" id="title" placeholder="Article Title" value="{{ old('title') }}">
        </div>

        {{-- Description --}}
        <div id="description" class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" rows="3" placeholder="Description">{{ old('description') }}</textarea>
        </div>

        {{-- Category --}}
        <div id="category" class="form-group">
            <label for="categories">Category:</label>
            <select name="categories[]" class="form-control select2-multi" multiple="multiple">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach                           
            </select>
        </div>

        {{-- Tag --}}
        <div id="category" class="form-group">
            <label for="tags">Category:</label>
            <select name="tags[]" class="form-control select2-multi" multiple="multiple">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach                           
            </select>
        </div>

        {{-- Content --}}
        <div id="_content" class="form-group">
            <label for="content">Content:</label>
            <textarea id="content" for="content" class="form-control" name="content">{{ old('content') }}</textarea>
        </div>

        {{-- Image --}}
        <div id="image" class="form-group">
            <label for="Imagefile">Image:</label>
            <input type="file" id="Imagefile" name="Imagefile">
            <p class="help-block">The file under validation must be an image (jpeg, png, bmp, gif, or svg).</p>
        </div>
        <button type="submit" class="btn btn-success pull-right">Add Article</button>
    </form>
</div>

@endsection @section('script')
    <script src="{{ asset('admin/libs/trumbowyg/dist/trumbowyg.min.js') }}"></script>
    <script src="{{ asset('admin/libs/select2/js/select2.min.js') }}"></script>
    <script type="text/javascript">
            $(document).ready(function(){
                $('#content').trumbowyg();
                $('.select2-multi').select2();
            });
    </script>
@endsection