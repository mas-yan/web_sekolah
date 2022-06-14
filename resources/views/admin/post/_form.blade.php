<input type="hidden" name="id" value="{{old('title', $post->id)}}">
<div class="form-group">
  <label for="title">Judul</label>
  <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{old('title', $post->title)}}" id="title" name="title" placeholder="Judul">
  @error('title')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>
<div class="form-group">
  <label for="category">Kategori</label>
  <select class="form-control select @error('category') is-invalid @enderror" id="category" name="category">
    <option value="" disabled selected>-- PILIH KATEGORI --</option>
    @foreach($categories as $category)
      <option value="{{$category->id}}" {{ $category->id == old('category', $post->category_id) ? 'selected' : '' }}>{{$category->category}}</option>
    @endforeach
  </select>
  @error('category')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>
<div class="form-group">
  <label for="tag">Tag</label>
  <select class="form-control @error('tag') is-invalid @enderror selects" multiple id="tag" name="tag[]">
    @foreach($tags as $tag)
      <option value="{{$tag->id}}" 
        @if (old('tag'))
        @foreach (old('tag') as $old)
          {{ $old == $tag->id ? 'selected' : '' }}
        @endforeach
      @elseif($post->tags)
        @foreach ($post->tags as $item)
          {{ $item->id == $tag->id ? 'selected' : '' }}
        @endforeach
      @endif
        >{{$tag->tag}}</option>
    @endforeach
  </select>
  @error('tag')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>
<div class="form-group">
  <label for="image">Gambar</label>
  <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
  @error('image')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>
<div class="form-group">
  <label for="description">Deskripsi</label>
  <textarea class="form-control @error('description') is-invalid @enderror" placeholder="deskripsi berita" id="description" name="description" rows="3">{{old('description', $post->description)}}</textarea>
  @error('description')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>
<div class="form-group">
  <label for="article">Konten</label>
  <textarea class="form-control @error('article') is-invalid @enderror" id="summernote" name="article" rows="3">{{old('article', $post->article)}}</textarea>
  @error('article', $post->article)
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>
<button type="submit" class="btn btn-primary">{{$submit}}</button>

@push('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
  $(document).ready(function() {
    $('#summernote').summernote({
        placeholder: 'Masukkan Artikel Berita'
      });
      $('.selects').select2({
          placeholder: 'Pilih Tag'
      });
      $('.select').select2({
          placeholder: 'Choose Kategori'
      });
  });
</script>
@endpush