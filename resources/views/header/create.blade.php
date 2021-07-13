@extends('layout.index')
@section('header')


    <h1 class="m-0"></h1>
@endsection
@push('css')
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush
@push('script')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tbl_list').DataTable({
                "aLengthMenu": [
                    [5, 10, 25, 50, 100, 200, -1],
                    [5, 10, 25, 50, 100, 200, "All"]
                ],
                paging: true,
                processing: true,
                serverSide: true,
                ajax: '{{ route('headerbytahun') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
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
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    {{-- <h3 class="card-title"></h3> --}}
                    <div class="left">
                        <a href="{{ route('transaksi.header.index') }}"
                            class="btn btn-sm btn-social bg-gradient-warning"><i class="fa fa-arrow-left"></i></a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('transaksi.header.store') }}" method="post">
                        <div class="form-group">
                            <input type="text" disabled class="form-control rounded-0" value="Nama">
                            <input type="text" name="nama" class="form-control rounded-0" value="">
                        </div>
                        <div class="form-group">
                            <input type="text" disabled class="form-control rounded-0" value="Keterangan">
                            <input type="text" name="keterangan" class="form-control rounded-0" value="">
                        </div>
                        @csrf
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </div>
                </form>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
