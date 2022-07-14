@extends('frontend.layout.master')
    
@section('title','galery')
@section('content')
<div class="container-fluid mt-5">
  <h2>Galeri Sekolah</h2>
  <hr>
  <div class="row">
    @foreach ($images as $value)
      <div class="col-md-4 mb-4">
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
  {{$images->links()}}
</div>
@endsection
