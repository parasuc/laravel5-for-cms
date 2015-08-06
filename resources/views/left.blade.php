<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="active"><a href=""><i class="icon icon-home"></i> <span>仪表盘</span></a> </li>
    <li  class="submenu"> <a href="#"><i class="icon icon-user"></i> <span>用户管理</span> <span class="label label-important">3</span></a>
      <ul>
        <li><a href="{{ route('users.index') }}">所有用户</a></li>
        <li><a href="{{ route('users.create') }}">添加用户</a></li>
        <li><a href="{{ route('roles.index') }}">用户组</a></li>
        <li><a href="{{ route('permissions.index') }}">用户权限</a></li>
      </ul>
    </li>
     <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>栏目管理</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{ route('categories.index') }}">所有栏目</a></li>
        <li><a href="{{ route('categories.create') }}">添加栏目</a></li>
      </ul>
    </li>

     <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>文章管理</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{ route('articles.index') }}">所有文章</a></li>
        <li><a href="{{ route('articles.create') }}">添加文章</a></li>
      </ul>
    </li>

    <li class="content"> <span>Monthly Bandwidth Transfer</span>
      <div class="progress progress-mini progress-danger active progress-striped">
        <div style="width: 77%;" class="bar"></div>
      </div>
      <span class="percent">77%</span>
      <div class="stat">21419.94 / 14000 MB</div>
    </li>
    <li class="content"> <span>Disk Space Usage</span>
      <div class="progress progress-mini active progress-striped">
        <div style="width: 87%;" class="bar"></div>
      </div>
      <span class="percent">87%</span>
      <div class="stat">604.44 / 4000 MB</div>
    </li>
  </ul>
</div>