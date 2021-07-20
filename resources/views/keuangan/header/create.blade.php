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
    <style>
    .input-text {
      text-align:right;
    }

    .header-text {
        text-align: center;
    }
  </style>
@endpush
@push('script')
    
@endpush
@section('page')
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <div class="left">
                        <a href="{{ route('keuangan.header.index') }}"
                        class="btn btn-sm btn-social btn-default"><i class="fa fa-arrow-left"></i></a>
                        {{-- <h3 class="card-title">Header Transaksi</h3> --}}
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('keuangan.header.store') }}" method="post">
                        <div class="form-group">
                            <input type="text" disabled class="form-control form-control-lg rounded-0 header-text" value="FORM TAMBAH HEADER TRANSAKSI">
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <input type="text" disabled class="form-control rounded-0 form-control-sm input-text" value="Nama Header">
                                </div>
                                <input type="text" name="nama" class="form-control rounded-0 form-control-sm" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <input type="text" disabled class="form-control rounded-0 form-control-sm input-text" value="Keterangan">
                                </div>
                                <input type="text" name="keterangan" class="form-control rounded-0 form-control-sm" value="">
                            </div>
                        </div>
                        @csrf
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn bg-primary btn-sm float-right">Simpan</button>
                </div>
                </form>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
@endsection
