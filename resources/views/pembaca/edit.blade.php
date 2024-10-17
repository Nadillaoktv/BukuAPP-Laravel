@extends('layout.layout')

@section('content')
<form action="{{ route('pembaca.edit.formulir', $pembaca['id'])}}" method="POST" class="card p-5 m-5">

    @csrf
    @method('PATCH')
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
        <label for="nama" class="col-sm-2 col-form-label">Nama:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="buku" class="col-sm-2 col-form-label">Buku:</label>
        <div class="col-sm-10">
            <input type="buku" class="form-control" id="buku" name="buku" value="{{ old('buku') }}">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="genre" class="col-sm-2 col-form-label">Genre :</label>
        <div class="col-sm-10">
            <select class="form-select" id="genre" name="genre">
                <option selected disabled hidden>Pilih</option>
                <option value="romance" {{ old('genre') == 'romance' ? 'selected' : '' }}>romance</option>
                <option value="horor" {{ old('genre') == 'horor' ? 'selected' : '' }}>horor</option>
                <option value="comedy" {{ old('genre') == 'comedy' ? 'selected' : '' }}>comedy</option>
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Update Data</button>
</form>
@endsection
