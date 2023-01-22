@inject('about', 'App\Models\About')
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion sc" id="accordionSidebar" style="overflow-y: scroll; overflow-x: hidden; height:100vh;">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
      <div class="sidebar-brand-icon">
        <img src="{{$about->first()->logo}}" alt="image" width="50px">
      </div>
      <div class="sidebar-brand-text mx-3"> {{$about->first()->name}}</div>
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
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Sekolah
    </div>

  <!-- Nav Item - Charts -->
  <li class="nav-item {{ request()->is('admin/jurusan*') ? 'active' : '' }}">
      <a class="nav-link" href="{{route('jurusan.index')}}">
          <i class="fas fa-fw fa-graduation-cap"></i>
          <span>Jurusan</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
      Slider
  </div>

  <!-- Nav Item - Tables -->
  <li class="nav-item {{ request()->is('admin/sliders*') ? 'active' : '' }}">
      <a class="nav-link" href="{{route('sliders.index')}}">
          <i class="fas fa-fw fa-tv"></i>
          <span>Slider</span></a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
      User
  </div>

  <!-- Nav Item - Tables -->
  <li class="nav-item {{ request()->is('admin/users*') ? 'active' : '' }}">
      <a class="nav-link" href="{{route('users.index')}}">
          <i class="fas fa-fw fa-user"></i>
          <span>User</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  <li class="nav-item {{ request()->is('admin/abouts*') ? 'active' : '' }}">
    <a class="nav-link" href="{{route('abouts.index')}}">
        <i class="fas fa-fw fa-info"></i>
        <span>Tentang Sekolah</span></a>
  </li>
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>