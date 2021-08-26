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
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
    <style>
        .judul {
            margin-left: 20px;
        }

    </style>
@endpush
@push('script')
    <!-- date-range-picker -->
    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script>
        $('#reservation').daterangepicker()

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
            $('#table').DataTable({
                searching: false,
                paging: false,
                info: false
            });
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
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Rekapitulasi Mutasi Saldo Per Akun</h3>

                        <div class="card-tools">
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 350px;">
                        <table id="table" class="table table-striped table-bordered compact" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="2px">No</th>
                                    <th>Kode Akun</th>
                                    <th>Nama Akun</th>
                                    <th width="200px">Saldo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                    $judul = '';
                                    $subtotal = 0;
                                @endphp
                                @foreach ($saldo as $item)
                                    @if ($judul != $item->name)
                                        @if ($no != 1)
                                            <tr>
                                                <td align="center" colspan="3">Total</td>
                                                <td align="right" style="color: brown">
                                                    {{ number_format($subtotal, 2, '.', ',') }}
                                                </td>
                                            </tr>
                                            @php
                                                $subtotal = 0;
                                                $no = 1;
                                            @endphp
                                        @endif
                                        <tr>
                                            <td colspan="4">{{ $item->name }}</td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td align="center">{{ $item->code }}</td>
                                        <td>{{ $item->keterangan }}</td>
                                        <td align="right">{{ number_format($item->saldo, 2, '.', ',') }}</td>
                                    </tr>
                                    @php
                                        $subtotal += $item->saldo;
                                    @endphp
                                    @php
                                        $judul = $item->name;
                                    @endphp
                                @endforeach
                                <tr>
                                    <td align="center" colspan="3">Total</td>
                                    <td align="right" style="color: brown;">{{ number_format($subtotal, 2, '.', ',') }}
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@endsection
