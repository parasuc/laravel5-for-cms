@extends('base')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/uniform.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap-wysihtml5.css') }}" />

@stop

@section('content')
 <div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>仪表盘</a> <a href="#">文章列表</a> <a href="#" class="current">添加文章</a> </div>
    <h1><a href="{{ route('articles.index') }}" class="btn btn-info">文章列表</a>&nbsp;&nbsp;&nbsp;添加文章</h1>
    
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" enctype="multipart/form-data"
                @if(isset($article))  
                  action="{{ route('articles.update',$article->id) }}"
                @else
                  action="{{ route('articles.store') }}"
                @endif
                name="basic_validate" id="basic_validate" novalidate="novalidate" >

                @if(isset($article))  
                   <input name="_method" type="hidden" value="PUT">
                @endif
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

             

              <div class="control-group">
                <label class="control-label">标题</label>
                <div class="controls">
                  <input type="text" class="span11" name="title" id="title" 
                    @if(isset($article)) 
                      value="{{ $article->title }}" 
                    @else
                      value="{{ old('title') }}" 
                    @endif 
                  />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">slug</label>
                <div class="controls">
                  <input type="text" class="span11" name="slug" id="slug"
                    @if(isset($article))  
                      value="{{ $article->slug }}"
                    @else
                      value="{{ old('slug') }}" 
                    @endif 
                  />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">选择类别</label>
                <div class="controls">

                  <select class="span11" name='category_id'>
                       <option value='0' >选择父类</option>
                        @foreach($cates as $c)
                          <option value="{{ $c['id'] }}" 
                          @if(isset($article) && $article->category_id ==$c['id'])
                            selected
                          @endif
                          >{{ $c['name'] }}</option>
                        @endforeach
                  </select>
                </div>
              </div>

              <div class="control-group">
               <label class="control-label">描述</label>
                <div class="controls">
                  <textarea class="textarea_editor span11" rows="6" name="description"   placeholder="Enter text ...">
                    @if(isset($article))  
                      {{ $article->description }}
                    @else
                      {{ old('slug') }}
                    @endif 
                  </textarea>
                </div>
              
            </div>

              <div class="control-group">
                <label class="control-label">内容</label>
                <div class="controls">
                <textarea class="form-control span11" id="ckeditor" name="body" cols="50" rows="6">
                    @if(isset($article))  
                      {{ $article->body }}
                    @else
                      {{ old('slug') }}
                    @endif 
                </textarea>
               </div>
              </div>

              <div class="control-group">
                  <label class="control-label">上传图片:</label>
                  <div class="controls">
                    <input class="span11" name="image" type="file" id="image">
                    <img 
                      @if(isset($article))  
                        src='{{ asset($article->image) }}'
                      @else
                        src=''
                      @endif 
                     />
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
<script src="{{ asset('js/wysihtml5-0.3.0.js') }}"></script> 
<script src="{{ asset('js/bootstrap-wysihtml5.js') }}"></script> 
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script> 
<script src="{{ asset('ckfinder/ckfinder.js') }}"></script> 
  
<script type="text/javascript">
    CKEDITOR.editorConfig = function( config ) {
      var prefix = 'http://localhost/appcms/public';

       config.filebrowserBrowseUrl = prefix + '/ckfinder/ckfinder.html';
       config.filebrowserImageBrowseUrl = prefix + '/ckfinder/ckfinder.html?type=Images';
       config.filebrowserFlashBrowseUrl = prefix + '/ckfinder/ckfinder.html?type=Flash';
       config.filebrowserUploadUrl = prefix + '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
       config.filebrowserImageUploadUrl = prefix + '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
       config.filebrowserFlashUploadUrl = prefix + '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
    };

    var editor = CKEDITOR.replace( 'ckeditor' );
    var prefix = 'http://localhost/appcms/public';
    CKFinder.setupCKEditor( editor, prefix + '/ckfinder/') ;
  </script>
<script>
  $('.textarea_editor').wysihtml5();
</script>

@stop