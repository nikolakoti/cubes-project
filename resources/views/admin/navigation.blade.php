<ul class="navbar-nav navbar-sidenav" id="sideMenu">
	<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
		<a class="nav-link" href="{{route('admin.dashboard')}}">
			<i class="fa fa-fw fa-dashboard"></i>
			<span class="nav-link-text">Dashboard</span>
		</a>
	</li>
	<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Static Pages">
		<a class="nav-link" href="{{route('admin.static-pages.index')}}">
			<i class="fa fa-fw fa-newspaper-o"></i>
			<span class="nav-link-text">Static Pages</span>
		</a>
	</li>
	<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Index Slides">
		<a class="nav-link" href="{{route('admin.index-slides.index')}}">
			<i class="fa fa-fw fa-photo"></i>
			<span class="nav-link-text">Index Slides</span>
		</a>
	</li>
	<li class="nav-item" data-toggle="tooltip" data-placement="right" title="File Manager">
		<a class="nav-link" href="{{route('admin.filemanager.index')}}">
			<i class="fa fa-fw fa-dashboard"></i>
			<span class="nav-link-text">File Manager</span>
		</a>
	</li>
	<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tags">
		<a class="nav-link" href="{{route('admin.tags.index')}}">
			<i class="fa fa-fw fa-tags"></i>
			<span class="nav-link-text">Tags</span>
		</a>
	</li>
	<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Users">
		<a class="nav-link" href="{{route('admin.users.index')}}">
			<i class="fa fa-fw fa-id-card"></i>
			<span class="nav-link-text">Users</span>
		</a>
	</li>
</ul>