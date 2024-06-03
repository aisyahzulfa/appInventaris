@extends('layout')
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">
       <div class="col-sm-6">
       </div><!-- /.col -->
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="/profil">Profil</a></li>
           <li class="breadcrumb-item active">selanjutnya</li>
         </ol>
       </div><!-- /.col -->
     </div><!-- /.row -->
   </div><!-- /.container-fluid -->
 </div>
 <!-- /.content-header -->

 <div class="content">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="card">
                  <div class="card-header">
                      <h2 class="card-title">Tambah Pegawai</h2>
                  </div>
                  <div class="card-body">
                      <form action="/pegawai/update" method="post">
                          @csrf
                          <input type="hidden" name="id_pegawai" value="{{ $pegawai->id_pegawai }}">
                          <div class="form-group">
                              <label for="namapegawai">Nama Pegawai</label>
                              <input type="text" class="form-control" required="required" name="namapegawai" value="{{ $pegawai->nama_pegawai ?? ""}}">
                          </div>
                          <div class="form-group">
                              <label for="nip">Kode Jenis</label>
                              <input type="number" class="form-control" required="required" name="nip" value="{{ $pegawai->nip?? "" }}">
                          </div> 
                          <div class="form-group">
                              <label for="alamat">Alamat</label>
                              <input type="text" class="form-control" required="required" name="alamat" value="{{ $pegawai->alamat ?? ""}}">
                          </div>
                          <button type="submit" class="btn btn-primary">Simpan</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>



 @endsection