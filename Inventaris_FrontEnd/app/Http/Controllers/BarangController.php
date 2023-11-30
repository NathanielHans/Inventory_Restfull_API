<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Response;



class BarangController extends Controller
{
    public function index()
    {
        // Lakukan permintaan HTTP ke backend untuk mengambil data barang
        $response = Http::get('http://127.0.0.1:8000/api/barang');
        $barangs = json_decode($response);
        //dd($barangs);
        // Kirim data ke tampilan Blade
        return view('Barang.barang', ['barangs' => $barangs]);
    }
    public function store(Request $request)
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
        $response = Http::post('http://127.0.0.1:8000/api/barang', $validatedData);
        //dd($response);
        // Extract the JSON response from the HTTP response
        if ($response->successful()) {
            // If successful, fetch the updated list of barangs
            $barangsResponse = Http::get('http://127.0.0.1:8000/api/barang');
            $barangs = json_decode($barangsResponse);
            
            // Extract the JSON response from the HTTP response
            $responseData = json_decode($response);
            $message = $responseData->message;
            
            // Return the view with the updated list of barangs
            return view('Barang.barang', ['message' => $message, 'barangs' => $barangs]);
        } else {
            // If the request was not successful, handle the error as needed
            // You might want to add more error handling logic here
            return view('Barang.barang', ['error' => 'Failed to store barang']);
        }
    }

    public function qrcode($id)
    {
        $response = Http::get('http://127.0.0.1:8000/api/qrcode/'.$id);
        $data = json_decode($response);
        // dd($data);
        //$textToEncode = $data->id ?? '';
        $origin = url("/barang/{$data->data->id}");
        $qrCode = QrCode::format('png')
            ->size(150)
            ->errorCorrection('H')
            ->generate($origin);
        //return view('qrcode', compact('qrCode'));
        return view('Barang.qrcode', compact('qrCode', 'data'));
    }
    public function edit($id)
    {
        $response = Http::get('http://127.0.0.1:8000/api/barang/'.$id);
        $barang = json_decode($response);
        // dd($barang);
        return view('Barang.editBarang', compact('barang'));
    }
    public function create()
    {
        return view('Barang.addBarang');
    }
}
