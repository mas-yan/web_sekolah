@extends('frontend.layout.master')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="mt-3"></div>
  <h2>Semua Berita</h2>
  <hr>
  <div class="row">
    @foreach ($posts as $post)
    <div class="col-md-3 mb-4">
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
  {{$posts->links()}}
</div>
@endsection