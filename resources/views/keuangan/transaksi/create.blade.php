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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="{{ asset('assets/chosen/chosen.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/selectize/css/selectize.bootstrap4.css') }}" />
    <style>
        .input-text {
            text-align: right;
        }

        .header-text {
            text-align: center;
        }

        .pad {
            padding: 12px;
        }

    </style>
@endpush
@push('script')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/autonumeric@4.5.4"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    <script type="text/javascript" src="{{ asset('assets/selectize/js/standalone/selectize.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/dist/jquery.loading.min.js') }}"></script>
    <script src="{{ asset('assets/chosen/chosen.jquery.js') }}"></script>
    <script>
        $('.datemask').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        })
    </script>

    <script>
        $(document).ready(function() {

            $('#tbl_list').DataTable({
                scrollY: '50vh',
                scrollCollapse: true,
                paging: false,
                processing: true,
                serverSide: true,
                ajax: "{{ url('jsontransaksi') }}/"+"{{ $id }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'tanggal',
                        name: 'tanggal'
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan'
                    },
                    {
                        data: 'code',
                        name: 'code',
                        orderable: false,
                        searchable: false,
                        className: 'dt-body-center'
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
                    {
                        data: 'edit',
                        name: 'edit',
                        orderable: false,
                        searchable: false,
                        className: 'dt-body-center'
                    },
                    {
                        data: 'delete',
                        name: 'delete',
                        orderable: false,
                        searchable: false,
                        className: 'dt-body-center'
                    },
                ]
            });

            const anElement = AutoNumeric.multiple('.nominal', {
                currencySymbol: 'Rp. ',
                digitGroupSeparator: ',',
                decimalCharacter: '.',
            });

            $('#editdebet').selectize({
                create: false,
                sortField: "text",
            });

            $('#editkredit').selectize({
                create: false,
                sortField: "text",
            });

            $("#myModal").on('shown.bs.modal', function() {
                $("#tanggal").focus();
            });

            $("#frm").submit(function(e) {
                e.preventDefault()
                var formdata = $('#frm').serialize();
                $.ajax({
                    type: "post",
                    url: "{{ route('keuangan.jurnal.store') }}",
                    data: formdata,
                    dataType: "json",
                    success: function(response) {
                        alertsukses();
                        $("#tanggal").focus();
                        $("#tanggal").val("");
                        $("#keterangan").val("");
                        // $("#debet").val("");
                        // $("#kredit").val("");
                        $("#nominal").val("");
                        $('#tbl_list').DataTable().ajax.reload();
                    }
                });
            });

            $("#frmedit").submit(function(e) {
                e.preventDefault()
                var formdata = $('#frmedit').serialize();
                var id = $('#idtransaksi').val();
                $.ajax({
                    type: "post",
                    url: "{{ url('keuangan/jurnal') }}/"+id,
                    data: formdata,
                    dataType: "json",
                    success: function(response) {
                        alertsukses();
                        $("#edittanggal").val("");
                        $("#editketerangan").val("");
                        $("#editnominal").val("");
                        $('#editModal').modal('hide');
                        $('#tbl_list').DataTable().ajax.reload();

                    }
                });
            });

            $('.select-tools').selectize({
                // maxItems: 1,
                valueField: "id",
                labelField: "label",
                searchField: "name",
                options: [],
                create: false,
                render: {
                    option: function(item, escape) {
                        return (
                            '<div class="pad">' +
                            '<span><strong>' + item.code + '</strong></span> <br>' +
                            '<span>' + item.name + '</span> ' +
                            '</div>'
                        );
                    },
                },
                load: function(query, callback) {
                    $.ajax({
                        url: "{{ url('getcodes') }}/" +
                            encodeURIComponent(query),
                        type: "GET",
                        error: function() {
                            callback();
                        },
                        success: function(response) {
                            callback(response);
                        },
                    });
                },
            });
        });

        function getcode(id) {
            $.confirm({
                title: 'Info Kode Akun',
                content: function() {
                    var self = this;
                    return $.ajax({
                        url: "{{ url('getcodeinfo') }}/" + id,
                        dataType: 'json',
                        method: 'get'
                    }).done(function(response) {
                        self.setContentAppend(
                            '<div>' + response.code + '</div>' +
                            '<div>' + response.keterangan + '</div>'
                        );
                    }).fail(function() {
                        self.setContentAppend('<div>Fail!</div>');
                    })
                },
                autoClose: 'ok|3000',
                buttons: {
                    ok: function() {

                    }
                },
            });
        }

        function edit(id) {
            var element = AutoNumeric.getAutoNumericElement('#editnominal')
            // var $select = $('#editdebet').selectize(); // This initializes the selectize control
            // var selectize = $select[0].selectize; // This stores the selectize object to a variable (with name 'selectize')

            $.ajax({
                type: "get",
                url: "{{ url('getdatatransaksi') }}/" + id,
                dataType: "json",
                success: function(response) {
                    $('#editketerangan').val(response.keterangan);
                    $('#edittanggal').val(response.tanggal);
                    $('#idtransaksi').val(response.id);
                    element.set(response.nominal);
                    // selectize.setValue(1);
                }
            });
            $('#editModal').modal('show');
        }

        function delet(id){
            $.confirm({
                title: 'Konfirmasi',
                content: 'Apakah Anda Yakin?',
                buttons: {
                    ya: function () {
                        $.ajax({
                            type: "delete",
                            url: "{{ url('keuangan/jurnal') }}/"+id,
                            dataType: "json",
                            data: {"_token":"{{ csrf_token() }}",},
                            success: function (response) {
                                $('#tbl_list').DataTable().ajax.reload();
                            }
                        });
                    },
                    tidak: function () {
                        
                    },
                }
            });
        }

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
    <div class="col-md-12">
        <div class="card card-default" id="page">
            <div class="card-header">
                {{-- <h3 class="card-title"></h3> --}}
                {{-- <div class="left"> --}}
                <a href="{{ route('keuangan.header.index') }}" class="btn btn-sm btn-social btn-default"><i
                        class="fa fa-arrow-left"></i></a>
                {{-- </div> --}}
                <div class="card-tools">
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Tambah</button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="tbl_list" class="table table-striped compact" cellspacing="0" width="100%">
                    <thead>
                        <th width="2px">No.</th>
                        <th width="80px">Tanggal</th>
                        <th>Keterangan</th>
                        <th width="80px">Kode Akun</th>
                        <th width="150px">Debet</th>
                        <th width="150px">Kredit</th>
                        <th width="10px"></th>
                        <th width="10px"></th>
                    </thead>
                </table>
            </div>
            <div class="card-footer">
                <form action="{{ route('keuangan.statustransaksi.update',['statustransaksi'=>$id]) }}" method="post">
                    @csrf
                    @method('put')
                    <button type="submit" class="btn btn-success btn-sm float-right">Rilis Data</button>
                </form>
            </div>
            </form>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div id="popover_html" style="display:none;">
        <p><label>Name :</label>p_name</p>
        <p><label>Address : </label>p_address</p>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog"
        aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"
                            class="fas fa-times"></span></button>
                </div>
                <div class="modal-body">
                    <form id="frm">
                        <div class="form-group">
                            <input type="text" disabled class="form-control header-text" value="FORM JURNAL TRANSAKSI">
                        </div>
                        @csrf
                        <input type="hidden" name="id" value="{{ $id }}">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <input type="text" disabled class="form-control input-text" value="Tanggal">
                                </div>
                                <input type="text" class="form-control datemask" data-inputmask-alias="datetime"
                                     data-inputmask-inputformat="dd/mm/yyyy"
                                    id="tanggal" name="tanggal" data-mask="" autocomplete="off" inputmode="numeric">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <input type="text" disabled class="form-control input-text" value="Keterangan">
                                </div>
                                <input type="text" class="form-control" id="keterangan" name="keterangan">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <input type="text" disabled class="form-control input-text" value="Nominal">
                                </div>
                                <input type="text" class="form-control nominal" autocomplete="off" id="nominal" name="nominal">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <input type="text" disabled class="form-control input-text" value="Debet">
                                </div>
                                <select class="form-control select-tools rounded-0" id="debet" name="debet"
                                    placeholder=""></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <input type="text" disabled class="form-control input-text" value="Kredit">
                                </div>
                                <select class="form-control select-tools rounded-0" id="kredit" name="kredit"
                                    placeholder=""></select>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Catat</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog"
        aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"
                            class="fas fa-times"></span></button>
                </div>
                <div class="modal-body">
                    <form id="frmedit">
                        <div class="form-group">
                            <input type="text" disabled class="form-control header-text" value="FORM JURNAL TRANSAKSI">
                        </div>
                        @csrf
                        @method('put')
                        <input type="hidden" id="idtransaksi" name="id" value="{{ $id }}">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <input type="text" disabled class="form-control input-text" value="Tanggal">
                                </div>
                                <input type="text" class="form-control datemask" data-inputmask-alias="datetime"
                                    placeholder="{{ date('d/m/Y') }}" data-inputmask-inputformat="dd/mm/yyyy"
                                    id="edittanggal" name="tanggal" data-mask="" inputmode="numeric">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <input type="text" disabled class="form-control input-text" value="Keterangan">
                                </div>
                                <input type="text" class="form-control" id="editketerangan" name="keterangan">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <input type="text" disabled class="form-control input-text" value="Nominal">
                                </div>
                                <input type="text" class="form-control nominal" id="editnominal" name="nominal">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <input type="text" disabled class="form-control input-text" value="Debet">
                                </div>
                                <select class="form-control rounded-0" id="editdebet" name="debet"
                                    placeholder="">
                                    {{-- <option value="{{  }}"></option> --}}
                                    @foreach ($codes as $item)
                                        <option value="{{ $item->id }}">{{ $item->code." - ". $item->keterangan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <input type="text" disabled class="form-control input-text" value="Kredit">
                                </div>
                                <select class="form-control rounded-0" id="editkredit" name="kredit"
                                    placeholder="">
                                    @foreach ($codes as $item)
                                        <option value="{{ $item->id }}">{{ $item->code." - ". $item->keterangan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Catat</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
