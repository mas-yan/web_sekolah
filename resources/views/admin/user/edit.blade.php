@extends('layouts.master')
@section('title', 'User')

@section('content')

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="d-flex justify-content-between">
      <h5 class="m-0 font-weight-bold text-primary">edit User</h5>
    </div>
  </div>
  <div class="card-body">
    <form action="{{route('users.update', $user->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('put')
      <div class="form-group">
        <label for="name">Nama</label>
        <input type="text" name="name" value="{{old('name',$user->name)}}" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama">
        @error('name') 
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" value="{{old('email', $user->email)}}" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email">
        @error('email') 
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="password">Password</label> <small class="text-danger"><i>*Kosongnkan jika tidak ingin diganti</i></small>
        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password">
        @error('password') 
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="password_confirmation">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Masukkan Konfirmasi Password">
      </div>
      <button class="btn btn-primary">edit User</button>
    </form>
  </div>
</div>
@endsection