@extends('frontend.layout.master')

@section('style')
<style>
  @media (min-width: 992px) { 
    .galery{
      min-width: 400px;
    }
  }
</style>
@endsection

@section('content')
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
      <div class="carousel-item active">
      <img src="https://source.unsplash.com/random/200x70?sig=1" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
      <img src="https://source.unsplash.com/random/200x70?sig=2" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
      <img src="https://source.unsplash.com/random/200x70?sig=3" class="d-block w-100" alt="...">
      </div>
  </div>
  <button class="carousel-control-prev border-0 bg-transparent" type="button" data-target="#carouselExampleControls" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </button>
    <button class="carousel-control-next border-0 bg-transparent" type="button" data-target="#carouselExampleControls" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </button>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="mt-4"></div>
  <div class="row">
    <div class="col-md-8">
      <div class="row">
        <div class="col-md-12 mb-3">
          <h4><i class="fas fa-file-alt"></i> BERITA TERBARU</h4>
          <hr>
        </div>
        <div class="row">
          @foreach ($posts as $post)
            <div class="col-md-4 mb-4">
              <a href="article/{{$post->slug}}" class="card shadow-sm border-0 rounded-lg text-decoration-none">
                <img src="{{$post->image}}" class="card-img-top" alt="image">
                <div class="card-body">
                  <h5 class="card-title text-dark">{{$post->title}}</h5>
                  <p class="card-text text-muted txt">{{$post->description}}</p>
                </div>
                <div class="card-footer bg-white text-dark">
                  <i class="fa fa-calendar"></i>
                  {{$post->date}}
                </div>
              </a>
            </div>
            @endforeach
          </div>
          <div class="col-md-12 mb-3 mt-4">
            <h4><i class="fas fa-video"></i> GALERI TERBARU</h4>
            <hr>
          </div>
          <div class="row">
            @foreach ($galery as $value)
              <div class="col-md-6 mb-4">
                <a href="{{route('galery.show', $value->slug)}}" class="card bg-secondary text-decoration-none text-white h-100 shadow-sm border-0 galery rounded-lg">
                  <div class="card-img">
                    <img src="{{$value->image}}" class="w-100" style="width: 100%; height: 200px; border-top-left-radius: 0.3rem; border-top-right-radius: 0.3rem;">
                  </div>
                  <div class="card-body text-center">
                    <h6 class="txt">{{$value->title}}</h6>
                  </div>
                </a>
              </div>
            @endforeach
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="title mb-4"><h4>
          <i aria-hidden="true" class="fas fa-info-circle"></i> INFORMASI TERBARU</h4>
          <hr>
        </div>
        <div>
          {{-- <div class="list-group"> --}}
            @foreach ($informations as $information)
            <div class="alert alert-info shadow-sm mb-2 rounded">
              <a href="/category/belajar" class="text-decoration-none text-dark">
                <h5 class="d-inline-block text-truncate m-0 p-0" style="max-width: 300px;">
                  <i aria-hidden="true" class="fas fa-info-circle"></i> {{$information->title}}
                </h5>
                <hr class="mt-0 mb-2">
                <span class="txt">{!!$information->description!!}</span>
              </a>
            </div>
            @endforeach
          {{-- </div> --}}
        </div>
        <div class="title mb-3 mt-5">
          <h4><i aria-hidden="true" class="fa fa-calendar"></i> AGENDA KEGIATAN</h4>
          <hr>
        </div>
        <div>
          @foreach ($activities as $activity)
            <a href="{{route('home.activity.show', $activity->slug)}}" class="card text-decoration-none text-dark mb-3 shadow-sm border-0">
              <div class="card-body">
                <h6>{{$activity->title}}</h6>
                <hr>
                <div class="txt">{!!$activity->description!!}</div>
                <div class="mt-2">
                  <i aria-hidden="true" class="fa fa-calendar"></i> {{$activity->tgl}}
                </div>
              </div>
            </a>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection