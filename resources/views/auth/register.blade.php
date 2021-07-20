@extends('layout.index')
@section('header')


    <h1 class="m-0"></h1>
@endsection
@push('css')
    
@endpush
@push('script')
   
@endpush
@section('page')
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-sm rounded-0" disabled value="Nama Lengkap">  
                    <input type="text" autocomplete="off" class="form-control form-control-sm rounded-0 @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="" name="name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control form-control-sm rounded-0" disabled value="Alamat Email">  
                    <input type="email" autocomplete="off" class="form-control form-control-sm rounded-0 @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="" name="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-sm rounded-0" disabled value="Nomor Induk Karyawan">  
                    <input type="text" autocomplete="off" class="form-control form-control-sm rounded-0 @error('nik') is-invalid @enderror" value="{{ old('nik') }}" placeholder="" disabled name="nik">
                    @error('nik')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-sm rounded-0" disabled value="Password">  
                    <input type="password" autocomplete="off" class="form-control form-control-sm rounded-0 @error('password') is-invalid @enderror" placeholder="" name="password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-sm rounded-0" disabled value="Konfirmasi Password">  
                    <input type="password" autocomplete="off" class="form-control form-control-sm rounded-0 @error('password_confirmation') is-invalid @enderror" placeholder="" name="password_confirmation">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn bg-gradient-success btn-sm float-right">Simpan</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
    </div>
    <div id="popover_html" style="display:none;">
        <p><label>Name :</label>p_name</p>
        <p><label>Address : </label>p_address</p>
    </div>
@endsection
