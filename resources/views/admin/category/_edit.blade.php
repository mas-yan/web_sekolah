<!-- Modal -->
<div class="modal fade" id="editKategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="form">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="kategori">Kategori</label>
            <input type="hidden" id="old" value="{{old('old')}}" name="old">
            <input type="text" placeholder="Insert Kategori" class="form-control @error('category_edit') is-invalid @enderror" value="{{ old('category_edit') }}" id="edit-kategori" name="category_edit">
            @error('category_edit')
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
  @if ($errors->has('category_edit'))
  <script>
    $('#editKategori').modal('show')
    const url = `{{ route('categories.update', old("old")) }}`
    $('#form').attr('action', url);
    </script>
  @endif
  
  <script>
    function edit(e) {
      $('#editKategori').modal('show')
      $('#form').attr('action', e.dataset.url)
      $('#edit-kategori').val(e.dataset.value);
      $('#old').val(e.dataset.value);
    }
  </script>
@endpush