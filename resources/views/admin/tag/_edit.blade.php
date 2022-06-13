<!-- Modal -->
<div class="modal fade" id="editTag" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Tag</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="form">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="tag">Tag</label>
            <input type="hidden" id="old" value="{{old('old')}}" name="old">
            <input type="text" placeholder="Insert Tag" class="form-control @error('tag_edit') is-invalid @enderror" value="{{ old('tag_edit') }}" id="edit-tag" name="tag_edit">
            @error('tag_edit')
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
  @if ($errors->has('tag_edit'))
  <script>
    $('#editTag').modal('show')
    const url = `{{ route('tags.update', old("old")) }}`
    $('#form').attr('action', url);
    </script>
  @endif
  
  <script>
    function edit(e) {
      console.log(e);
      $('#editTag').modal('show')
      $('#form').attr('action', e.dataset.url)
      $('#edit-tag').val(e.dataset.value);
      $('#old').val(e.dataset.value);
    }
  </script>
@endpush