<?php

namespace App\Http\Controllers;

use App\Models\DetailPinjam;
use App\Models\Inventaris;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $judul = "Peminjaman";
        $data = Peminjaman::where('status_peminjaman', 'Proses Validasi')->get();        
        return view('Peminjaman.tampil', compact('judul', 'data'));
    }

    public function create()
    {
        $judul = "Peminjaman";
        $inventaris = Inventaris::all();
        $data = $inventaris->map(function ($item) {
            return [
                'id_inventaris' => $item->id_inventaris,
                'nama' => $item->nama
            ];
        });
        return view('peminjaman.input', compact('judul', 'data'));
    }

    public function store(Request $request)
    {
        $idBarang = $request->input('id_inventaris');
        $jumlahDipinjam = $request->input('jumlah');
        $barang = Inventaris::find($idBarang);
        $barang->jumlah -= $jumlahDipinjam;
        $barang->save();

        
        $tanggalPinjam = now();
        $tanggalKembali = $tanggalPinjam->copy()->addWeek();

        $peminjaman = Peminjaman::create([
            'tanggal_pinjam' => $tanggalPinjam->toDateString(),
            'tanggal_kembali' => $tanggalKembali->toDateString(),
            'status_peminjaman' => "Proses Validasi",
            'id_pegawai' => $request->id_pegawai,
        ]);
        $request->validate([
            'id_inventaris' => 'required',
            'id_pegawai' => 'required', 
        ]);
        DetailPinjam::create([
            'id_peminjaman' => $peminjaman->id_peminjaman,
            'id_inventaris' => $request->id_inventaris,
            'jumlah' =>  $request->jumlah,
        ]);
        return redirect()->back()->with('Peminjaman berhasil ditambahkan.');
    }

    
}