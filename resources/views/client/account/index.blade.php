<!DOCTYPE html>
<html>
    @include('client.partials.head')
    <style>
        body {
            padding-top: 6em;
        }
    </style>
<body>
    @include('client.partials.nav')

    @include('client.account.aside')

    <div class="col-sm-9">
        <div id="space20">&nbsp;</div>
        @include('admin.partials.status')
        
        <div class="container-fluid">
            @if(count($errors) > 0)
                <div class="alert alert-danger fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            @section('account_info')
                <section>
                    <div id="info" class="row">        
                            <h3 class="lead text-center">Account info</h3>
                            <table class="table">
                                <tr>
                                    <th>Name</th>
                                    <td>{{ Auth::user()->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ Auth::user()->email }}</td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td>{{ Auth::user()->gender }}</td>
                                </tr>
                                <tr>
                                    <th>Like</th>
                                    <td>{{ Auth::user()->like }}</td>
                                </tr>
                                <tr>
                                    <th>Slogan</th>
                                    <td>{{ Auth::user()->slogan }}</td>
                                </tr>
                            </table>
                    </div>
                
                    <div id="alerts" class="row">
                        <div class="alert alert-info fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Info!</strong> You should <a href="#" class="alert-link">read this message</a>.
                        </div>
                    </div>
                </section>
            @show
            @yield('change_account')
        </div>
    </div>

    @include('client.account.form')

    @include('client.partials.scripts')        
</body>
</html>