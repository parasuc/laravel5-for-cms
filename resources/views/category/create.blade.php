@extends('base')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/uniform.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/select2.css') }}" />
@stop

@section('content')
 <div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>仪表盘</a> <a href="#">栏目列表</a> <a href="#" class="current">添加栏目</a> </div>
    <h1><a href="{{ route('categories.index') }}" class="btn btn-info">栏目列表</a>&nbsp;&nbsp;&nbsp;添加栏目</h1>
    
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post"
                @if(isset($cate))  
                  action="{{ route('categories.update',$cate->id) }}"
                @else
                  action="{{ route('categories.store') }}"
                @endif
                name="basic_validate" id="basic_validate" novalidate="novalidate" >

                @if(isset($cate))  
                   <input name="_method" type="hidden" value="PUT">
                @endif
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <div class="control-group">
                <label class="control-label">选择类别</label>
                <div class="controls">

                  <select class="span11" name='pid'>
                       <option value='0' >选择父类</option>
                        @foreach($cates as $c)
                          <option value="{{ $c['id'] }}" 
                          @if(isset($cate) && $cate->pid ==$c['id'])
                            selected
                          @endif
                          >{{ $c['name'] }}</option>
                        @endforeach
                  </select>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">名字</label>
                <div class="controls">
                  <input type="text" class="span11" name="name" id="name" 
                    @if(isset($cate)) 
                      value="{{ $cate->name }}" 
                    @else
                      value="{{ old('name') }}" 
                    @endif 
                  />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">slug</label>
                <div class="controls">
                  <input type="text" class="span11" name="slug" id="slug"
                    @if(isset($cate))  
                      value="{{ $cate->slug }}"
                    @else
                      value="{{ old('slug') }}" 
                    @endif 
                  />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">描述</label>
                <div class="controls">
                  <textarea class="span11" name="description" >@if(isset($cate)){{ $cate->description }}@else{{ old('description') }}@endif</textarea>
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