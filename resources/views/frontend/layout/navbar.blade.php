{{-- contact --}}
<nav class="navbar navbar-expand-lg mb-0 navbar-dark py-1 p-lg-0 bg-primary">
  <div class="container">
    <div class="nav-nav d-lg-none mr-md-3 mr-lg-0 text-decoration-none">
      <a class="nav-link pl-5 pl-md-2 pr-0 d-lg-none d-inline text-warning" href="#"><i class="fas fa-phone-alt"></i> <div class="d-none d-md-inline">  012-345-6789</div></a>
      <a class="nav-link pl-md-2 pr-0 d-lg-none d-inline text-warning" href="#"><i class="fas fa-envelope"></i> <div class="d-none d-md-inline">  info@gmail.com</div></a>
      <a class="nav-link pl-md-2 pr-0 d-lg-none d-inline text-warning" href="#"><i class="fas fa-map-marker-alt"></i> <div class="d-none d-md-inline">  Alamat: Jl. Lorem ipsum dolor sit amet.</div></a>
    </div>
    <div class="collapse navbar-collapse">
      <div class="navbar-nav">
        <a class="nav-link py-1 text-warning" href="#"><i class="fas fa-phone-alt"></i>  012-345-6789</a>
        <a class="nav-link py-1 text-warning" href="#"><i class="fas fa-envelope"></i>  info@gmail.com</a>
        <a class="nav-link py-1 text-warning" href="#"><i class="fas fa-map-marker-alt"></i>  Alamat: Jl. Lorem ipsum dolor sit amet.</a>
      </div>
    </div>
    <div class="nav-nav pl-sm-5 ml-sm-5 pl-md-0 ml-md-0">
      <a class="nav-link text-right d-inline pr-lg-2 ml-sm-5 pl-sm-5 pl-md-0 ml-md-0 pr-0 text-white" href="#"><i class="fab fa-facebook"></i><a>
      <a class="nav-link pl-md-1 d-inline pr-0 pr-lg-2 text-white" href="#"><i class="fab fa-youtube"></i><a>
      <a class="nav-link pl-md-1 d-inline pr-0 pr-lg-2 text-white" href="#"><i class="fab fa-twitter"></i><a>
      <a class="nav-link pl-md-1 d-inline pr-0 pr-lg-2 text-white" href="#"><i class="fab fa-instagram"></i><a>
    </div>
  </div>
</nav>
{{-- end contact --}}

<section class="bg-white mt-0">
  <div class="container">
    <img src="{{asset('img/sekolah.png')}}" class="mx-auto d-block d-lg-inline pt-2" alt="logo" width="70">
    <div class="d-inline-block">
      <div class="d-flex flex-column text-center text-lg-left ml-3">
        <h3 class="font-weight-bold d-lg-inline mt-0 mb-0 pt-0" style="color: #244b73; font-family: 'Merriweather Sans', sans-serif;">SMK ALMUSYAFA </h3>
        <p class="d-inline-block">SMK UNGGULAN YANG MENGHASILKAN SDM BERMUTU DAN BERDAYA SAING TINGGI</p>
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
        <a class="nav-link pl-3 pl-lg-2" href="#">Features</a>
        <a class="nav-link pl-3 pl-lg-2" href="#">Pricing</a>
        <li class="nav-item dropdown">
          <a class="nav-link pl-3 pl-lg-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
            Dropdown link
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
      </div>
    </div>
  </div>
</nav>
