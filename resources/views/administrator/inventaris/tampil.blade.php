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
          <a href="tambahinventaris" class="btn " style="float: right"><i class="fa-solid fa-folder-plus text-secondary" ></i></a>
        </div>
        <div class="card-body">
          <table id="example2" class="table table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kode Inventaris</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
                <th>OPSI</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
              <tr>
                 <th>{{ $loop->iteration  }}</th>
                 <th><a href="detailinven{{ $d->id_inventaris }}">{{ $d->nama_barang }}</a></th>
                 <th>{{ $d->kode_inventaris }}</th>
                 <th>{{ $d->d_keterangan = $d->keterangan > 0 ? 'Tersedia' : 'Tidak Tersedia'; }}</th>                
                 <th>{{ $d->jumlah }}</th>                
                 <th>
                   <a href="editinventaris{{ $d->id_inventaris }}" class="btn"><i class="fa-solid fa-pencil text-warning"></i></a>
                   <a href="hapusinventaris{{ $d->id_inventaris }}" class="btn"><i class="fas fa-trash-alt text-danger"></i></a>
                 </th>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

@endsection