<?php

namespace App\Http\Controllers;

// use APP\Models\pegawai;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\DB;



class pegawaicontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        
        $judul = "pegawai";

        $data = pegawai::all();

        return view('pegawai.tampil',compact('data','judul'));
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $jenis = pegawai::all();
        $judul = "pegawai";
        return view('pegawai.tambah',compact('judul'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('pegawais')->insert([

            'namapegawai'=> $request->namapegawai,
            'nip'=> $request->nip,
            'no_pegawai'=> $request->no_pegawai,
            'alamat'=> $request->alamat,
        ]);


        return redirect('/pegawai');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id_pegawai)
{
    // Mengambil data pegawai berdasarkan id yang dipilih
    $pegawai = Pegawai::where('id_pegawai', $id_pegawai)->first();

    // Memastikan data pegawai ditemukan
    if (!$pegawai) {
        return redirect('/pegawai')->with('error', 'Pegawai tidak ditemukan.');
    }

    // Passing data pegawai yang didapat ke view edit.blade.php
    return view('pegawai.edit', compact('pegawai'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        // Validasi request
$validatedData = $request->validate([
    'id_pegawai' => 'required|exists:pegawais,id_pegawai',
    'namapegawai' => 'required|string|max:255',
    'nip' => 'required|string|max:255',
    'alamat' => 'required|string|max:255',
]);

// Update data pegawai
DB::table('pegawais')->where('id_pegawai', $validatedData['id_pegawai'])->update([
    'namapegawai' => $validatedData['namapegawai'],
    'nip' => $validatedData['nip'],
    'alamat' => $validatedData['alamat'],
]);

// Redirect setelah update
return redirect('/pegawai');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('pegawais')->where('id_pegawai',$id)->delete();

        return redirect('/pegawai');
    }
}
