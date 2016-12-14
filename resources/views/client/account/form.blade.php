       <!-- Change Password Model Form -->
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/'.Auth::user()->id.'/password') }}">
        {{ csrf_field() }}
        <div class="modal fade" id="changeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Change Password</h4>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="current_password" class="col-md-4 control-label">Old password</label>
                            <div class="col-md-6">
                                <input name="current_password" type="password" class="form-control" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="new_password" class="col-md-4 control-label">New password</label>
                            <div class="col-md-6">
                                <input name="password" type="password" class="form-control" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="new_password" class="col-md-4 control-label">Confirm</label>
                            <div class="col-md-6">
                                <input name="verify_password" type="password" class="form-control" value="">
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save change</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Reset Password Model Form -->
    <form class="form-horizontal" role="form" method="POST" action="#">
        <div class="modal fade" id="resetModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Reset Password</h4>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6">
                                <input name="email" type="email" class="form-control" value="">
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Send Mail</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Change Avatar Model Form -->
    <form class="form-horizontal" role="form" method="POST" action="{{ url('user/'.Auth::user()->id.'/avatar') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal fade" id="avatarModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Change Avatar</h4>
                    </div>

                    <div class="modal-body">
                        <div id="image">
                            <label for="Imagefile">Image:</label>
                            <input type="file" id="Imagefile" name="Imagefile">
                            <p class="help-block">The file under validation must be an image (jpeg, png, bmp, gif, or svg).</p>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" type="button" class="btn btn-primary">Save Change</button>
                    </div>
                </div>
            </div>
        </div>
    </form>