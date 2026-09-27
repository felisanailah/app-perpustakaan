@extends('layouts.app')

@section('title', 'Tambah Anggota')

@section('content')
    <h1>Tambah Anggota Baru</h1>
    <p><a href="{{ route('members.index') }}">&larr; Kembali ke daftar anggota</a></p>

    <form action="{{ route('members.store') }}" method="POST" style="max-width: 500px;">
        @csrf

        <div style="margin-bottom: 12px;">
            <label style="display: block; font-weight: bold;">Nama Lengkap</label>
            <input type="text" name="nama" value="{{ old('nama') }}" style="width: 100%; padding: 6px;">
            @error('nama') <div style="color: red; font-size: 14px;">{{ $message }}</div> @enderror
        </div>

        <div style="margin-bottom: 12px;">
            <label style="display: block; font-weight: bold;">NIM</label>
            <input type="text" name="nim" value="{{ old('nim') }}" style="width: 100%; padding: 6px;">
            @error('nim') <div style="color: red; font-size: 14px;">{{ $message }}</div> @enderror
        </div>

        <div style="margin-bottom: 12px;">
            <label style="display: block; font-weight: bold;">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" style="width: 100%; padding: 6px;">
            @error('email') <div style="color: red; font-size: 14px;">{{ $message }}</div> @enderror
        </div>

        <div style="margin-bottom: 12px;">
            <label style="display: block; font-weight: bold;">Nomor Telepon</label>
            <input type="text" name="nomor_telepon" value="{{ old('nomor_telepon') }}" style="width: 100%; padding: 6px;">
            @error('nomor_telepon') <div style="color: red; font-size: 14px;">{{ $message }}</div> @enderror
        </div>

        <div style="margin-bottom: 12px;">
            <label style="display: block; font-weight: bold;">Alamat</label>
            <textarea name="alamat" rows="3" style="width: 100%; padding: 6px;">{{ old('alamat') }}</textarea>
            @error('alamat') <div style="color: red; font-size: 14px;">{{ $message }}</div> @enderror
        </div>

        <div style="margin-bottom: 12px;">
            <label style="display: block; font-weight: bold;">Status</label>
            <select name="status" style="width: 100%; padding: 6px;">
                <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
            </select>
            @error('status') <div style="color: red; font-size: 14px;">{{ $message }}</div> @enderror
        </div>

        <button type="submit" style="padding: 8px 16px; background: #2563eb; color: white; border: none; border-radius: 4px; cursor: pointer;">Simpan Anggota</button>
    </form>
@endsection