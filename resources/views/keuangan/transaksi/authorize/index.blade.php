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

    .center {
  margin: auto;
  width: 50%;
  border: 3px solid green;
  padding: 10px;
}
  </style>
@endpush
@push('script')
    
@endpush
@section('page')
<div class="row">
  <div class="col-md-6">
    <div class="card shadow-sm">
      <div class="card-header">
        <h3 class="card-title">Header</h3>

        <div class="card-tools">
        </div>
        <!-- /.card-tools -->
      </div>
      <!-- /.card-header -->
      <div class="card-body">
          <div class="form-group">
              <div class="input-group">
                  <div class="input-group-prepend">
                      <input type="text" disabled class="form-control rounded-0 form-control-sm input-text" value="Nomor Jurnal">
                  </div>
                  <input type="text" name="keterangan" class="form-control rounded-0 form-control-sm" readonly value="">
              </div>
          </div>
          <div class="form-group">
              <div class="input-group">
                  <div class="input-group-prepend">
                      <input type="text" disabled class="form-control rounded-0 form-control-sm input-text" value="Inisial Jurnal">
                  </div>
                  <input type="text" name="keterangan" class="form-control rounded-0 form-control-sm" value="{{ $header->nama }}" readonly>
              </div>
          </div>
          <div class="form-group">
              <div class="input-group">
                  <div class="input-group-prepend">
                      <input type="text" disabled class="form-control rounded-0 form-control-sm input-text" value="Keterangan">
                  </div>
                  <input type="text" name="keterangan" class="form-control rounded-0 form-control-sm" value="{{ $header->keterangan }}" readonly>
              </div>
          </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>

<div class="row">
<div class="col-md-6">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Result Saldo</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-sm">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th colspan="2">Kode Akun</th>
                    <th style="width: 150px">Saldo Transaksi</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $no=1;
                    @endphp
                    @foreach ($saldo as $item)
                    <tr>
                      <td>{{ $no++ }}.</td>
                      <td style="width: 20px"><a href="{{ $item->code }}">{{ $item->code }}</a></td>
                      <td>{{ $item->code_name }}</td>
                      <td>Rp. {{ number_format($item->amount,2,",",".") }}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Result Pada Rekening Koran</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-sm">
                <thead>
                  <tr>
                    <th>Posisi</th>
                    <th>Total Saldo</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                      <td>Debet</td>
                      <td style="width: 150px">{{ number_format($saldodebetkredit->debet,2,",",".") }}</td>
                    </tr>
                    <tr>
                      <td>Kredit</td>
                      <td style="width: 150px">{{ number_format($saldodebetkredit->kredit,2,",",".") }}</td>
                    </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
    </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card card-success shadow-sm">
      <!-- /.card-header -->
      <div class="card-body">
        <div class="row">
<div class="col-md-4"></div>
          <div class="col-md-2">
            <button class="btn btn-sm btn-default btn-block">Kembalikan</button>
          </div>
          <div class="col-md-2">
            <button class="btn btn-sm btn-default btn-block">Berikan Persetujuan</button>
          </div>
          <div class="col-md-4"></div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>
    
@endsection
