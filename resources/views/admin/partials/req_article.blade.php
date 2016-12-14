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

        @if($errors->first('title'))
            <style>
                #title label {
                    color: #A94442;
                }
                #title input {
                    border: none;
                    border: 1px solid #A94442;
                }
            </style>
        @endif

        @if($errors->first('description'))
            <style>
                #description label {
                    color: #A94442;
                }
                #description textarea {
                    border: none;
                    border: 1px solid #A94442;
                }
            </style>
        @endif

        @if($errors->first('content'))
            <style>
                #_content label {
                    color: #A94442;
                }
            </style>
        @endif

        @if($errors->first('Imagefile'))
            <style>
                #image {
                    color: #A94442;
                }
            </style>
        @endif

        @if($errors->first('category'))
            <style>
                #category {
                    color: #A94442;
                }
            </style>
        @endif