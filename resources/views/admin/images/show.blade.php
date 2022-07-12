@extends('layouts.master')
@section('title', 'Galari Gambar')

@section('style')    
<!-- Custom styles for this page -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" integrity="sha512-Velp0ebMKjcd9RiCoaHhLXkR1sFoCCWXNp6w4zj1hfMifYB5441C+sKeBl/T/Ka6NjBiRfBBQRaQq65ekYz3UQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
  .callout {
  /* padding: 20px; */
  /* margin: 20px 0; */
  border: 1px solid #eee;
  border-left-width: 5px;
  border-radius: 3px;
  h4 {
    margin-top: 0;
    margin-bottom: 15px;
  }
  p:last-child {
    margin-bottom: 0;
  }
  code {
    border-radius: 3px;
  }
  & + .bs-callout {
    margin-top: -5px;
  }
}
.callout-primary {
    border-left-color: #428bca;
    h4 {
      color: #428bca;
    }
  }
</style>
@endsection
    
@section('content')
<div class="mb-3 card callout callout-primary">
  <div class="card-body">
    <div class="row">
      <div class="col-2">
        <a href="{{$image->image}}" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
          <img src="{{$image->image}}" class="img-fluid rounded" style="width: 150px; ">
        </a>
      </div>
      <div class="col-8">
        <h4>{{$image->title}}</h4>
        {!!$image->description!!}
      </div>
    </div>
  </div>
</div>

<div class="card shadow">
  <div class="card-body">
    <div class="row">
      <div class="col">
        <div class="row">
          @foreach ($image->galery as $item)
          <a href="{{$item->image}}" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-3">
          <div class="card mb-3">
            <div class="card-body">
              <img src="{{$item->image}}" class="img-fluid">
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

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js" integrity="sha512-Y2IiVZeaBwXG1wSV7f13plqlmFOx8MdjuHyYFVoYzhyRr3nH/NMDjTBSswijzADdNzMyWNetbLMfOpIPl6Cv9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
</script>
@endsection