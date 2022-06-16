<input type="hidden" name="id" value="{{old('title', $information->id)}}">
<div class="form-group">
  <label for="title">Judul Informasi</label>
  <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{old('title', $information->title)}}" id="title" name="title" placeholder="Judul">
  @error('title')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>
<div class="form-group">
  <label for="description">Isi Informasi</label>
  <textarea class="form-control @error('description') is-invalid @enderror" id="summernote" name="description" rows="3">{{old('description', $information->description)}}</textarea>
  @error('description', $information->information)
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>
<button type="submit" class="btn btn-primary">{{$submit}}</button>

@push('script')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
  $(document).ready(function() {
    $('#summernote').summernote({
        placeholder: 'Masukkan Informasi'
      });
  });
</script>
@endpush