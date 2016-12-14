    <aside id="article_sidebar" class="col-sm-3">
        <ul>
             <li>
                <div class="_head"><h4><label for="">SEARCH</label></h4></div>
                <div class="col-sm-10">
                    <form class="form_search" action="/">
                        <input class="form-control" type="text" placeholder="Search here...">
                        <a class="icon_search" href="#"><i class="fa fa-search"></i></a>
                    </form>
                </div>
                <div class="clearfix"></div>
                <hr>
             </li>
            <li>
                <div class="_head"><h4><label for="">CATEGORIES</label></h4></div>
                <ul>
                    @foreach($categories as $category)
                        <li><a href="{{ url('categories/'.$category->id) }}"><i class="fa fa-angle-right"></i> <label for="">{{ $category->name }}</label></a></li>
                    @endforeach
                </ul>
                <hr>
            </li>
            <li>
                <h4 class="_head"><label for="">TAGS</label></h4>
                <ul>
                    @foreach($tags as $tag)
                        <a href="{{ url('tags/'.$tag->id) }}"><button class="_tags" class="btn btn-default btn-sm"> <i class="fa fa-circle"></i> <label for="">{{ $tag->name }}</label></button></a>
                    @endforeach
                </ul>
                <hr>
            </li>
            <li>
                <h4 class="_head"><label for="">RECENT POSTS</label></h4>
                <ul>
                    @foreach($recent_articles as $article)
                        <li>
                            <h4><a href="{{ url('articles/'.$article->id) }}"><i class="fa fa-book"></i>{{ $article->title }}</a></h4>
                            <i style="margin-left: 1em;" class="fa fa-clock-o"></i> {{ date('M j, Y', strtotime($article->created_at)) }}
                            <i style="margin-left: 1em;" class="fa fa-eye"></i> 100
                            <hr>
                        </li>
                    @endforeach
                </ul>                    
            </li>
        </ul>
    </aside>