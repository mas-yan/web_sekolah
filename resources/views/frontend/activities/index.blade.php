@extends('frontend.layout.master')
@section('title', 'Agenda Kegiatan')
@section('style')
<style>
  .txt{
    display: -webkit-box;
    max-height: 5rem;
    max-width: 100%;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
</style>
@endsection
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="mt-3"></div>
  <h2>Agenda Kegiatan</h2>
  @foreach ($activities as $activity)
    <div class="card mb-3">
      <a href="{{route('home.activity.index')}}" class="card-body text-decoration-none text-dark">
          <h4 class="text-primary">{{$activity->title}}</h4>
          <i aria-hidden="true" class="fa fa-calendar"></i> {{$activity->tgl}}
          <hr class="my-0">
          <div class="mt-3 txt">
            {!!$activity->description!!}
          </div>
      </a>
    </div>
    {{ $activities->links() }}
  @endforeach
</div>
@endsection