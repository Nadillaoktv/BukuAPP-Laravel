<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BukuExport;

class BukuController extends Controller
{

    public function exportExcel()
    {
        return Excel::download(new BukuExport, 'buku.xlsx');
    }

    public function index(Request $request)
    {
        if (empty($request->search_buku)) {
            $buku = Buku::orderBy('judul', 'ASC')->paginate(6); // Use pagination
        } else {
            $buku = Buku::where('judul', 'LIKE', '%' . $request->search_buku . '%')
                        ->orderBy('judul', 'ASC')
                        ->paginate(6); // Use pagination
        }

        return view('buku.index', compact('buku'));
    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:200',
            'genre' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required'
        ], [
            'judul.required' => 'Judul buku harus diisi!',
            'genre.required' => 'Genre buku harus diisi!',
            'penulis.required' => 'Penulis buku harus diisi!',
            'penerbit.required' => 'Penerbit buku harus diisi!'
        ]);

        Buku::create([
            'judul' => $request->judul,
            'genre' => $request->genre,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit
        ]);

        return redirect()->back()->with('success', 'Berhasil Menambah Data Buku!');
    }

    public function edit(string $id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required',
            'genre' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
        ]);

        Buku::where('id', $id)->update([
            'judul' => $request->judul,
            'genre' => $request->genre,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
        ]);

        return redirect()->route('buku.data')->with('success', 'Berhasil mengupdate Data Buku!');
    }

    public function destroy(string $id)
    {
        $deleteData = Buku::find($id);

        if ($deleteData) {
            $deleteData->delete();
            return redirect()->back()->with('success', 'Berhasil menghapus data buku');
        }

        return redirect()->back()->with('error', 'Gagal menghapus data buku');
    }
}
