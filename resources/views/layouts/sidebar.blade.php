<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion sc" id="accordionSidebar" style="overflow-y: scroll; overflow-x: hidden; height:100vh;">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">SMK KITA SEMUA <sup>2</sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
      <a class="nav-link" href="{{route('dashboard')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
      Content
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item {{ request()->is('admin/tags') || request()->is('admin/categories') || request()->is('admin/posts*')  ? 'active' : '' }}">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
          aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-file-alt"></i>
          <span>Content Berita</span>
      </a>
      <div id="collapseTwo" class="collapse {{ request()->is('admin/tags') || request()->is('admin/categories') || request()->is('admin/posts*')  ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Post</h6>
              <a class="collapse-item {{request()->is('admin/tags') ? 'active' : '' }}" href="{{route('tags.index')}}">Tag</a>
              <a class="collapse-item {{request()->is('admin/categories') ? 'active' : '' }}" href="{{route('categories.index')}}">Kategori</a>
              <a class="collapse-item {{request()->is('admin/posts*')  ? 'active' : '' }}" href="{{route('posts.index')}}">Berita</a>
          </div>
      </div>
  </li>

  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item {{ request()->is('admin/informations*') ? 'active' : '' }}">
    <a class="nav-link" href="{{route('informations.index')}}">
        <i class="fas fa-fw fa-info-circle"></i>
        <span>Informasi</span></a>
  </li>
  <li class="nav-item {{ request()->is('admin/activities*') ? 'active' : '' }}">
    <a class="nav-link" href="{{route('activities.index')}}">
        <i class="fas fa-fw fa fa-calendar"></i>
        <span>Agenda kegiatan</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
      Galeri
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item {{ request()->is('admin/images*') ? 'active' : '' }}">
    <a class="nav-link" href="{{route('images.index')}}">
        <i class="fas fa-fw fa-images"></i>
        <span>Gambar</span></a>
  </li>

  <!-- Nav Item - Charts -->
  <li class="nav-item">
      <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
  </li>

  <!-- Nav Item - Tables -->
  <li class="nav-item">
      <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>