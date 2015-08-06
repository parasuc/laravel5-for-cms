@extends('base')

@section('content')
    <div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>仪表盘</a> <a href="#" class="current">栏目列表</a> </div>
    <h1>栏目列表 &nbsp;&nbsp;&nbsp;<a href="{{ route('categories.create') }}" class="btn btn-info">添加栏目</a></h1>
  </div>
  <div class="container-fluid">
       <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>栏目树</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
                @foreach($cates as $cate)
                <tr class="odd gradeX">
                  <td>{{ $cate['id'] }}</td>
                  <td>{{ $cate['name'] }}</td>
                  <td class="center">
                    <a href="{{ route('categories.edit', $cate['id']) }}" class="btn btn-primary btn-mini">Edit</a>

                    <a data-toggle="modal" href="#modal-addson-{!! $cate['id'] !!}" class="btn  btn-info btn-mini">add son</a>
                      <div id="modal-addson-{!! $cate['id']!!}" class="modal text-left fade">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <form method="POST" action="{{ route('categories.store') }}" accept-charset="UTF-8">
                              <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h1 class="modal-title">添加子类</h1>
                                </div>
                                <div class="modal-body">
                                    <div class="control-group">
                                      <label class="control-label">选择类别</label>
                                      <div class="controls">
                                        <select class="span11" name='pid'>
                                             <option value='0' >选择父类</option>
                                              @foreach($cates as $c)
                                                <option value="{{ $c['id'] }}" 
                                                @if($cate['id']==$c['id'])
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
                                        <input type="text" class="span11" name="name" id="name" />
                                      </div>
                                    </div>
                                    <div class="control-group">
                                      <label class="control-label">slug</label>
                                      <div class="controls">
                                        <input type="text" class="span11" name="slug" id="slug"/>
                                      </div>
                                    </div>
                                    <div class="control-group">
                                      <label class="control-label">描述</label>
                                      <div class="controls">
                                        <textarea class="span11" name="description" ></textarea>
                                      </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary">Save</button>
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Canca</button>
                                </div>
                            </form>
                          </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                      </div><!-- /.modal -->
                    <a data-toggle="modal" class="btn btn-danger btn-mini" href="#modal-delete-{!! $cate['id'] !!}">Delete</a>
                      <div id="modal-delete-{!! $cate['id']!!}" class="modal text-left fade">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <form method="POST" action="{{ route('categories.destroy',$cate['id']) }}" accept-charset="UTF-8">
                              <input name="_method" type="hidden" value="DELETE">
                              <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h1 class="modal-title">Delete Data</h1>
                                </div>
                                <div class="modal-body">
                                  <p>
                                    Are you sure want to delete this data?
                                  </p>
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary">Yes</button>
                                  <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                </div>
                            </form>
                          </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                      </div><!-- /.modal -->
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop