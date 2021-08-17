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
@endpush
@push('script')

@endpush
@section('page')
    <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box bg-gradient-info">
                <span class="info-box-icon"><i class="fas fa-wallet"></i></span>

                <div class="info-box-content">
                    {{-- <span class="info-box-text">Saldo Pada Bank</span> --}}
                    <span class="info-box-number">
                        <h3> Rp. {{ number_format($totalbank, 2, '.', ',') }}</h3>
                    </span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="progress-description">
                        <a style="color: white" href="">Informasi Saldo Pada Akun Bank</a>
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            {{-- <a href="" class="btn btn-sm btn-block btn-primary">Lihat Detail</a> --}}
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box bg-gradient-success">
                <span class="info-box-icon"><i class="fas fa-cash-register"></i></span>

                <div class="info-box-content">
                    <span class="info-box-number">
                        <h3> Rp. {{ number_format($totalbank, 2, '.', ',') }}</h3>
                    </span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="progress-description">
                        <a style="color: white" href="">Informasi Saldo Pada Akun Kas Operasional</a>
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box bg-gradient-warning">
                <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>

                <div class="info-box-content">
                    <span class="info-box-number">
                        <h3> Rp. {{ number_format($totalbank, 2, '.', ',') }}</h3>
                    </span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="progress-description">
                        Total Investasi
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
@endsection
