<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    {{-- <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script> --}}
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <table id="tbl" class="table table-striped table-bordered compact">
        <thead>
            <th width="10px">No</th>
            <th>Nama Akun</th>
            <th width="100px">Code Akun</th>
            <th width="40px"></th>
        </thead>
    </table>
    <a href="javascript:;" style="display: none" class="btn bn btn-primary">TEst</a>
    <input type="text" class="in" style="display: ">
    <input type="text" class="idin" style="display: ">



    <script>
        $(document).ready(function() {
            $('#tbl').DataTable({
                paging: false,
                processing: true,
                serverSide: true,
                ajax: "{{ route('jsoncode') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan',
                        searchable: true
                    },
                    {
                        data: 'code',
                        name: 'code'
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

        function tes(id, code) {
            $('.in').val(code);
            $('.idin').val(id);
            $('.bn').trigger('click');
        }

    </script>
</body>

</html>
