@extends('admin.layouts.master') @section('title', ' | Edit Article') @section('style')
<link rel="stylesheet" href="{{ asset('admin/libs/trumbowyg/dist/ui/trumbowyg.min.css') }}"> @endsection @section('content')
<div class="col-md-8 col-md-offset-2">
    <div class="lead">Edit Article</div>

    @include('admin.partials.req_article') @foreach($article as $item)
    <form action="{{ url('admin/articles/'.$item->id.'/edit') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div id="title" class="form-group">
            <label for="title">Article Title:</label>
            <input name="title" type="text" class="form-control" id="title" value="{{ $item->title }}">
        </div>

        <div id="description" class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ $item->description }}</textarea>
        </div>

        <div id="_content" class="form-group">
            <label for="content">Content:</label>
            <textarea name="content" id="editor" for="content" class="form-control">{{ $item->content }}</textarea>
        </div>

        <div id="image" class="form-group">
            <label for="ImageFile">Image:</label>
            <input name="Imagefile" type="file" id="ImageFile">
            <p class="help-block">The file under validation must be an image (jpeg, png, bmp, gif, or svg).</p>
        </div>

        <div id="category" class="form-group">
            <label for="category_id">Category</label>
            <?php $category = DB::table('categories')->where('id', $item->category_id)->first();?>
            <select name="category" class="form-control">
                            <option value="{{ $category->id }}">{{ $category->name}}</option>
                            {{ $categories = DB::table('categories')->get() }}
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach    
                        </select>
        </div>
        <button type="submit" class="btn btn-success pull-right">Update Article</button>
    </form>
    @endforeach
</div>
@endsection @section('script')
<script src="{{ asset('admin/libs/trumbowyg/dist/trumbowyg.min.js') }}"></script>
<script type="text/javascript">
        $(document).ready(function(){
            $('#editor').trumbowyg();
        });
    </script> @endsection