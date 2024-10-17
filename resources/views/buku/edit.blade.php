@extends('layout.layout')

@section('content')
    <form action="{{ route('buku.edit.formulir', $buku['id']) }}" method="POST" class="card p-5 m-5">
        {{--
        1. tah <form> attr action & method
            method :
            - GET : form tujuan mencari data (search)
            - POST : form tujuan menambahkan/menghapus/mengubah
            action :
            - arahkan route yang akan menangani proses data ke db nya
            - jika GET : arahkan ke route yang sama dengan route yang menampilkan blade ini
            - jika POST : arahkan ke route baru dengan httpmethod sesuai tujuan POST (tambah), PACH (ubah), DELETE (hapus)
        2. jika form method POST : @csrf
        3. input attr name (isi disamakan dengan column di migration)
        4. button/input type submit
    --}}
        @csrf
        @method('PATCH')
        @if (Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $errors)
                        <li>{{ $errors }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mb-3 row">
            <label for="judul" class="col-sm-2 col-form-label">Judul : </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="judul" name="judul" value="{{ $buku['judul'] }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="genre" class="col-sm-2 col-form-label">Genre :</label>
            <div class="col-sm-10">
                <select class="form-select" id="genre" name="genre">
                    <option selected disabled hidden> Pilih</option>
                    <option value="romance" {{ $buku['type'] == 'romance' ? 'selected' : '' }}>Romance</option>
                    <option value="horor" {{ $buku['type'] == 'horor' ? 'selected' : '' }}>Horor</option>
                    <option value="comedy" {{ $buku['type'] == 'comedy' ? 'selected' : '' }}>Comedy</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="penulis" class="col-sm-2 col-form-label">Penulis : </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="penulis" name="penulis" value="{{ $buku['penulis'] }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="penerbit" class="col-sm-2 col-form-label">Penerbit : </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{ $buku['penerbit'] }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update Data</button>
    </form>
@endsection
