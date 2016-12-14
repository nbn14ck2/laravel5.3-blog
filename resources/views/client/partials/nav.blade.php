    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top affix">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>

                <a class="navbar-brand" href="{{ route('home') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
            </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <li><a href=""><label for=""><i class="fa fa-drivers-license-o"></i>About US</label></a></li>

                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}"><label for="">Login</label></a></li>
                        <li><a href="{{ url('/register') }}"><label for="">Register</label></a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <img class="img img-circle" id="avatar_sm" src="{{ asset('resources/user/'.Auth::user()->avatar) }}" alt="">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                @if(Auth::user()->active == 1)
                                    <li><a href="{{ route('dashboard') }}"><i class="fa fa-home fa-wf"></i>Area Admin</a></li>
                                @endif
                                
                                <li><a href="{{ url('user/'.Auth::user()->id) }}"><i class="fa fa-cog fa-wf"></i> Account</a></li>
                                <li>
                                    <a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out"></i>Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>