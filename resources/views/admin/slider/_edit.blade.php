<!-- Modal -->
<div class="modal fade" id="editSlider" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Slider</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="form" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="image">image</label>
            <input type="hidden" id="old" value="{{old('old')}}" name="old">
            <input type="file" placeholder="Insert image" class="form-control @error('image_edit') is-invalid @enderror" value="{{ old('image_edit') }}" id="edit-image" name="image_edit">
            @error('image_edit')
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
  @if ($errors->has('image_edit'))
  <script>
    $('#editSlider').modal('show')
    const url = `{{ route('categories.update', old("old")) }}`
    $('#form').attr('action', url);
    </script>
  @endif
  
  <script>
    function edit(e) {
      $('#editSlider').modal('show')
      $('#form').attr('action', e.dataset.url)
      $('#edit-Slider').val(e.dataset.value);
      $('#old').val(e.dataset.value);
    }
  </script>
@endpush