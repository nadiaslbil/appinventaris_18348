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
        <a href="tambahpetugas" class="btn " style="float: right"><i class="fa-solid fa-user-plus text-secondary" ></i></a>
      </div>
      <div class="card-body">
        <table id="example2" class="table table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Petugas</th>
              <th>ID Petugas</th>
              <th>Username</th>
              <th>Level</th>
              <th>OPSI</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $d)
            <tr>
               <th>{{ $loop->iteration  }}</th>
               <th>{{ $d->nama }}</th>
               <th>{{ $d->id }}</th>
               <th>{{ $d->username }}</th>                
               <th>{{ $d->role_name }}</th>                
               <th>
                 <a href="/editpetugas{{ $d->id }}" class="btn"><i class="fa-solid fa-user-pen text-warning"></i></a>
                 <a href="/hapuspetugas{{ $d->id }}" class="btn"><i class="fas fa-trash-alt text-danger"></i></a>
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