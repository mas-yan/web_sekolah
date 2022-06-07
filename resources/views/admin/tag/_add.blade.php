<!-- Modal -->
<div class="modal fade" id="addTag" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Tag</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('tags.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="tag">Tag</label>
            <input type="text" placeholder="Insert Tag" class="form-control @error('tag') is-invalid @enderror" value="{{ old('tag') }}" id="tag" name="tag">
            @error('tag')
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
  @if ($errors->has('tag'))
  <script>
    console.log('open');
    $('#addTag').modal('show')
  </script>
  @endif
@endpush