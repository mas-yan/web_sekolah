<!-- Modal -->
<div class="modal fade" id="addKategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('categories.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="kategori">Kategori</label>
            <input type="text" placeholder="Insert Kategori" class="form-control @error('category') is-invalid @enderror" value="{{ old('kategori') }}" id="kategori" name="category">
            @error('category')
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
  @if ($errors->has('category'))
  <script>
    $('#addKategori').modal('show')
  </script>
  @endif
@endpush