@extends('layouts.index')
@push('css')
<style>
  .input-text {
    text-align:right;
}
</style>
@endpush
@push('script')

@endpush
@section('header')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Administrator Page</h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
@endsection
@section('page')
<div class="col-12">
  <!-- Default box -->
  <div class="card card-solid card-success">
    <div class="card-header">
      <h3 class="card-title"></h3>
      <a href="{{ route('admin.user.index') }}" class="btn btn-sm bg-light"><span class="fa fa-arrow-left"></span></a>
      <div class="card-tools">
        
      </div>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.user.update',['user'=>Crypt::encrypt($user->id)]) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <input type="text" class="form-control form-control-sm rounded-0 input-text" value="Nama Lengkap" disabled>
            </div>
            <input type="text" name="name" value="{{ $user->name }}" autocomplete="off" class="form-control form-control-sm rounded-0">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <input type="text" class="form-control form-control-sm rounded-0 input-text" value="Email" disabled>
            </div>
            <input type="email" value="{{ $user->email }}" name="email" autocomplete="off" class="form-control form-control-sm rounded-0">
          </div>
        </div>
        
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-sm bg-primary float-right">Simpan</button>
      </div>
    </form>
    <!-- /.card-footer-->
  </div>
  <!-- /.card -->
</div>
@endsection
