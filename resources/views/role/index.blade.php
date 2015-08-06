@extends('base')

@section('content')
    <div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>仪表盘</a> <a href="#" class="current">用户组列表</a> </div>
    <h1>用户组列表&nbsp;&nbsp;&nbsp;<a href="{{ route('roles.create') }}" class="btn btn-info">添加用户组</a></h1>
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
                  <th>权限列表</th>
                  <th>添加时间</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
                @foreach($roles as $role)
                <tr class="odd gradeX">
                  <td>{{ $role->id }}</td>
                  <td>{{ $role->name }}</td>
                  <td>{{ $role->display_name }}</td>
                  <td>{{ $role->description }}</td>
                  <td>
                      <ul>

                      @foreach($role->pres as $pre)
                        <li>{{ $pre->name }}</li>
                      @endforeach
                      </ul>
                  </td>
                  
                  <td class="center">{{ $role->created_at }}</td>
                  <td class="center">
                     <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary btn-mini">Edit</a>
                     @include('partials.modal', ['data' => $role, 'name' => 'roles'])
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