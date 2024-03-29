{{-- contact --}}
<nav class="navbar navbar-expand-lg mb-0 navbar-dark py-1 p-lg-0 bg-primary">
  <div class="container">
    <div class="nav-nav d-lg-none mr-md-3 mr-lg-0 text-decoration-none">
      <a class="nav-link pl-5 pl-md-2 pr-0 d-lg-none d-inline text-warning" href="#"><i class="fas fa-phone-alt"></i> <div class="d-none d-md-inline">  {{$about->first()->telp}}</div></a>
      <a class="nav-link pl-md-2 pr-0 d-lg-none d-inline text-warning" href="#"><i class="fas fa-envelope"></i> <div class="d-none d-md-inline">  {{$about->first()->email}}</div></a>
      <a class="nav-link pl-md-2 pr-0 d-lg-none d-inline text-warning" href="#"><i class="fas fa-map-marker-alt"></i> <div class="d-none d-md-inline">  {{$about->first()->address}}</div></a>
    </div>
    <div class="collapse navbar-collapse">
      <div class="navbar-nav">
        <a class="nav-link py-1 text-warning" href="#"><i class="fas fa-phone-alt"></i>  {{$about->first()->telp}}</a>
        <a class="nav-link py-1 text-warning" href="#"><i class="fas fa-envelope"></i>  {{$about->first()->email}}</a>
        <a class="nav-link py-1 text-warning" href="#"><i class="fas fa-map-marker-alt"></i>  {{$about->first()->address}}</a>
      </div>
    </div>
    <div class="nav-nav pl-sm-5 ml-sm-5 pl-md-0 ml-md-0">
      <a class="nav-link text-right d-inline pr-lg-2 ml-sm-5 pl-sm-5 pl-md-0 ml-md-0 pr-0 text-white" href="{{$about->first()->facebook}}"><i class="fab fa-facebook"></i><a>
      <a class="nav-link pl-md-1 d-inline pr-0 pr-lg-2 text-white" href="{{$about->first()->youtube}}"><i class="fab fa-youtube"></i><a>
      <a class="nav-link pl-md-1 d-inline pr-0 pr-lg-2 text-white" href="{{$about->first()->twitter}}"><i class="fab fa-twitter"></i><a>
      <a class="nav-link pl-md-1 d-inline pr-0 pr-lg-2 text-white" href="{{$about->first()->instagram}}"><i class="fab fa-instagram"></i><a>
    </div>
  </div>
</nav>
{{-- end contact --}}

<section class="bg-white mt-0">
  <div class="container">
    <img src="{{$about->first()->logo}}" class="mx-auto d-block d-lg-inline pt-2" alt="logo" width="70">
    <div class="d-inline-block">
      <div class="d-flex flex-column text-center text-lg-left ml-3">
        <h3 class="font-weight-bold d-lg-inline mt-0 mb-0 pt-0" style="color: #244b73; font-family: 'Merriweather Sans', sans-serif;">{{$about->first()->name}} </h3>
        <p class="d-inline-block">{{$about->first()->moto}}</p>
      </div>
    </div>
  </div>
</section>


<nav class="navbar navbar-expand-lg py-lg-0 navbar-dark bg-primary border-warning posisi" style="border-bottom:5px solid">
  <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        | <span class="font-weigth-bold">Menu</span>
      </button>
    <div class="collapse navbar-collapse pt-3 pt-lg-1" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link pl-3 pl-lg-2 {{ request()->is('/') ? 'active' : '' }}" href="/">Home <span class="sr-only">(current)</span></a>
        <a class="nav-link pl-3 pl-lg-2 {{ request()->is('article*') ? 'active' : '' }}" href="/article">Berita</a>
        <a class="nav-link pl-3 pl-lg-2 {{ request()->is('informations*') ? 'active' : '' }}" href="{{route('information.index')}}">Informasi</a>
        <a class="nav-link pl-3 pl-lg-2 {{ request()->is('galery*') ? 'active' : '' }}" href="{{route('galery.index')}}">Galery</a>
        <a class="nav-link pl-3 pl-lg-2 {{ request()->is('activities*') ? 'active' : '' }}" href="{{route('home.activity.index')}}">Agenda kegiatan</a>
        <li class="nav-item dropdown">
          <a class="nav-link pl-3 pl-lg-2 dropdown-toggle {{ request()->is('jurusan*') ? 'active' : '' }}" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
            Jurusan
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            @foreach (App\Models\Jurusan::jurusan() as $jurusan)
              <a class="dropdown-item {{ request()->is('jurusan/*'.$jurusan->slug) ? 'active' : '' }}" href="{{route('jurusan', $jurusan->slug)}}">{{$jurusan->title}}</a>
            @endforeach
          </div>
        </li>
      </div>
    </div>
    <a href="/admin" class="text-white text-decoration-none">Login</a>
  </div>
</nav>

