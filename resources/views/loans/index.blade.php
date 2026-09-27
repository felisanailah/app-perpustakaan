@extends('layouts.app')

@section('title', 'Daftar Peminjaman')

@section('content')
    <h1>Daftar Peminjaman Buku</h1>

    @if(session('success'))
        <div style="padding: 10px; background: #d1fae5; color: #065f46; border-radius: 4px; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif

    <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Anggota</th>
                <th>ID Petugas</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Tgl Dikembalikan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($loans as $loan)
                <tr>
                    <td>{{ $loan['id'] }}</td>
                    <td>{{ $loan['member_id'] }}</td>
                    <td>{{ $loan['user_id'] }}</td>
                    <td>{{ $loan['tanggal_pinjam'] }}</td>
                    <td>{{ $loan['tanggal_kembali'] }}</td>
                    <td>{{ $loan['tanggal_dikembalikan'] ?? '-' }}</td>
                    <td>
                        <span style="padding: 2px 8px; border-radius: 4px; background: {{ $loan['status'] == 'dipinjam' ? '#fef08a' : ($loan['status'] == 'dikembalikan' ? '#d1fae5' : '#fee2e2') }}; color: {{ $loan['status'] == 'dipinjam' ? '#854d0e' : ($loan['status'] == 'dikembalikan' ? '#065f46' : '#991b1b') }};">
                            {{ ucfirst($loan['status']) }}
                        </span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center;">Belum ada data peminjaman.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 15px;">
        {{ $loans->links() }}
    </div>

    <p style="margin-top: 20px;"><em>Catatan: Menampilkan nama anggota & judul buku yang dipinjam memerlukan Eloquent Relationship yang dipelajari di Pertemuan 7.</em></p>
@endsection