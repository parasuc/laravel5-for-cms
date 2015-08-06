@extends('base')

@section('content')
    <div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>仪表盘</a> <a href="#" class="current">所有用户</a> </div>
    <h1>所有用户  <a href="{{ route('users.create') }}" class="btn btn-info">添加用户</a></h1>
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
                  <th>用户名</th>
                  <th>E-mail</th>
                  <th>添加时间</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                <tr class="odd gradeX">
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td class="center">{{ $user->created_at }}</td>
                  <td class="center">
                     <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-mini">Edit</a>
                     @include('partials.modal', ['data' => $user, 'name' => 'users'])
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