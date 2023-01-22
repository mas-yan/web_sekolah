<div class="bg-primary pb-3 text-white shadow-lg">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-12 mt-5">
        <h3>Tentang</h3>
        <hr style="height: 4px">
        {{$about->first()->about}}
      </div>
      <div class="col-lg-4 col-12 mt-5">
        <h3>Alamat</h3>
        <hr style="height: 4px">
        {{$about->first()->full_address}}
      </div>
      <div class="col-lg-4 col-12 mt-5">
        <h3>Visi Dan Misi</h3>
        <hr style="height: 4px">
        <h5>Visi</h5>
        {{$about->first()->visi}}
        <h5 class="mt-3">Misi</h5>
        {{$about->first()->visi}}
      </div>
    </div>
    <div class="row">
      <div class="col mt-5">
        <h3>Tempat Kami</h3>
        <hr style="height: 4px;">
        {!!$about->first()->map!!}
      </div>
    </div>
  </div>
</div>
<footer class="footer text-center mt-auto pb-4 pb-lg-3 pb-xl-3 pb-xxl-3 pt-3" style="background-color:#011d42">
<div class="container">
  <span class="text-white">© 2022 SMK</span>
</div>
</footer>
<div class="mt-4 d-lg-none d-xl-none d-xxl-none">&nbsp;</div>