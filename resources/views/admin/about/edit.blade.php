@extends('layouts.master')
@section('title', 'Tentang Sekolah')

@section('style')    
    <!-- Custom styles for this page -->
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content')


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="d-flex justify-content-between">
        <h5 class="m-0 font-weight-bold text-primary">Tentang Sekolah</h5>
      </div>
    </div>
    <div class="card-body">
        <form action="{{route('abouts.update',$about->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="logo">Logo Sekolah</label> <small class="text-danger"><i>*kosongkan jika tidak diganti</i></small>
                        <input type="file" name="image" id="logo" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Sekolah</label>
                        <input type="text" name="name" id="name" value="{{old('name',$about->name)}}" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Sekolah">
                        @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="moto">Moto Sekolah</label>
                        <input type="text" name="moto" id="moto" value="{{old('moto',$about->moto)}}" class="form-control @error('moto') is-invalid @enderror" placeholder="Moto Sekolah">
                        @error('moto')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="telp">No.telp Sekolah</label>
                        <input type="text" name="telp" id="telp" value="{{old('telp',$about->telp)}}" class="form-control @error('telp') is-invalid @enderror" placeholder="No.telp Sekolah">
                        @error('telp')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email Sekolah</label>
                        <input type="email" name="email" id="email" value="{{old('email',$about->email)}}" class="form-control @error('email') is-invalid @enderror" placeholder="Email Sekolah">
                        @error('email')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat Sekolah</label>
                        <input type="text" name="address" id="address" value="{{old('address',$about->address)}}" class="form-control @error('address') is-invalid @enderror" placeholder="Alamat Sekolah">
                        @error('address')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="about">Tentang Sekolah</label>
                        <textarea name="about" id="about" class="form-control @error('about') is-invalid @enderror" placeholder="about Sekolah" rows="10">{{old('about',$about->about)}}</textarea>
                        @error('about')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="full_address">Alamat Lengkap Sekolah</label>
                        <input type="text" name="full_address" id="full_address" value="{{old('full_address', $about->full_address)}}" class="form-control @error('full_address') is-invalid @enderror" placeholder="Alamat Lengkap Sekolah">
                        @error('full_address')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="instagram">Link Facbook Sekolah</label>
                                <input type="text" name="facebook" id="facebook" value="{{old('facebook', $about->facebook)}}" class="form-control @error('facebook') is-invalid @enderror" placeholder="Link Facbook Sekolah">
                                @error('facebook')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="instagram">Link Instagram Sekolah</label>
                                <input type="text" name="instagram" id="instagram" value="{{old('instagram', $about->instagram)}}" class="form-control @error('instagram') is-invalid @enderror" placeholder="Link Instagram Sekolah">
                                @error('instagram')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="twitter">Link Twitter Sekolah</label>
                                <input type="text" name="twitter" id="twitter" value="{{old('twitter', $about->twitter)}}" class="form-control @error('twitter') is-invalid @enderror" placeholder="Link Twitter Sekolah">
                                @error('twitter')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="youtube">Link Youtube Sekolah</label>
                                <input type="text" name="youtube" id="youtube" value="{{old('youtube', $about->youtube)}}" class="form-control @error('youtube') is-invalid @enderror" placeholder="Link Youtube Sekolah">
                                @error('youtube')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="visi">Visi Sekolah</label>
                                <textarea name="visi" id="visi" class="form-control @error('visi') is-invalid @enderror" placeholder="visi Sekolah" rows="8">{{old('visi', $about->visi)}}</textarea>
                                @error('visi')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="misi">Misi Sekolah</label>
                                <textarea name="misi" id="misi" class="form-control @error('misi') is-invalid @enderror" placeholder="misi Sekolah" rows="8">{{old('misi',$about->misi)}}</textarea>
                                @error('misi')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="map">Maps Sekolah</label> 
                        <ul class="text-danger">
                            <li>pilih maps pada google maps</li>
                            <li>klik bagikan pada sidebar kiri</li>
                            <li>pilih pada tabs sematkan peta</li>
                            <li>salin html</li>
                        </ul>
                        <textarea name="map" id="map" class="form-control @error('map') is-invalid @enderror" placeholder="map Sekolah" rows="5">{{old('map',$about->map)}}</textarea>
                        @error('map')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <button class="btn btn-warning">Edit</button>
        </form>
    </div>
</div>
@endsection