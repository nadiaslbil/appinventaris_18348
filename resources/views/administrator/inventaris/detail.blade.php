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
          <li class="breadcrumb-item"><a href="/inventaris">Data Inventaris</a></li>
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
        @foreach ($data as $d)
        <div class="card-body">
            <input type="hidden" value="{{ $d->id_inventaris }}">
            <div class="mb-2">
                <label class="col-form-label "><b>Nama</b></label>
                <input type="text" class="form-control " value="{{ $d->nama_barang }}" disabled>
            </div>
            <div class="mb-2">
                <label class="col-form-label"><b>Kode Inventaris</b></label>
                <input type="text" class="form-control"  value="{{ $d->kode_inventaris }}" disabled>
            </div>
            <div class="mb-2">
                <label class="col-form-label"><b>Kondisi</b></label>
                <input type="text" class="form-control" value="{{ $d->kondisi }}" disabled>
            </div>
            <div class="mb-2">
                <label class="col-form-label"><b>Keterangan</b></label>
                <input type="text" class="form-control" value="{{ $d->keterangan }}" disabled>
            </div>
            <div class="mb-2">
                <label class="col-form-label"><b>Jumlah</b></label>
                <input type="number" class="form-control" value="{{ $d->jumlah }}" disabled>
            </div>
            <div class="mb-3">
                <label class="col-form-label"><b>Jenis</b></label>
                <input class="form-control" value="{{ $d->nama_jenis }}" disabled>
            </div>
            <div class="mb-3">
                <label class="col-form-label"><b>Letak Ruangan</b></label>
                <input class="form-control" value="{{ $d->nama_ruang }}" disabled>
            </div>
            <div class="mb-3">
                <label class="col-form-label"><b>Petugas</b></label>
                <input class="form-control" value="{{ $d->nama }}" disabled>
                           
            </div>
            <div class="mb-3">
                <label class="col-form-label"><b>Tanggal Register</b></label>
                <input type="date" name="kondisi" class="form-control" placeholder="Kondisi" value="{{ $d->tanggal_register }}" disabled>
            </div>
        </div>
    </div>
    @endforeach
  </div>
</div>

@endsection