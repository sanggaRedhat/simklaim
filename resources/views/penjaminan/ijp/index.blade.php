@extends('layouts.index')
@section('header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Penjaminan</h1>
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
        $('#table').DataTable({
            "scrollY": "200px",
            "scrollCollapse": true,
            "paging": false,
            "info": false,
            "searching": false
        });
        $('#table1').DataTable({
            "scrollY": "200px",
            "scrollCollapse": true,
            "paging": false,
            "info": false,
            "searching": false
        });
    </script>
@endpush
@section('page')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Update Imbal Jasa Penjaminan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 350px;">
                    <table id="table" class="table table-sm table-striped table-bordered compact" cellspacing="0"
                        width="100%">
                        <thead>
                            <tr>
                                <th align="center">Bulan</th>
                                <th align="center" width="200px">Total IJP</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $ijps = 0;
                                $no = 1;
                            @endphp
                            @foreach ($ijp as $item)
                                <tr>
                                    <td>{{ date('M Y', strtotime($item->mon)) }}</td>
                                    <td align="right">
                                        {{ number_format($item->amount, 2, '.', ',') }}
                                    </td>
                                    <td align="right">
                                        @if ($ijps < $item->amount)
                                            @if ($ijps == 0)
                                                @php
                                                    $persen = 100;
                                                @endphp
                                            @else
                                                @php
                                                    $a = $item->amount - $ijps;
                                                    $b = $a / $ijps;
                                                    $persen = $b * 100;
                                                @endphp
                                            @endif
                                            <span class="text-success"><i class="fas fa-arrow-up"></i>
                                                {{ number_format($persen, 2, '.', ',') }}
                                                %</span>
                                        @else
                                            @php
                                                $persen = (($item->amount - $ijps) / $item->amount) * 100;
                                            @endphp
                                            <span class="text-warning"><i class="fas fa-arrow-down"></i>
                                                {{ number_format($persen, 2, '.', ',') }}
                                                %</span>
                                        @endif
                                    </td>
                                </tr>
                                @php
                                    $ijps = $item->amount;
                                @endphp
                                @if ($no++ == 6)
                                    @php
                                        break;
                                    @endphp
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>

    </div>
@endsection
