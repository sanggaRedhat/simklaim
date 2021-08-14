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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <style>
        .input-text {
            text-align: right;
        }

        .header-text {
            text-align: center;
        }

        .center {
            margin: auto;
            width: 50%;
            border: 3px solid green;
            padding: 10px;
        }

    </style>
@endpush
@push('script')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script>
        $('#table').DataTable({
            // scrollY: '50vh',
            scrollCollapse: true,
            paging: false,
            processing: true,
            serverSide: true,
            ajax: "{{ url('jsonresultjurnal') }}/01/"+"{{ Crypt::encrypt($header_dummy->id) }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'keterangan',
                    name: 'keterangan'
                },
                {
                    data: 'debet',
                    name: 'debet',
                    orderable: false,
                    searchable: false,
                    className: 'dt-body-right'
                },
                {
                    data: 'kredit',
                    name: 'kredit',
                    orderable: false,
                    searchable: false,
                    className: 'dt-body-right'
                },
            ]
        });
    </script>
    <script>
        function detail(code, id) {
            $('#detailmodal').modal('show')
            $('#table').DataTable().ajax.url("{{ url('jsonresultjurnal') }}/"+code+"/"+id).load();
        }
    </script>
    <script>
        $('#frmApprove').submit(function (e) { 
            e.preventDefault();
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000
            });
            var formdata = $('#frmApprove').serialize();
            $.ajax({
                type: "get",
                url: "{{ url('authorizeJournal') }}",
                data: formdata,
                dataType: "json",
                success: function (response) {
                    if (response.status) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Data Telah Disetujui'
                        });
                        window.open('{{ route("keuangan.authorize-m.index") }}','_self');
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: 'Anda Tidak Memiliki Hak Memberikan Persetujuan'
                        });
                    }
                },
            });
        });

        function alertsukses() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            Toast.fire({
                icon: 'success',
                title: 'Data berhasil dicatat!'
            });
        }
    </script>
    
@endpush
@section('page')
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h3 class="card-title">Header</h3>

                    <div class="card-tools">
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <input type="text" disabled class="form-control rounded-0 form-control-sm input-text"
                                    value="Nomor Jurnal">
                            </div>
                            <input type="text" name="keterangan" class="form-control rounded-0 form-control-sm" readonly
                                value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <input type="text" disabled class="form-control rounded-0 form-control-sm input-text"
                                    value="Inisial Jurnal">
                            </div>
                            <input type="text" name="keterangan" class="form-control rounded-0 form-control-sm"
                                value="{{ $header->nama }}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <input type="text" disabled class="form-control rounded-0 form-control-sm input-text"
                                    value="Keterangan">
                            </div>
                            <input type="text" name="keterangan" class="form-control rounded-0 form-control-sm"
                                value="{{ $header->keterangan }}" readonly>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Result Saldo</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th colspan="2">Kode Akun</th>
                                <th style="width: 150px">Saldo Transaksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($saldo as $item)
                                <tr>
                                    <td>{{ $no++ }}.</td>
                                    <td style="width: 20px"><a href="javascript:;"
                                            onclick="detail('{{ $item->code }}','{{ $id }}')">{{ $item->code }}</a>
                                    </td>
                                    <td>{{ $item->code_name }}</td>
                                    <td>Rp. {{ number_format($item->amount, 2, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Result Pada Rekening Koran</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Posisi</th>
                                <th>Total Saldo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Debet</td>
                                <td style="width: 150px">{{ number_format($saldodebetkredit->debet, 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td>Kredit</td>
                                <td style="width: 150px">{{ number_format($saldodebetkredit->kredit, 2, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-success shadow-sm">
                <!-- /.card-header -->
                <div class="card-body">
                    <form id="frmApprove">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-2">
                                <button class="btn btn-sm btn-warning btn-block">Kembalikan</button>
                            </div>
                            <input type="hidden" value="{{ $id }}" name="idheader">
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-sm btn-primary btn-block">Berikan Persetujuan</button>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>


    <div class="modal fade" id="detailmodal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog"
        aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"
                            class="fas fa-times"></span></button>
                </div>
                <div class="modal-body">
                    <table id="table" width="100%" class="table table-striped compact">
                        <thead>
                            <th>#</th>
                            <th>Keterangan</th>
                            <th>Debet</th>
                            <th>Kredit</th>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-primary btn-sm">Keluar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection
