@extends('base')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/uniform.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/select2.css') }}" />
@stop

@section('content')
 <div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>仪表盘</a> <a href="#">用户列表</a> <a href="#" class="current">添加用户</a> </div>
    <h1><a href="{{ route('users.index') }}" class="btn btn-info">所有用户</a>  添加用户</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" 
                @if(isset($user))
                  action="{{route('users.update',$user->id)}}" 
                @else
                  action="{{route('users.store')}}"
                @endif
                  
                  name="basic_validate" id="basic_validate" novalidate="novalidate">
                @if(isset($user))
                  <input type="hidden" name="_method" value="PUT">
                @endif
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="control-group">
                <label class="control-label">用户名</label>
                <div class="controls">
                  <input type="text" class="span11" name="name" id="name"
                      @if(isset($user))
                        value="{{$user->name}}" 
                      @else
                        action="{{ old('name') }}" 
                      @endif
                   >
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">E-mail</label>
                <div class="controls">
                  <input type="text" class="span11" name="email" id="email"
                      @if(isset($user))
                        value="{{$user->email}}" 
                      @else
                        action="{{ old('email') }}" 
                      @endif
                  >
                </div>
              </div>
             <div class="control-group">
                <label class="control-label">Password</label>
                <div class="controls">
                  <input type="password"class="span11" name="password" id="password"
                     @if(isset($user))
                        class=""
                      @else
                        class="required" 
                      @endif
                  >
                </div>
              </div>
            <div class="control-group">
              <label class="control-label">用户角色</label>
              <div class="controls">
                <select class="span11" name='role_id'>
                  @foreach($roles as $role)
                    <option 
                      @if(isset($user) && $user->role[0]->id == $role->id)
                        selected
                      @endif
                    value='{{ $role->id }}'>{{ $role->name }}</option>
                  @endforeach
                </select>
              </div>
            </div> 
              <div class="form-actions">
                <input type="submit" value="Save" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
@section('script')
<script src="{{ asset('js/jquery.min.js') }}"></script> 
<script src="{{ asset('js/jquery.ui.custom.js') }}"></script> 
<script src="{{ asset('js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('js/jquery.uniform.js') }}"></script> 
<script src="{{ asset('js/select2.min.js') }}"></script> 
<script src="{{ asset('js/jquery.validate.js') }}"></script> 
<script src="{{ asset('js/matrix.js') }}"></script> 
<script src="{{ asset('js/matrix.form_validation.js') }}"></script>
<script>
  $('.textarea_editor').wysihtml5();
</script>

@stop