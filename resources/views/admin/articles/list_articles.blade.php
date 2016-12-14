@extends('admin.layouts.master')

@section('title', ' | List Articles')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="table-responsive">
            <table class='table table-hover table-bordered'>
                <caption class="lead">List Artilces</caption>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Tag</th>
                        <th>Drop</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->description }}</td>
                            <td>
                                {{-- @foreach($article->categories as $category)
                                @endforeach --}}
                            </td>
                            <td><label for="" class="label-warning">tag helo</label></td>                            
                            <td class="text-center" id="drop"><a href="#" data-toggle="modal" data-target="#dropModal"><i class="fa fa-times-circle-o fa-2x"></i></a></td>
                            <td class="text-center"><a href="{{ url('admin/articles/'.$article->id.'/edit') }}"><i class="fa fa-pencil-square-o fa-2x"></i></td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="dropModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Are you Sure</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p style="color: red;">Destroy article from database...!!!</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                        
                                        <a href="{{ url('admin/articles/'.$article->id.'/delete') }}"><button type="button" class="btn btn-success">Success</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="pull-right">
            {{ $articles->links() }}
        </div>
    </div>
@endsection