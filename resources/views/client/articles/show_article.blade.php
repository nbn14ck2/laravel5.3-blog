@extends('client.layouts.master')

@section('title', 'Article')

@section('content')
    <div class="col-sm-10 col-sm-offset-1">
        <div id="backtop" class="back">
            <a href="{{ route('articles') }}"><i class="fa fa-chevron-left"></i><span class="lead">Back all posts</span></a>
        </div>

        @foreach($article as $item)
            <section class="article_show">
                <header id="top">
                    <div class="img-header"><img class="img img-responsive" src="{{ asset('resources/upload/'.$item->image) }}" alt=""></div>
                    <h2>{{ $item->title }}</h2>
                    <label for=""><i style="margin-left: 1em;" class="fa fa-clock-o"></i> {{ date('h:ia', strtotime($item->created_at)) }}</label>
                    <label for=""><i style="margin-left: 1em;"  class="fa fa-address-book-o"></i> <a href="#">{{ $item->author }}</a></label>
                    <label for=""><i style="margin-left: 1em;" class="fa fa-comments"></i> {{ $count_comments }}</label>
                    <label for=""><i style="margin-left: 1em;" class="fa fa-heart"></i> 100</label>
                </header>
                <hr />
                
                <div class="clearfix"></div>
                
                <section>
                    {!! $item->content !!}
                    <div class="clearfix"></div>
                    <div class="lead pull-right"><a href="#backtop"><i class="fa fa-angle-double-up"></i></a></div>
                </section>
            </section>

            <section id="comments" class="comments">
                <div class="lead"><h3>COMMENT <span class="count_comment">({{ $count_comments }})</span></h3></div>
                <hr>
                    @foreach($comments as $comment)
                        <article>
                            <p class="user">
                                {{ $comment->name }}
                            </p>

                            <p><label for=""><i class="fa fa-clock-o"></i>{{ date('M j, h:ia', strtotime($item->created_at)) }}</label></p>
                            <p> {{ $comment->content }}
                            
                                {{-- <a data-toggle="collapse" href="#collapsecomment" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-refresh"></i>Reply</a>
                                <div class="collapse" id="collapsecomment">
                                    <div class="text-center col-xs-2"><h2><i class="fa fa-quote-left"></i></h2></div>
                                    <div class="col-xs-10">
                                        <form style="margin-left: -1em;" action="">
                                            {{ csrf_field() }}
                                            @if (Auth::guest())
                                                <div class="col-sm-6 form-group">
                                                    <label for="">Name</label>
                                                    <input type="text" class="form-control" placeholder="Name">
                                                </div>

                                                <div class="col-sm-6 form-group">
                                                    <label for="">Email</label>
                                                    <input type="email" class="form-control" placeholder="Email">
                                                </div>
                                            @else
                                                <label style="margin-left: 1em" for="">Comment:</label>
                                            @endif
                                            <div class="col-sm-12 form-group">
                                                <textarea rows="5" class="form-control" placeholder="Comment here..."></textarea>
                                            </div>

                                            <div class="col-sm-12">
                                                <button class="btn btn-success pull-right">Post Comment</button>
                                            </div>
                                        </form>
                                    </div>
                                </div> --}}
                            </p>
                            <hr>
                        </article>
                    @endforeach
                    <div> {{ $comments->fragment('comments')->links() }} </div>

                    <div class="clearfix"><br/></div>
                    <form style="margin-left: -1em;" action="{{ url('articles/'.$item->id.'/comment') }}" method="POST">
                            {{ csrf_field() }}
                        @if (Auth::guest())
                            <div class="col-sm-6 form-group">
                                <label for="">Name</label>
                                <input name="name" type="text" class="form-control" placeholder="Name">
                            </div>

                            <div class="col-sm-6 form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" placeholder="Email">
                            </div>
                        @else
                            <label style="margin-left: 1em" for="">Comment:</label>
                        @endif
                        <div class="col-sm-12 form-group">
                            <textarea required name="content" rows="5" class="form-control" placeholder="Comment here..."></textarea>
                        </div>

                        <div class="col-sm-12">
                            <button class="btn btn-success pull-right">Post Comment</button>
                        </div>
                    </form>
            
            </section>
        @endforeach
    </div>
@endsection