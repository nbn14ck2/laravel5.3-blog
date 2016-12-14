@extends('client.layouts.master')

@section('content')
    @foreach($articles as $article)
        <article id="list_articles" class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="container-fluid">
                    <div class="row"><a href="{{ url('articles/'.$article->id) }}"><h2>{{ $article->title }}</h2></a></div>
                    <div class="row"><p>{{ $article->description }}</p></div>
                    <div class="row">
                        <label for=""><i style="margin-left: 1em;" class="fa fa-clock-o"></i> {{ date('M j, Y', strtotime($article->created_at)) }}</label>
                        <label for=""><i style="margin-left: 1em;"  class="fa fa-address-book-o"></i> <a href="#">{{ $article->author }}</a></label>
                        <label for=""><i style="margin-left: 1em;" class="fa fa-eye"></i> 100</label>
                        <label for=""><i style="margin-left: 1em;" class="fa fa-heart"></i> 100</label>
                    </div>
                </div>
            </div>
        </article>
        <hr />
    @endforeach
    <div class="pull-right">
        {{ $articles->links() }}
    </div>
@endsection
