<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Barang;
use App\Models\Ruangan;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;


class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Barang = Barang::all();
        return response()->json($Barang);
        // return view('barang', compact('Barang','title', 'Ruangans'));
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
    public function store(StoreBarangRequest $request)
    {
        //return response()->json(['message' => 'Connect']);
        $validatedData = $request->validate([
            'nama_barang' => 'required|max:50', 
            'merk_type' => 'required|max:50',
            'kategori' => 'required|max:50',
            'harga_beli' => 'required|numeric', 
            'tanggal_pembelian' => 'required|date',
            'tanggal_registrasi' => 'required|date',
            'ruangan' => 'required|max:50', 
            'penanggung_jawab' => 'required|max:50', 
        ]);

        $barang = new Barang;
        $barang->nama_barang = $validatedData['nama_barang'];
        $barang->merk_type = $validatedData['merk_type'];
        $barang->kategori = $validatedData['kategori'];
        $barang->harga_beli = $validatedData['harga_beli'];
        $barang->tanggal_pembelian = $validatedData['tanggal_pembelian'];
        $barang->tanggal_registrasi = $validatedData['tanggal_registrasi'];
        $barang->ruangan = $validatedData['ruangan'];
        $barang->penanggung_jawab = $validatedData['penanggung_jawab'];
        $result = $barang->save();

        if ($result) {
            return response()->json(['message' => 'Barang berhasil disimpan']);
        } else {
            return response()->json(['message' => 'Barang gagal disimpan']);
        }
    }

    
    public function qrcode($id)
    {
        $data = DB::table('barangs')->where('id', $id)->first();

        if (!$data) {
            return response()->json(['error' => 'Data not found'], 404);
        }

        //$textToEncode = $data->id ?? '';
        // $origin = Request::getSchemeAndHttpHost() . "/barang/{$id}";
        // $qrCode = QrCode::format('png')
        //     ->size(150)
        //     ->errorCorrection('H')
        //     ->generate($origin);
        //return view('qrcode', compact('qrCode'));
        return response()->json(['data' => $data]);
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $barang = Barang::find($id);
        return response()->json($barang);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBarangRequest $request, $id)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required|max:50', 
            'merk_type' => 'required|max:50',
            'kategori' => 'required|max:50',
            'harga_beli' => 'required|numeric', 
            'tanggal_pembelian' => 'required|date',
            'tanggal_registrasi' => 'required|date',
            'ruangan' => 'required|max:50', 
            'penanggung_jawab' => 'required|max:50', 
        ]);
        $barang = Barang::find($id);

        if (!$barang) {
            $barang = new Barang;
        }

        $barang->nama_barang = $validatedData['nama_barang'];
        $barang->merk_type = $validatedData['merk_type'];
        $barang->kategori = $validatedData['kategori'];
        $barang->harga_beli = $validatedData['harga_beli'];
        $barang->tanggal_pembelian = $validatedData['tanggal_pembelian'];
        $barang->tanggal_registrasi = $validatedData['tanggal_registrasi'];
        $barang->ruangan = $validatedData['ruangan'];
        $barang->penanggung_jawab = $validatedData['penanggung_jawab'];
        $result = $barang->save();
    
        if ($result) {
            return response()->json(['message' => 'Data Barang berhasil diperbarui']);
        } else {
            return response()->json(['message' => 'Data Barang gagal diperbarui']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        $result = $barang->delete();

        if ($result) {
            return response()->json(['message' => 'Data Barang berhasil dihapus']);
        } else {
            return response()->json(['message' => 'Data Barang gagal dihapus']);
        }
    }
}