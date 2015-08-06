@extends('base')

@section('content')
    <div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>仪表盘</a> <a href="#" class="current">所有文章</a> </div>
    <h1>所有文章  <a href="{{ route('articles.create') }}" class="btn btn-info">添加文章</a></h1>
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
                  <th>标题</th>
                  <th>slug</th>
                  <th>描述</th>
                  <th>栏目</th>
                  <th>添加时间</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
                @foreach($articles as $article)
                <tr class="odd gradeX">
                  <td>{{ $article->id }}</td>
                  <td>{{ $article->title }}</td>
                  <td>{{ $article->slug }}</td>
                  <td>{{ $article->description }}</td>
                  <td>{{ $article->categoryname->name }}</td>
                  <td class="center">{{ $article->created_at }}</td>
                  <td class="center">
                     <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary btn-mini">Edit</a>
                     @include('partials.modal', ['data' => $article, 'name' => 'articles'])
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