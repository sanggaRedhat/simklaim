@extends('layouts.index')
@push('css')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush
@push('script')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tbl_list').DataTable({
            "aLengthMenu": [
                [10, 25, 50, 100, 200, -1],
                [10, 25, 50, 100, 200, "All"]
            ],
            paging: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.jsonUserAll') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'edit',
                    name: 'edit',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'setrole',
                    name: 'setrole',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'reset',
                    name: 'reset',
                    orderable: false,
                    searchable: false
                },
            ]
        });
    });
</script>
@endpush
@section('header')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Administrator Page</h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
@endsection
@section('page')
<div class="col-12">
  <!-- Default box -->
  <div class="card card-solid card-success">
    <div class="card-header">
      <h3 class="card-title">List User </h3>

      <div class="card-tools">
        <a href="{{ route('admin.user.create') }}" class="btn btn-sm bg-primary">Tambah User</a>
      </div>
    </div>
    <div class="card-body">
      <table id="tbl_list" class="table table-striped table-bordered compact" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th width="2px">No</th>
                <th>Nama</th>
                <th>Email</th>
                <th width="10px">Edit</th>
                <th width="70px">Set Role</th>
                <th width="150px">Change Password</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      
    </div>
    <!-- /.card-footer-->
  </div>
  <!-- /.card -->
</div>
@endsection
