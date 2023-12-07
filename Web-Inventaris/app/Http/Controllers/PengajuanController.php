<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Http\Requests\StorePengajuanRequest;
use App\Http\Requests\UpdatePengajuanRequest;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengajuans = Pengajuan::all();
        return response()->json($pengajuans);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePengajuanRequest $request)
    {
        $validatedData = $request->validate([
            'isi_pengajuan' => 'required|string', 
            'tanggal_pengajuan' => 'required|date',
            'id_user' => 'required|integer', 
            'id_barang' => 'required|integer', 
        ]);

        $pengajuan = new Pengajuan;
        $pengajuan->isi_pengajuan = $validatedData['isi_pengajuan'];
        $pengajuan->tanggal_pengajuan = $validatedData['tanggal_pengajuan'];
        $pengajuan->id_user = $validatedData['id_user'];
        $pengajuan->id_barang = $validatedData['id_barang'];
        $result = $pengajuan->save();
        if ($result) {
            return response()->json(['message' => 'Data Pengajuan berhasil disimpan']);
        } else {
            return response()->json(['message' => 'Data Pengajuan gagal disimpan']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pengajuan = Pengajuan::with('barang')->find($id);
        // dd($pengajuan);
        return response()->json($pengajuan);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePengajuanRequest $request, $id)
    {
        $validatedData = $request->validate([
            'isi_pengajuan' => 'required|string', 
            'tanggal_pengajuan' => 'required|date',
            'id_user' => 'required|integer', 
            'id_barang' => 'required|integer', 
        ]);
        $pengajuan = Pengajuan::find($id);

        if (!$pengajuan) {
            $pengajuan = new Pengajuan;
        }
    
        $pengajuan->isi_pengajuan = $validatedData['isi_pengajuan'];
        $pengajuan->tanggal_pengajuan = $validatedData['tanggal_pengajuan'];
        $pengajuan->id_user = $validatedData['id_user'];
        $pengajuan->id_barang = $validatedData['id_barang'];
        $result = $pengajuan->save();
    
        if ($result) {
            return response()->json(['message' => 'Data Pengajuan berhasil diperbarui']);
        } else {
            return response()->json(['message' => 'Data Pengajuan gagal diperbarui']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengajuan $pengajuan)
    {
        $result = $pengajuan->delete();

        if ($result) {
            return response()->json(['message' => 'Data Pengajuan berhasil dihapus']);
        } else {
            return response()->json(['message' => 'Data Pengajuan gagal dihapus']);
        }
    }

    public function Confirm($id)
    {
        $Ajuan = Pengajuan::find($id);
        if (!$Ajuan) {
            return response()->json(['message' => 'Data penyewaan tidak ditemukan.']);
            // return redirect()->back()->with('error', 'Data penyewaan tidak ditemukan.');
        }
        // dd($Ajuan);
        $Ajuan->status = 'Sudah Konfirmasi';
        $Ajuan->save();

        return response()->json(['message' => 'Data Pengajuan Sudah di Konfirmasi']);
    }
}
