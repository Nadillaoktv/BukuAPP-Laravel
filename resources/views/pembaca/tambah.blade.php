@extends('layout.layout')

@section('content')
    <form action="{{ route('pembaca.tambah.akun') }}" method="POST" class="card p-5">

        @csrf
        @if (Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}</div>
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
            <label for="nama" class="col-sm-2 col-form-label">Nama:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="nis" class="col-sm-2 col-form-label">NIS :</label>
            <div class="col-sm-10">
                <input type="nis" class="form-control" id="nis" name="nis" value="{{ old('nis') }}">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="status" class="col-sm-2 col-form-label">Status :</label>
            <div class="col-sm-10">
                <select class="form-select" id="status" name="status">
                    <option selected disabled hidden>Pilih</option>
                    <option value="pelajar" {{ old('status') == 'pelajar' ? 'selected' : '' }}>Pelajar</option>
                    <option value="mahasiswa" {{ old('status') == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                    <option value="pekerja" {{ old('status') == 'pekerja' ? 'selected' : '' }}>Pekerja</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Tambah Data</button>
    </form>
@endsection
