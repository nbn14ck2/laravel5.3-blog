        <aside  class="col-sm-3 text-center">
            <div id="account_info">
                <ul>
                    <li>
                        <figure>
                            <a href="{{ url('/user/'.Auth::user()->id.'/avatar') }}" data-toggle="modal" data-target="#avatarModal"><img class="img img-circle img-responsive" src="{{ asset('resources/user/'.Auth::user()->avatar) }}"></a>
                        </figure>
                    </li>
                    <li><a href="{{ url('/user/'.Auth::user()->id) }}">Account</a></li>
                    <li><a href="{{ url('/user/'.Auth::user()->id.'/edit') }}">Change Info</a></li>
                    <li><a href="{{ url('/user/'.Auth::user()->id.'/password') }}" data-toggle="modal" data-target="#changeModal">Change password</a></li>
                    <li><a href="{{ url('/user/'.Auth::user()->id.'/reset') }}" data-toggle="modal" data-target="#resetModal">Reset password</a></li>
                </ul>
            </div>
        </aside>