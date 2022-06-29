@extends('layouts.master')
@section('title', 'Galari Gambar')

@section('style')    
    <!-- Custom styles for this page -->
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="d-flex justify-content-between">
        <h5 class="m-0 font-weight-bold text-primary">Galari Gambar</h5>
        <a href="{{route('images.create')}}" class="btn btn-primary btn-sm">
          Tambah Galari Gambar
        </a>
      </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>gambar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
  <!-- Page level plugins -->
  <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url()->current() }}',
            columns: [
                { data: 'DT_RowIndex', name: 'id' },
                { data: 'title', name: 'title' },
                { data: 'image', name: 'image', searchable: false,orderable: false},
                { data: 'action', name: 'action', searchable: false, orderable: false},
            ]
        });
    });

    function destroy(e) {
      Notiflix.Confirm.show(
        'Hapus Data Ini',
        'apakah anda yakin?',
        'Yes',
        'No',

        function okCb() {
          const token = $("meta[name='csrf-token']").attr("content");
          let url = e.dataset.url;

          $.ajax({
                url: url,
                data:{
                    "id": e.dataset.id,
                    "_token": token
                },
                type: 'Delete',
                complete: function resp(response) {
                    if (response.status == 200) {
                      Notiflix.Report.success(
                          'success',
                          'Berhasil Dihapus',
                          'Okay',
                          () => {
                              location.reload();
                          },
                      )
                    }else{
                      Notiflix.Report.failure(
                          'Error',
                          'Gagal Dihapus',
                          'Okay',
                      );
                    }
                }
          })
        }
      );
    }

    </script>
@endsection