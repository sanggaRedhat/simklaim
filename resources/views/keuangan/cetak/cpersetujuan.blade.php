<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        #table table {
            border-collapse: collapse;
            width: 100%;
            /* padding: 50px; */
        }

        #table table thead tr th {
            border-bottom: 1px solid black;
            border-top: 1px solid black;
        }

        #table table tfoot {
            /* border-bottom: 1px solid black; */
            border-top: 1px solid black;
        }

        #table table tbody td {
            /* border-bottom: 1px solid black; */
            padding: 5px;
        }

    </style>
</head>

<body>
    <center>
        <h3>Form Rekonsiliasi Data Mutasi Rekening Koran</h3>
    </center>
    <br>
    <div>
        <table>
            <tr>
                <td width="150px">Nomor Jurnal</td>
                <td width="2px">:</td>
                <td></td>
            </tr>
            <tr>
                <td>Judul</td>
                <td>:</td>
                <td>{{ $header->nama }}</td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td>:</td>
                <td>{{ $header->keterangan }}</td>
            </tr>
            <tr>
                <td>Tanggal Cetak</td>
                <td>:</td>
                <td>{{ date('d/m/Y') }}</td>
            </tr>
        </table>
    </div>
    <br>
    <div id="table">
        <table>
            <thead>
                <tr>
                    <th align="center" width="10%">No</th>
                    <th align="center" width="60%">Kode Akun</th>
                    <th colspan="2" align="center">Saldo</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($saldo as $item)
                    <tr>
                        <td align="center">{{ $no++ }}</td>
                        <td>{{ $item->code }} - {{ $item->code_name }}</td>
                        <td align="right" width="2%">Rp.</td>
                        <td align="right">{{ number_format($item->amount, '2', ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot></tfoot>
        </table>
    </div>
    <br>
    <span>*Pastikan anda telah menginputkan data tersebut diatas dengan benar</span>
</body>

</html>
