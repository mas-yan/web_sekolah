<input type="hidden" name="id" value="{{old('title', $image->id)}}">
<div class="form-group">
  <label for="image">Gambar sampul {!! ( isset($require) ? '<span class="text-danger small font-italic">'.$require.'</span>' : '') !!}</label>
  <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
  @error('image')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>
<div class="form-group">
  <label for="images">Isi galeri</label>
  <input type="file" class="form-control @error('images') is-invalid @enderror" multiple id="images" name="images[]">
  @error('images')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>
<div class="form-group">
  <label for="title">Judul galeri</label>
  <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{old('title', $image->title)}}" id="title" name="title" placeholder="Judul">
  @error('title')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>
<div class="form-group">
  <label for="description">Deskripsi</label>
  <textarea class="form-control @error('description') is-invalid @enderror" id="summernote" name="description" rows="3">{{old('description', $image->description)}}</textarea>
  @error('description', $image->description)
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