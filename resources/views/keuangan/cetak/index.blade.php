@extends('layouts.index')
@section('header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
@push('css')
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush
@push('script')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script>
        function hapus(header) {
            $.ajax({
                type: "delete",
                url: header,
                data: {
                    '_token': "{{ csrf_token() }}"
                },
                dataType: "JSON",
                success: function(response) {
                    $('#tbl_list').DataTable().ajax.reload();
                }
            });
        };
    </script>
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
                ajax: "{{ url('keuangan/headerreleased') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan'
                    },
                    {
                        data: 'pilih',
                        name: 'pilih',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });
    </script>

@endpush
@section('page')
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-header">
                {{-- <h3 class="card-title"></h3> --}}
                <div style="height: 20px" class="card-tools">

                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="tbl_list" class="table table-striped table-bordered compact" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="2px">No</th>
                            <th>Nama</th>
                            <th>Keterangan</th>
                            <th width="10px">Pilih</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
