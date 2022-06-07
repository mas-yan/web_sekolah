@extends('layouts.master')
@section('title', 'Tag')

@section('style')    
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="d-flex justify-content-between">
        <h5 class="m-0 font-weight-bold text-primary">Tag Post</h5>
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addTag">
          Add Tag
        </button>
      </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tag</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Tag</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                  @foreach ($tags as $tag)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$tag->tag}}</td>
                        <td>
                          <button class="btn btn-warning edit" onclick="edit(this)" data-url="{{ route('tags.destroy', $tag->tag) }}" data-value="{{$tag->tag}}"><i class="fas fa-edit"></i></button> | 
                          <button class="btn btn-danger"onclick="destroy(this)" id="{{$tag->tag}}" data-url="{{ route('tags.destroy', $tag->tag) }}" data-id="{{$tag->tag}}"><i class="fas fa-trash"></i></button>
                        </td>
                      </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('admin.tag._add')
@include('admin.tag._edit')

@endsection

@section('script')
  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <script>
      $('#dataTable').DataTable();

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