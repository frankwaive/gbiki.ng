@extends('layouts.auth')

@section ('PageTitle')
Join Gbiki || Register a new account
@stop






@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Register</h4></div>

                <div class="panel-body">
                    <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>




                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                    </div>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>





                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                        <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-file-image-o"></i></span>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        </div>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>






                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                        <div class="col-md-6">
                            <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                                <input id="password" type="password" class="form-control" name="password" required>
                        </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>




                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                         <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                         </div>
                    </div>


                        <div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
                            <label for="sex" class="col-md-4 control-label">Sex</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <select id="sex" type="text" class="form-control" name="sex" value="{{ old('sex') }}" required>
                              <option value="1">Male</option>
                              <option value="2">Female</option>
                            </select>
                        </div>
                                

                                @if ($errors->has('sex'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>




           <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
                            <label for="about" class="col-md-4 control-label">About Yourself</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                                <textarea id="about" type="text" class="form-control" name="about" value="{{ old('about') }}" required> </textarea>

                                @if ($errors->has('about'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('about') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>
                        </div>




                        <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                            <label for="avatar" class="col-md-4 control-label">Avatar</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-file-image-o"></i></span>
                                <input id="avatar" type="file" accept="image/*" class="form-control" name="avatar" value="{{ old('avatar') }}" required>

                                @if ($errors->has('avatar'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
