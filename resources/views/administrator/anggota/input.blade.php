@extends('administrator.index')
@section('content')

<div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
        <div class="page-header-title">
          <h5 class="m-b-10">{{ $judul }}</h5>
        </div>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="/anggota">Data Anggota</a></li>
          <li class="breadcrumb-item" aria-current="page">{{ $judul }}</li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <h2 class="card-title" style="float: left">{{ $judul }}</h2>
      </div>
        <form action="storeanggota" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <div class="card-body">
                <div class="mb-3 row">
                  <label class="col-sm-2 col-form-label">Nama Anggota</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama_anggota" class="form-control" placeholder="Nama Anggota">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-2 col-form-label">NIS</label>
                  <div class="col-sm-10">
                    <input type="number" name="no_anggota" class="form-control" placeholder="NIS">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <input type="text" name="alamat" class="form-control" placeholder="Alamat">
                  </div>
                </div>
                <div class="d-grid gap-2 d-md-block">
                  <input class="btn btn-secondary"  type="submit" name="submit" value="Tambah">
                  <button class="btn" style="background-color: gray" name="reset" type="reset">RESET</button>
                </div>
            </div>
        </form>
    </div>
  </div>
</div>

@endsection