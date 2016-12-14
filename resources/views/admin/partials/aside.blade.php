            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li class="sidebar-brand">
                        <a href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                    {{-- Article --}}
                    <li>
                        <a data-toggle="collapse" href="#collapseProduct" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-bar-chart-o"></i>Articles</a>
                        <div class="collapse" id="collapseProduct">
                            <div class="">
                                <ul>
                                    <li><a href="{{ route('articles.add') }}">Add Article</a></li>
                                    <li><a href="{{ route('articles.list') }}">List Articles</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    {{-- Category --}}
                    <li>
                        <a  role="button" data-toggle="collapse" href="#collapseCatetory" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-list-alt"></i>Categories</a>
                        <div class="collapse" id="collapseCatetory">
                            <div class="">
                                <ul>
                                    <li><a href="{{ route('categories.create') }}">Add Category</a></li>
                                    <li><a href="{{ route('categories.list') }}">List Categories</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    {{-- Tag --}}
                    <li>
                        <a  role="button" data-toggle="collapse" href="#collapseTag" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-tags"></i>Tags</a>
                        <div class="collapse" id="collapseTag">
                            <div class="">
                                <ul>
                                    <li><a href="{{ route('tags.create') }}">Add Tag</a></li>
                                    <li><a href="{{ route('tags.list') }}">List Tags</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <li>
                        <a href="{{ route('users.list') }}"><i class="fa fa-users"></i>Users</a>
                    </li>
                </ul>
            </div>
            <!-- /#sidebar-wrapper -->