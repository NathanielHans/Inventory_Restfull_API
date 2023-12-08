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
    public function create($id)
    {
        $response = Http::get('http://127.0.0.1:8000/api/barang/'.$id);
        $barang = json_decode($response);
        // dd($barang);
        return view('pengajuan.addPengajuan', ['barang' => $barang]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'nama' => 'required|string', 
        'isi_pengajuan' => 'required|string', 
        'tanggal_pengajuan' => 'required|date',
        'id_barang' => 'required|integer', 
    ]);
    // $validatedDatalda['status']= "Belum"
    try {
        $response = Http::post('http://127.0.0.1:8000/api/pengajuan', $validatedData);
        
        // dd($response);
        if ($response->successful()) {
            return redirect()->back();
        } else {
            // If the request was not successful, handle the error as needed
            // You might want to add more error handling logic here
            return redirect()->back()->with(['error' => 'Failed to store pengajuan']);
        }
    } catch (\Exception $e) {
        // Handle exceptions, for example, if there is an issue with the HTTP request
        return redirect()->back()->with(['error' => 'An error occurred while processing the request']);
    }
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
