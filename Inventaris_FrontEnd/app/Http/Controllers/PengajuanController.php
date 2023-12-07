<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get('http://127.0.0.1:8000/api/pengajuan');
        // dd($response);
        $pengajuans = json_decode($response);
        // Kirim data ke tampilan Blade
        // dd($pengajuans);
        return view('pengajuan.index', ['pengajuans' => $pengajuans]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $response = Http::get('http://127.0.0.1:8000/api/pengajuan/'.$id);
        $pengajuan = json_decode($response);
        $barang = $pengajuan->barang;
        // dd($pengajuan);
        return view('pengajuan.isiPengajuan', compact('barang', 'pengajuan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $response = Http::patch('http://127.0.0.1:8000/api/konfirmasi/'.$id);
        // $response = Http::get('http://127.0.0.1:8000/api/barang');
        $pengajuan = json_decode($response);
        // dd($barang);
        return view('pengajuan.index', compact('pengajuan'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
