@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Peminjaman Buku</h2>

    @if (session('success'))
        <div class="alert alert-success" style="color: green; margin-bottom: 1rem;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('loans.create') }}" class="btn btn-primary" style="margin-bottom: 1rem; display: inline-block;">+ Tambah Peminjaman Baru</a>

    <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th>No</th>
                <th>Anggota</th>
                <th>Petugas</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($loans as $loan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $loan->member->nama ?? '-' }}</td>
                    <td>{{ $loan->user->name ?? '-' }}</td>
                    <td>{{ $loan->tanggal_pinjam }}</td>
                    <td>{{ $loan->tanggal_kembali }}</td>
                    <td>
                        @if ($loan->status === 'dikembalikan')
                            <span style="color: green; font-weight: bold;">Dikembalikan</span>
                        @else
                            <span style="color: orange; font-weight: bold;">Dipinjam</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('loans.show', $loan->id) }}">Detail</a>
                        @if ($loan->status !== 'dikembalikan')
                            | 
                            <form action="{{ route('loans.kembalikan', $loan->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" onclick="return confirm('Yakin ingin mengembalikan buku ini?')" style="background: none; border: none; color: blue; cursor: pointer; text-decoration: underline; padding: 0;">
                                    Kembalikan
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center;">Belum ada data peminjaman.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection