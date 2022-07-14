<!-- Modal -->
<div class="modal fade" id="addSlider" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Slider</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="image">image</label>
            <input type="file" placeholder="Insert image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}" id="image" name="image">
            @error('image')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

@push('script')
  @if ($errors->has('image'))
  <script>
    $('#addSlider').modal('show')
  </script>
  @endif
@endpush