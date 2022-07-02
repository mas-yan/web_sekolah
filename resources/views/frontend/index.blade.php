@extends('frontend.layout.master')

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
  <div class="mt-3"></div>
  <div class="row">
    <div class="col-12 col-lg-8 mb-3">
      <h3 class="text-dark">
        <i class="fas fa-file-alt"></i>
        Berita Terbaru
      </h3>
      <hr class="mt-0">
      <div class="row">
        @forelse ($posts as $post)
        <div class="col-12 col-md-4 mb-3">
          <a href="article/{{$post->slug}}" class="card text-decoration-none shadow">
            <img src="{{$post->image}}" class="card-img-top" alt="image">
            <div class="card-body">
              <h5 class="card-title text-dark">{{$post->title}}</h5>
              <p class="card-text text-muted">{{$post->description}}</p>
            </div>
            <div class="card-footer bg-white text-dark">
              <i class="fa fa-calendar"></i>
              {{$post->date}}
            </div>
          </a>
        </div>
          @empty
          <div class="card">
          <div class="card-body alert-danger">
            Belum ada berita terbaru
          </div>
        </div>
        @endforelse
      </div>{{ $posts->links() }}
    </div>
    
    <div class="col-12 col-lg-4">
      <h3 class="text-dark">
        <i class="fas fa-info-circle"></i>
        Papan Informasi
      </h3>
      <hr class="mt-0">
      @foreach ($informations as $information)
        <div class="card mb-3 shadow-sm border-0">
          <div class="card-body">
            <h6>{{$information->title}}</h6>
            <hr>
            <div>{!!$information->description!!}
            </div>
            <div class="mt-2">
              <i aria-hidden="true" class="fa fa-calendar"></i> {{$information->date}}
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection