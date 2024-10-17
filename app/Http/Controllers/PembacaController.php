<?php

namespace App\Http\Controllers;

use App\Models\Pembaca;
use App\Models\Buku;
use Illuminate\Http\Request;

class PembacaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (empty($request->search_pembaca)) {
            $pembaca = Pembaca::orderBy('nama', 'ASC')->limit(6)->offset(0)->get();
        } else {
            $pembaca = Pembaca::where('nama', 'LIKE', '%' . $request->search_pembaca . '%')
                        ->orderBy('nama', 'ASC')
                        ->limit(6)
                        ->offset(0)
                        ->get();
        }


        return view('pembaca.pembaca', compact('pembaca'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pembaca.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // Validasi ini memastikan bahwa beberapa field harus diisi
            'nama' => 'required',
            'buku' => 'required',
            'genre' => 'required|in:romance,horor,comedy'
        ]);


        Pembaca::create([
        //menyimpan data pengguna baru ke dalam tabel users pada database.
            'nama' => $request->nama, //Nama pengguna yang diambil dari request.
            'buku' => $request->buku,
            'genre' => $request->genre,
        ]);

        return redirect()->route('pembaca.data')->with('success', 'Berhasil menambahkan data pembaca');
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
        $pembaca = Pembaca::where('id', $id)->first();// mengembalikan hasil pertama dari pencarian
        return view('pembaca.edit', compact('pembaca'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|max:100',// wajib di isi maksimal 100 karakter
            'buku' => 'required',
            'genre' => 'required',
        ]);

        $pembaca = Pembaca::findOrFail($id);

        // update field yang diisi
        $pembaca->nama = $request->nama;
        $pembaca->buku = $request->buku;
        $pembaca->genre = $request->genre;

        $pembaca->save();

        return redirect()->route('pembaca.data')->with('success', 'Berhasil mengupdate Data Pembaca!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteData = Pembaca::find($id);

        if ($deleteData) {
            $deleteData->delete();
            return redirect()->back()->with('success', 'Berhasil menghapus data pembaca');
        }

        return redirect()->back()->with('error', 'Gagal menghapus data pembaca');
    }


}
