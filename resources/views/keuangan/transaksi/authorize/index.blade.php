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
                <div class="row">
                    @foreach ($saldo as $item)
                    <div class="col-md-2 col-sm-6 col-12">
                      <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="fas fa-arrow-right"></i></span>
          
                        <div class="info-box-content">
                          <span class="info-box-text">{{ $item->code }}</span>
                          <span class="info-box-number">{{ $item->amount }}</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    @endforeach
                    <!-- /.col -->
                  </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
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
