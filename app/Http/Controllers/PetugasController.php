<?php

namespace App\Http\Controllers;

use App\Models\level;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Petugas::with('levels')->get();$data = DB::table('petugas')
        ->join('levels','petugas.idlevel', '=', 'levels.idlevel')
        ->select('petugas.*', 'levels.namalevel')
        ->get();
        return view('petugas.tampil',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $level = level::all();
        $data = $level->map(function ($item){
            return [
                'idlevel' => $item->idlevel,
                'namalevel' => $item->namalevel
            ];
        });
        return view('petugas.input', compact('data'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        DB::table('petugas')->insert([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'nama_petugas' => $request->nama_petugas,
            'idlevel' => $request->idlevel,
        ]);
        return redirect('/petugas');

        
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
    public function edit(string $id)
    {
        //
        $data =  DB::table('petugas')->where('id_petugas',$id)->get();
        $level = Level::all();
        $detail_level = $level->map(function ($item){
            return [
                'id_level' => $item->id_level,
                'namalevel' => $item->namalevel
            ];
        });
        return view('petugas.edit',['petugas' => $data], compact('detail_level'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        DB::table('petugas')->where('idpetugas',$request->idpetugas)->update([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'namapetugas' => $request->namapetugas,
            'idlevel' => $request->idlevel,
        ]);
        return redirect('/petugas');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
          // menghapus data pegawai berdasarkan id yang dipilih
          DB::table('petugas')->where('id_petugas',$id)->delete();
        
          // alihkan halaman ke halaman pegawai
          return redirect('/petugas');
  
    }
}