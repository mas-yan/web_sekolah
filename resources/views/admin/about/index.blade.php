@extends('layouts.master')
@section('title', 'Kategori')

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
        <a href="{{route('abouts.edit', $about->id)}}" class="btn btn-warning btn-sm">
            Edit Informasi Sekolah
        </a>
      </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                <tbody>
                    <tr>
                        <td width="50%">Logo</td>
                        <td width="50%">
                            <img src="{{$about->logo}}" alt="image" width="50px">
                        </td>
                    </tr>
                    <tr>
                        <td width="50%">Nama Sekolah</td>
                        <td width="50%">{{$about->name}}</td>
                    </tr>
                    <tr>
                        <td width="50%">Moto Sekolah</td>
                        <td width="50%">{{$about->moto}}</td>
                    </tr>
                    <tr>
                        <td width="50%">No.telp</td>
                        <td width="50%">{{$about->telp}}</td>
                    </tr>
                    <tr>
                        <td width="50%">email</td>
                        <td width="50%">{{$about->email}}</td>
                    </tr>
                    <tr>
                        <td width="50%">address</td>
                        <td width="50%">{{$about->address}}</td>
                    </tr>
                    <tr>
                        <td width="50%">facebook</td>
                        <td width="50%">{{$about->facebook}}</td>
                    </tr>
                    <tr>
                        <td width="50%">instagram</td>
                        <td width="50%">{{$about->instagram}}</td>
                    </tr>
                    <tr>
                        <td width="50%">twitter</td>
                        <td width="50%">{{$about->twitter}}</td>
                    </tr>
                    <tr>
                        <td width="50%">youtube</td>
                        <td width="50%">{{$about->youtube}}</td>
                    </tr>
                    <tr>
                        <td width="50%">about</td>
                        <td width="50%">{{$about->about}}</td>
                    </tr>
                    <tr>
                        <td width="50%">full_address</td>
                        <td width="50%">{{$about->full_address}}</td>
                    </tr>
                    <tr>
                        <td width="50%">visi</td>
                        <td width="50%">{{$about->visi}}</td>
                    </tr>
                    <tr>
                        <td width="50%">misi</td>
                        <td width="50%">{{$about->misi}}</td>
                    </tr>
                    <tr>
                        <td width="50%">map</td>
                        <td width="50%">{{$about->map}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection