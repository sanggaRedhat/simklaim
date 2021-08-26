@extends('layouts.index')
@section('header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1>Keuangan</h1> --}}
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/chart.min.js"
        integrity="sha512-asxKqQghC1oBShyhiBwA+YgotaSYKxGP1rcSYTDrB0U6DxwlJjU59B67U8+5/++uFjcuVM8Hh5cokLjZlhm3Vg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0/dist/chartjs-plugin-datalabels.min.js"
        integrity="sha256-RgW6ICRcHgz1vaGkL5egQAqmkWxGbwa2E3Boz/3CapM=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                "scrollY": "200px",
                "scrollCollapse": true,
                "paging": false,
                "info": false
            });
        });
    </script>
    <script>
        // function transaksi_status() {
        $.ajax({
            type: "GET",
            url: "{{ route('dashboard.grafiksaldobank') }}",
            success: function(response) {
                Chart.register(ChartDataLabels);
                var labels = response.data.map(function(e) {
                    return e.name
                })

                var datas = response.data.map(function(e) {
                    return e.amount
                })

                var colors = response.data.map(function(e) {
                    return e.color
                })

                var ctx = $('#myChart');

                var data = [{
                    data: datas,
                    labels: labels,
                    backgroundColor: colors,
                    borderColor: "#fff"
                }];

                var options = {
                    plugins: {
                        tooltip: {
                            enabled: false
                        },
                        // [chartDataLabels],
                        datalabels: {
                            formatter: (value, ctx) => {
                                let sum = 0;
                                let dataArr = ctx.chart.data.datasets[0].data;
                                dataArr.map(data => {
                                    sum += parseFloat(data);
                                });
                                let percentage = (value * 100 / sum).toFixed(2) + "%";
                                return percentage;
                            },
                            color: '#fff',
                        }
                    }
                };
                var chart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        datasets: data
                    },
                    options: options,
                });
            },
            error: function(xhr) {
                console.log(xhr.responseJSON);
            }
        });
        // }
    </script>
    <script>
        function print() {
            var myWindow = window.open("", "", "width=600,height=600");
        }
    </script>
@endpush
@section('page')
    <div class="col-md-12">
        <div class="row">
            {{-- <div class="col-md-1"></div> --}}
            <div class="col-md-4" style=" margin:0 auto;">
                <div style="position:relative; height:10vh; width:20vw; margin:0 auto;">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Rekapitulasi Saldo Per Akun Bank</h3>

                        <div class="card-tools">
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 350px;">
                        <table id="table" class="table table-striped table-bordered compact" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="2px">No</th>
                                    <th></th>
                                    <th>Kode</th>
                                    <th>Bank</th>
                                    <th>Saldo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                    $sum = 0;
                                @endphp
                                @foreach ($saldo as $item)
                                    @php
                                        $sum += $item->amount;
                                    @endphp
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td style="color: white;width:80px;background-color: {{ $item->color }}"
                                            align="center">
                                            {{ number_format(($item->amount / $total) * 100, 2, '.', ',') }} %
                                        </td>
                                        <td align="center"><a href="javascript:;" onclick="print('{{ $item->code }}')"
                                                style="color: black;width:100px">{{ $item->code }}</a></td>
                                        <td>{{ $item->name }}</td>
                                        <td align="right">{{ number_format($item->amount, 2, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td align="center" colspan="4">TOTAL</td>
                                    <td align="right">{{ number_format($total, 2, ',', '.') }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@endsection
