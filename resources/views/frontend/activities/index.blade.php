@extends('frontend.layout.master')
@section('title', 'Agenda Kegiatan')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="mt-3"></div>
  <h2>Agenda Kegiatan</h2>
  <hr>
  @foreach ($activities as $activity)
    <div class="card mb-3">
      <a href="{{route('home.activity.show', $activity->slug)}}" class="card-body text-decoration-none text-dark">
          <h4 class="text-primary">{{$activity->title}}</h4>
          <i aria-hidden="true" class="fa fa-calendar"></i> {{$activity->tgl}}
          <hr class="my-0">
          <div class="mt-3 txt">
            {!!$activity->description!!}
          </div>
      </a>
    </div>
    @endforeach
    {{ $activities->links() }}
</div>
@endsection