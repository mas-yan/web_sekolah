@extends('frontend.layout.master')
@section('title', $jurusan->title)
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="mt-3"></div>
      <div class="card">
        <div class="card-body">
          <h3>{{$jurusan->title}}</h3>
          <hr>
          <div class="mt-3">
            <p>{!!$jurusan->description!!}</p>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection