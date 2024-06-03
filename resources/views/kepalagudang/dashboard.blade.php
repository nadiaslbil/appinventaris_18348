@extends('kepalagudang.index')
@section('content')
<div class="content">
    <div class="container-fluid">
      <h3>{{ $title }}</h3>
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">{{ $isi }}</h4>
            <br>
              <p>Halo Kepala Gudang,</p>         
              <p>Selamat datang di Dashboard Kepala Gudang, pusat kontrol dan manajemen untuk seluruh operasi situs kami. Kami sangat senang melihat Anda di sini dan siap membantu Anda dalam mengelola berbagai aspek sistem kami dengan lebih mudah dan efisien.</p> 
            </div>
          </div>
        </div>
    </div>
</div>
@endsection