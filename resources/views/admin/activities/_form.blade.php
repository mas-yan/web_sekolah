<input type="hidden" name="id" value="{{old('title', $activity->id)}}">
<div class="form-group">
  <label for="title">Judul Informasi</label>
  <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{old('title', $activity->title)}}" id="title" name="title" placeholder="Judul">
  @error('title')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>
<div class="form-group">
  <label for="date">Tanggal Kegiatan</label>
  <input type="date" class="form-control @error('date') is-invalid @enderror" value="{{old('date', $activity->date)}}" id="date" name="date" placeholder="Judul">
  @error('date')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>
<div class="form-group">
  <label for="description">Isi Informasi</label>
  <textarea class="form-control @error('description') is-invalid @enderror" id="summernote" name="description" rows="3">{{old('description', $activity->description)}}</textarea>
  @error('description', $activity->description)
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