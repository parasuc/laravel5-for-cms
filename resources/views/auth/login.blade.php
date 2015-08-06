<!DOCTYPE html>
<html lang="en">
<head>
    <title>Matrix Admin</title><meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/bootstrap-responsive.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/matrix-login.css') }}" />
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/font.css') }}" />
</head>
    <body>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div id="loginbox">            
            <form id="loginform" class="form-vertical" method="POST" action="{{ url('/auth/login') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
				 <div class="control-group normal_text"> <h3><img src="{{ asset('img/logo.png') }}" alt="Logo" /></h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"></i></span><input type="email" placeholder="email" class="form-control" name="email" value="{{ old('email') }}" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" placeholder="password" class="form-control" name="password" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span>
                    <span class="pull-right"><button type="submit" class="btn btn-primary">Login</button></span>
                </div>
            </form>
            <form id="recoverform" method="POST" action="{{ url('/password/email') }}" class="form-vertical">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
				<p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-envelope"></i></span>
                            <input type="email" placeholder="E-mail address" class="form-control" name="email" value="{{ old('email') }}">
                        </div>
                    </div>
               
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
                    <span class="pull-right">
                        <button type="submit" class="btn btn-primary">
                            Send Password Reset Link
                        </button></span>
                </div>
            </form>
        </div>
        <script src="{{ asset('js/jquery.min.js') }}"></script>  
        <script src="{{ asset('js/matrix.login.js') }}"></script> 
    </body>

</html>
