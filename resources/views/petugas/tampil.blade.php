@extends('layout')
@section('content')
    
<div class="page-header">
<div class="page-block">
    <div class="row align-items-center">
        <div class="col-md-12">
            <div class="page-header-title">
                <h2 class="m-b-10"></h2>
            </div>
        </div>
    </div>
</div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title" style="float: left">Petugas</h2>
                <a href="createpetugas" class="btn btn-info" style="float: right">Tambah</a>
             </div>
             <div class="card-body">
                <table id="example2" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Petugas</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th>OPSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <th>{{ $d->nama_petugas }}</th>
                            <th>{{ $d->username }}</th>
                            <th>{{ $d->namalevel }}</th>
                            <th>
                                <a href="/editpetugas/{{ $d->id_petugas }}" class="btn btn-warning">Edit</i></a>
                                <a href="/hapuspetugas/{{ $d->id_petugas }}" class="btn btn-danger">Hapus</i></a>
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