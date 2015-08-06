@extends('base')

@section('content')
    <div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>仪表盘</a> <a href="#" class="current">权限列表</a> </div>
    <h1>权限列表 &nbsp;&nbsp;&nbsp;<a href="{{ route('permissions.create') }}" class="btn btn-info">添加权限</a></h1>
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
                  <th>名字</th>
                  <th>展示</th>
                  <th>描述</th>
                  <th>添加时间</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
                @foreach($perms as $per)
                <tr class="odd gradeX">
                  <td>{{ $per->id }}</td>
                  <td>{{ $per->name }}</td>
                  <td>{{ $per->display_name }}</td>
                  <td>{{ $per->description }}</td>
                  <td class="center">{{ $per->created_at }}</td>
                  <td class="center">
                     <a href="{{ route('permissions.edit', $per->id) }}" class="btn btn-primary btn-mini">Edit</a>
                     @include('partials.modal', ['data' => $per, 'name' => 'permissions'])
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