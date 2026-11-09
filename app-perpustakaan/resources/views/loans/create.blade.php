@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Peminjaman Baru</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('loans.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="member_id">Anggota</label>
            <select name="member_id" id="member_id" class="form-control" required>
                <option value="">-- Pilih Anggota --</option>
                @foreach ($members as $member)
                    <option value="{{ $member->id }}" @selected(old('member_id') == $member->id)>
                        {{ $member->nama }} ({{ $member->nim }})
                    </option>
                @endforeach
            </select>
            @error('member_id')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group" style="margin-top: 1rem;">
            <label>Petugas Input</label>
            <input type="text" value="{{ auth()->user()->name }}" readonly class="form-control" style="background-color: #e9ecef;">
        </div>

        <div class="form-group" style="margin-top: 1rem;">
            <label for="tanggal_pinjam">Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" value="{{ old('tanggal_pinjam', date('Y-m-d')) }}" required>
            @error('tanggal_pinjam')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group" style="margin-top: 1rem;">
            <label for="tanggal_kembali">Tanggal Kembali</label>
            <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control" value="{{ old('tanggal_kembali') }}" required>
            @error('tanggal_kembali')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group" style="margin-top: 1rem;">
            <label>Buku yang Dipinjam</label>
            @foreach ($books as $book)
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="book_ids[]" value="{{ $book->id }}" {{ is_array(old('book_ids')) && in_array($book->id, old('book_ids')) ? 'checked' : '' }}>
                        {{ $book->judul }} (Stok: {{ $book->stok }})
                    </label>
                </div>
            @endforeach
            @error('book_ids')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary" style="margin-top: 1.5rem;">Simpan Transaksi</button>
        <a href="{{ route('loans.index') }}" class="btn btn-secondary" style="margin-top: 1.5rem;">Batal</a>
    </form>
</div>
@endsection