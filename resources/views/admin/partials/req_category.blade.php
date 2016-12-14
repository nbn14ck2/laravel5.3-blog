    <div class="col-md-8 col-md-offset-2">
        @if(count($errors) > 0)
            <div class="alert alert-danger fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <ul>
                    @foreach($errors->all() as $error)
                        <li><strong>Oh snap! </strong>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if($errors->first('name'))
            <style>
                #name label {
                    color: #A94442;
                }
                #name input {
                    border: none;
                    border: 1px solid #A94442;
                }
            </style>
        @endif

        @if($errors->first('description'))
            <style>
                #description {
                    color: #A94442;
                }
                #description textarea {
                    border: none;
                    border: 1px solid #A94442;
                }
            </style>
        @endif