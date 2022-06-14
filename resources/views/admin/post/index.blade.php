@extends('layouts.master')
@section('title', 'Berita')

@section('style')    
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="d-flex justify-content-between">
        <h5 class="m-0 font-weight-bold text-primary">Berita</h5>
        <a href="{{route('posts.create')}}" class="btn btn-primary btn-sm">
          Tambah Berita
        </a>
      </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Tag</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('admin.category._add')
@include('admin.category._edit')

@endsection

@section('script')
  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url()->current() }}',
            columns: [
                { data: 'DT_RowIndex', name: 'id' },
                { data: 'image', name: 'image',searchable: false,orderable: false},
                { data: 'title', name: 'title' },
                { data: 'category_id', name: 'category_id',searchable: false,orderable: false},
                { data: 'tag_id', name: 'tag_id', searchable: false,orderable: false},
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
    @stack('script')
@endsection