@extends('layout.layout')

@section('content')
    <div class="container">
        <div class="mt-4">
            @if (Session::get('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if (Session::get('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif
        </div>
        <div class="d-flex justify-content-between">
            <div class="d-flex">
                <a href="{{ route('pembaca.tambah') }}" class="btn btn-primary me-3">Tambah Akun</a>
                <a href="{{ route('pembaca.export') }}" class="btn btn-success">Export Excel</a>
            </div>
            <form action="{{ route('pembaca.data') }}" role="search" class="d-flex" method="GET">
                <input type="text" class="form-control me-2" name="search_pembaca" placeholder="Search Data" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
        <table class="table table-bordered table-striped mt-2">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nis</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($pembaca) && count($pembaca) < 1)
                    <tr>
                        <td colspan="5" class="text-center">Data Pembaca Kosong</td>
                    </tr>
                @else
                    @foreach ($pembaca as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->nis }}</td>
                            <td>{{ $item->status }}</td>
                            <td class="d-flex">
                                <a href="{{ route('pembaca.edit', $item->id) }}" class="btn btn-primary me-2">Edit</a>
                                <button class="btn btn-danger btn-sm" onclick="showModal('{{ $item->id }}', '{{ $item->nama }}')">Hapus</button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="" method="POST" id="deleteForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data Pembaca</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah anda yakin ingin menghapus data <span id="nama-pembaca"></span>?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                            <button type="submit" class="btn btn-danger" id="confirm-delete">Hapus</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        function showModal(id, name) {
            let urlDelete = "{{ route('pembaca.destroy', ':id') }}";
            urlDelete = urlDelete.replace(':id', id);
            $('#deleteForm').attr('action', urlDelete);
            $('#exampleModal').modal('show');
            $('#nama-pembaca').text(name); // Pastikan ID ini sesuai
        }
    </script>
@endpush
