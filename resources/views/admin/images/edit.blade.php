@extends('layouts.master')
@section('title', 'Edit Galery')


@section('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="d-flex justify-content-between">
      <h5 class="m-0 font-weight-bold text-primary">Edit galeri</h5>
    </div>
  </div>
  <div class="card-body">
    <form action="{{route('images.update', $image->slug)}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      @include('admin.images._form',[
        'submit' => 'Edit',
        'require' => 'kosongkan jika tidak ingin diganti'
      ])
    </form>
  </div>
</div>
@endsection

@section('script')
  @stack('script')
@endsection