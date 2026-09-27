@extends('layouts.app')

@section('title', 'Daftar Anggota')

@section('content')
    <h1>Daftar Anggota</h1>

    <div style="margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center;">
        <a href="{{ route('members.create') }}" class="btn" style="padding: 8px 16px; background: #2563eb; color: white; text-decoration: none; border-radius: 4px;">+ Tambah Anggota</a>

        <form action="{{ route('members.index') }}" method="GET" style="display: flex; gap: 8px;">
            <input type="text" name="search" placeholder="Cari nama anggota..." value="{{ request('search') }}" style="padding: 6px; border: 1px solid #ccc; border-radius: 4px;">
            <button type="submit" style="padding: 6px 12px; background: #4b5563; color: white; border: none; border-radius: 4px; cursor: pointer;">Cari</button>
        </form>
    </div>

    @if(session('success'))
        <div style="padding: 10px; background: #d1fae5; color: #065f46; border-radius: 4px; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif

    <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Email</th>
                <th>No. Telepon</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($members as $member)
                <tr>
                    <td>{{ $member['id'] }}</td>
                    <td><a href="{{ route('members.show', $member['id']) }}">{{ $member['nama'] }}</a></td>
                    <td>{{ $member['nim'] }}</td>
                    <td>{{ $member['email'] }}</td>
                    <td>{{ $member['nomor_telepon'] }}</td>
                    <td>
                        <span style="padding: 2px 8px; border-radius: 4px; background: {{ $member['status'] == 'aktif' ? '#d1fae5' : '#fee2e2' }}; color: {{ $member['status'] == 'aktif' ? '#065f46' : '#991b1b' }};">
                            {{ ucfirst($member['status']) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('members.edit', $member['id']) }}">Edit</a> |
                        <form action="{{ route('members.destroy', $member['id']) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus anggota ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: #b91c1c; cursor: pointer; text-decoration: underline;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center;">Belum ada data anggota.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 15px;">
        {{ $members->appends(request()->query())->links() }}
    </div>
@endsection