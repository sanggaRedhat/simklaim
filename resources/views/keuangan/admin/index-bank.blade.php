@extends('layouts.index')
@section('header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Keuangan</h1>
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
    <script type="text/javascript">
        $('#frm').submit(function(e) {
            e.preventDefault();
            var formdata = $('#frm').serialize();
            $.ajax({
                type: "post",
                url: "{{ route('keuangan.admin-bank.store') }}",
                data: formdata,
                dataType: "json",
                success: function(response) {
                    if (response.status) {
                        $('#nama').val("");
                        $('#alamat').val("");
                    }
                    $('#tbl_list').DataTable().ajax.reload();
                }
            });
        });
        $(document).ready(function() {
            $('#tbl_list').DataTable({
                paging: false,
                info: false,
                processing: true,
                serverSide: true,
                ajax: "{{ route('keuangan.jsonallbank') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'code',
                        name: 'code'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                ]
            });
        });
    </script>

@endpush
@section('page')
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Form Tambah Kode Akun</h3>
                        <div class="card-tools">
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form id="frm">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <input type="text" disabled
                                            class="form-control rounded-0 form-control-sm input-text" value="Nama Bank">
                                    </div>
                                    <input type="text" name="nama" id="nama" class="form-control rounded-0 form-control-sm"
                                        value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <input type="text" disabled
                                            class="form-control rounded-0 form-control-sm input-text" value="Alamat Bank">
                                    </div>
                                    <input type="text" name="alamat" id="alamat"
                                        class="form-control rounded-0 form-control-sm" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <input type="text" disabled
                                            class="form-control rounded-0 form-control-sm input-text" value="Kode Akun">
                                    </div>
                                    <select name="code" class="form-control form-control-sm rounded-0" id="code">
                                        @foreach ($code as $item)
                                            <option value="{{ $item->id }}">{{ $item->keterangan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @csrf
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn bg-primary btn-sm float-right">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Kode Akun</h3>
                        <div class="card-tools">
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tbl_list" class="table table-striped table-bordered compact" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th width="2px">No</th>
                                    <th align="center" width="90px">Kode Akun</th>
                                    <th>Keterangan</th>
                                    <th align="center">Alamat</th>
                                    {{-- <th width="100px">Status</th> --}}
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>

        <!-- /.card -->
    </div>
@endsection
