@extends('layout.layout')

@section('content')
<form action="{{ route('buku.tambah_buku.formulir') }}" method="POST" class="card p-5 m-5">

    @csrf
    @if (Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success')}}
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
        <label for="name" class="col-sm-2 col-form-label">Judul : </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="judul" name="judul" value="{{ old('name') }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="genre" class="col-sm-2 col-form-label">Genre :</label>
        <div class="col-sm-10">
            <select class="form-select" id="genre" name="genre"> <option selected disabled hidden> Pilih</option>
                <option value="romance" {{ old('type') == 'romance' ? 'selected' : ''}}>Romance</option>
                <option value="horor" {{ old('type') == 'horor' ? 'selected' : ''}}>Horor</option>
                <option value="comedy" {{ old('type') == 'comedy' ? 'selected' : ''}}>Comedy</option>
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="penulis" class="col-sm-2 col-form-label">Penulis :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="penulis" name="penulis" value="{{ old('penulis') }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="stock" class="col-sm-2 col-form-label">Penerbit : </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{ old('penerbit') }}">
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Tambah Data Buku</button>
</form>
@endsection
