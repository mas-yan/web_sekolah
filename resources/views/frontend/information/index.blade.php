@extends('frontend.layout.master')
@section('title', 'Informasi')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="mt-3"></div>
  <h2>Informasi</h2>
  <hr>
  @foreach ($informations as $information)
    <div class="alert alert-info shadow-sm mb-2 rounded">
      <a href="{{route('information.show', $information->slug)}}" class="card-body text-decoration-none text-dark">
          <h4 class="text-primary">{{$information->title}}</h4>
          <i aria-hidden="true" class="fa fa-calendar"></i> {{$information->tgl}}
          <hr class="my-0">
          <div class="mt-2 txt">
            {!!$information->description!!}
          </div>
      </a>
    </div>
    @endforeach
    {{ $informations->links() }}
</div>
@endsection