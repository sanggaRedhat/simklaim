@extends('layout.index')
@section('header')


    <h1 class="m-0"></h1>
@endsection
@push('css')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/selectize/css/selectize.bootstrap4.css') }}" />
    <style>
        .selectize-control {
            min-width: 300px;
        }

        .selectize-dropdown {
            width: 600px !important;
            left: -500px !important;
        }

        .pad {
            padding: 12px
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
    <script type="text/javascript" src="{{ asset('assets/selectize/js/standalone/selectize.min.js') }}">
    </script>
    <script>
        $('.datemask').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        })

        $(".sel").selectize({
            valueField: "id",
            labelField: "code",
            searchField: "name",
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
                if (!query.length) return callback();
                $.ajax({
                    url: "{{ url('getcodes') }}/" +
                        encodeURIComponent(query),
                    type: "GET",
                    error: function() {
                        callback();
                    },
                    success: function(response) {
                        // callback(res.repositories.slice(0, 10));
                        // console.log(response);
                        // $select.options = response;
                        callback(response);
                    },
                });
            },
        });

        function draft() {
            var formdata = $('#frm').serialize();
            $.ajax({
                type: "post",
                url: "{{ route('draftjurnal', ['do' => 'draft']) }}",
                data: formdata,
                dataType: "json",
                success: function(response) {
                    window.open('{{ url('transaksi/jurnal') }}/' + response.header, '_self');
                }
            });
        }

    </script>

    <script>
        $(document).ready(function() {

            const anElement = AutoNumeric.multiple('.nominal', {
                currencySymbol: 'Rp. ',
                digitGroupSeparator: ',',
                decimalCharacter: '.',
            });

            jQuery('.hover').popover({
                title: popoverContent,
                html: true,
                placement: 'right',
                trigger: 'hover'
            });



            function popoverContent() {
                var content = '';
                var element = $(this);
                var id = element.attr("id");
                // var x = document.getElementsByClassName(id);
                $.ajax({
                    url: "{{ url('test') }}/" + $('.' + id).val(),
                    method: "get",
                    async: false,
                    dataType: "JSON",
                    success: function(data) {
                        content = $("#popover_html").html();
                        // content = content.replace(/p_image/g, data.image);
                        content = content.replace(/p_name/g, data.code);
                        content = content.replace(/p_address/g, data.keterangan);
                    }
                });
                return content;
            }

            $('.debet').keypress(function(e) {
                if (e.keyCode == 49) {
                    var i = e.target.id;
                    var a = $.dialog({
                        title: 'List Akun',
                        boxWidth: '80%',
                        useBootstrap: false,
                        content: "url:{{ url('loadcode') }}",
                        onContentReady: function() {
                            var self = this;
                            this.$content.find('.btn').click(function() {
                                var inp = $('.in').val();
                                var idinp = $('.idin').val();
                                $('#' + i).val(inp);
                                $('#' + i + '-id').val(idinp);
                                a.close();
                            });
                        },
                        animation: 'scale',
                        columnClass: 'medium',
                        closeAnimation: 'scale',
                        backgroundDismiss: true,
                    });
                }
            });

            $('.kredit').keypress(function(e) {
                if (e.keyCode == 49) {
                    var i = e.target.id;
                    var a = $.dialog({
                        boxWidth: '80%',
                        useBootstrap: false,
                        title: 'List Akun',
                        content: "url:{{ url('loadcode') }}",
                        onContentReady: function() {
                            var self = this;
                            this.$content.find('.bn').click(function() {
                                var inp = $('.in').val();
                                var idinp = $('.idin').val();
                                $('#' + i).val(inp);
                                $('#' + i + '-id').val(idinp);
                                a.close();
                            });
                        },
                        animation: 'scale',
                        columnClass: 'medium',
                        closeAnimation: 'scale',
                        backgroundDismiss: true
                    });
                }
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
                <div class="card-body" style="height: 600px; overflow-y: scroll;">
                    <form id="frm" action="{{ route('transaksi.header.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $id }}">
                        <div class="form-group">
                            <table width="100%">
                                <tr>
                                    <td width="70px">
                                        <input type="text" disabled class="form-control rounded-0" value="No.">
                                    </td>
                                    <td>
                                        <input type="text" disabled class="form-control rounded-0" value="Tanggal">
                                    </td>
                                    <td width="40%">
                                        <input type="text" disabled class="form-control rounded-0" value="Keterangan">
                                    </td>
                                    <td>
                                        <input type="text" disabled class="form-control rounded-0" value="Nominal">
                                    </td>
                                    <td>
                                        <input type="text" disabled class="form-control rounded-0" value="Debet">
                                    </td>
                                    <td>
                                        <input type="text" disabled class="form-control rounded-0" value="Kredit">

                                    </td>
                                </tr>
                                @for ($i = 0; $i < 300; $i++)
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control rounded-0" disabled
                                                placeholder="{{ $i + 1 }}." name="nom">
                                        </td>
                                        <td>
                                            {{-- <input type="text" disabled class="form-control rounded-0" value="Tanggal"> --}}
                                            <input type="text" class="form-control datemask rounded-0"
                                                data-inputmask-alias="datetime" placeholder="Tanggal"
                                                data-inputmask-inputformat="dd/mm/yyyy" name="tanggal[]" data-mask=""
                                                inputmode="numeric">
                                        </td>
                                        <td width="40%">
                                            {{-- <input type="text" disabled class="form-control rounded-0" value="Keterangan"> --}}
                                            <input type="text" name="keterangan[]" placeholder="Keterangan"
                                                class="form-control rounded-0" value="">
                                        </td>
                                        <td>
                                            {{-- <input type="text" disabled class="form-control rounded-0" value="Nominal"> --}}
                                            <input type="text" name="nominal[]" placeholder="Nominal"
                                                class="form-control rounded-0 nominal" value="">
                                        </td>
                                        <td>
                                            {{-- <input type="text" disabled class="form-control rounded-0" value="Debet"> --}}
                                            <div class="input-group">
                                                {{-- <input type="text"
                                                    class="form-control rounded-0 debet deb-{{ $i }}"
                                                    id="db-{{ $i }}" name="debet_{{ $i }}"
                                                    placeholder="Debet" readonly> --}}
                                                <select name="debet[]" id="deb-{{ $i }}"
                                                    class="form-control rounded-0 sel deb-{{ $i }}">
                                                </select>
                                                <span class="input-group-append">
                                                    <a class="btn btn-default btn-flat hover"
                                                        id="deb-{{ $i }}"><i class="fa fa-info-circle"></i></a>
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            {{-- <input type="text" disabled class="form-control rounded-0" value="Kredit"> --}}
                                            <div class="input-group">
                                                {{-- <input type="text"
                                                    class="form-control rounded-0 debet deb-{{ $i }}"
                                                    id="db-{{ $i }}" name="debet_{{ $i }}"
                                                    placeholder="Debet" readonly> --}}
                                                <select name="kredit[]" id="kred-{{ $i }}"
                                                    class="form-control rounded-0 sel kred-{{ $i }}">
                                                </select>
                                                <span class="input-group-append">
                                                    <a class="btn btn-default btn-flat hover"
                                                        id="kred-{{ $i }}"><i class="fa fa-info-circle"></i></a>
                                                </span>
                                            </div>
                                            {{-- <input type="hidden" readonly name="debet[]" id="db-{{ $i }}-id">
                                            <input type="hidden" readonly name="kredit[]" id="krd-{{ $i }}-id"> --}}
                                        </td>
                                    </tr>
                                @endfor
                            </table>
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-sm">Simpan Draft</button>
                    <a href="javascript:;" onclick="draft()" class="btn btn-primary btn-sm float-right">Simpan &
                        Release</a>
                </div>
                </form>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <div id="popover_html" style="display:none;">
        <p><label>Name :</label>p_name</p>
        <p><label>Address : </label>p_address</p>
    </div>
@endsection
