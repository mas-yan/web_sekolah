@extends('frontend.layout.master')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="mt-3"></div>
  <div class="row">
    <div class="col-12 col-lg-8">
      <div class="card">
        <div class="card-body">
          <h3>{{$post->title}}</h3>
          <hr>
          <img src="{{$post->image}}" class="w-100 rounded">
          <div class="mt-3">
            <p>{!!$post->article!!}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-4">
    </div>
  </div>
</div>
@endsection