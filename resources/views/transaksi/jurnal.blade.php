@extends('layout.index')
@section('header')


    <h1 class="m-0"></h1>
@endsection
@push('css')
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@endpush
@push('script')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script
        src="https://cdn.rawgit.com/ashl1/datatables-rowsgroup/fbd569b8768155c7a9a62568e66a64115887d7d0/dataTables.rowsGroup.js">
    </script>
    <script>
        function hapus(header) {
            $.confirm({
                title: 'Konfirmasi!',
                content: 'Apakah Anda Yakin?',
                buttons: {
                    ya: function() {
                        $.ajax({
                            type: "delete",
                            url: header,
                            data: {
                                '_token': "{{ csrf_token() }}"
                            },
                            dataType: "JSON",
                            success: function(response) {
                                $('#tbl_list').DataTable().ajax.reload();
                                cek(response.id);
                            }
                        });
                    },
                    batal: function() {

                    },
                }
            });

        };

        function cek(header) {
            $.ajax({
                type: "get",
                url: "{{ url('ceksaldo') }}/" + header,
                dataType: "json",
                success: function(response) {
                    var table = $('#tbl_list').DataTable();
                    var debet = table.column(4);
                    var kredit = table.column(5);
                    var saldo = table.column(6);

                    $(debet.footer()).html(
                        debet.data().reduce(function() {
                            return response.debet;
                        })
                    );
                    $(kredit.footer()).html(
                        kredit.data().reduce(function() {
                            return response.kredit;
                        })
                    );
                    $(saldo.footer()).html(
                        saldo.data().reduce(function() {
                            return response.saldo;
                        })
                    );
                }
            });
        }

        function te() {
            // $('#kk').text('ooo');
            // alert('tes');
            // tr = '<tr>';
            // tr += '<th> ss </th>';
            // tr += '</tr>';
            // $('#tblfoot').append(tr);
            var table = $('#tbl_list').DataTable();
            var column = table.column(6);

            $(column.footer()).html(
                column.data().reduce(function() {
                    return 2;
                })
            );
        }

    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tbl_list').DataTable({
                scrollY: '50vh',
                scrollCollapse: true,
                paging: false,
                processing: true,
                serverSide: true,
                ajax: "{{ route('jurnal', ['header' => $id]) }}",
                rowsGroup: [
                    // [0],
                    [2],
                    [1],
                    [6],
                    [7]
                ],
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        className: 'dt-body-center'
                    },
                    {
                        data: 'tanggal',
                        name: 'tanggal',
                        className: 'dt-body-center'
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan'
                    },
                    {
                        data: 'code',
                        name: 'code',
                        className: 'dt-body-center'
                    },
                    {
                        data: 'debet',
                        name: 'debet',
                        className: 'dt-body-right'
                    },
                    {
                        data: 'kredit',
                        name: 'kredit',
                        className: 'dt-body-right'
                    },
                    {
                        data: 'pilih',
                        name: 'pilih',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'hapus',
                        name: 'hapus',
                        orderable: false,
                        searchable: false
                    },
                ],
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
                    <div class="card-tools">
                        <a href="{{ route('addmore', ['header' => Crypt::encrypt($id)]) }}"
                            class="btn btn-sm btn-social bg-gradient-success"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="tbl_list" class="table table-striped table-bordered compact" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="2px">No</th>
                                <th width="100px">Tanggal</th>
                                <th>Keterangan</th>
                                <th width="100px">Kode Akun</th>
                                <th width="100px">Debet</th>
                                <th width="100px">Kredit</th>
                                <th width="10px">Pilih</th>
                                <th width="10px">Hapus</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="2px" colspan="4"></th>
                                <th width="100px" style="text-align:right">{{ number_format($totaldebet, '2', '.', ',') }}
                                </th>
                                <th width="100px" style="text-align:right">
                                    {{ number_format($totalkredit, '2', '.', ',') }}
                                </th>
                                <th colspan="2" style="text-align:right">
                                    {{ number_format($totaldebet - $totalkredit, '2', '.', ',') }}
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-muted text-right">
                    {{-- <span id="jj"></span> --}}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
