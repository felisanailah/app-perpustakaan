@extends('layouts.app')

@section('title', 'Tambah Anggota')

@section('content')
    <p><a href="{{ route('members.index') }}">← Kembali ke daftar anggota</a></p>

    <h1>Tambah Anggota Baru</h1>

    <form action="{{ route('members.store') }}" method="POST">
        @csrf

        <div style="margin-bottom: 12px;">
            <label for="nim">NIM</label><br>
            <input type="text" name="nim" id="nim" value="{{ old('nim') }}">
            @error('nim')
                <div style="color: red; font-size: 14px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 12px;">
            <label for="nama">Nama</label><br>
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}">
            @error('nama')
                <div style="color: red; font-size: 14px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 12px;">
            <label for="email">Email</label><br>
            <input type="email" name="email" id="email" value="{{ old('email') }}">
            @error('email')
                <div style="color: red; font-size: 14px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 12px;">
            <label for="nomor_telepon">Nomor Telepon</label><br>
            <input type="text" name="nomor_telepon" id="nomor_telepon" value="{{ old('nomor_telepon') }}">
            @error('nomor_telepon')
                <div style="color: red; font-size: 14px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 12px;">
            <label for="alamat">Alamat (opsional)</label><br>
            <textarea name="alamat" id="alamat" rows="3">{{ old('alamat') }}</textarea>
            @error('alamat')
                <div style="color: red; font-size: 14px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 12px;">
            <label for="status">Status</label><br>
            <select name="status" id="status">
                <option value="">-- Pilih Status --</option>
                <option value="aktif" @selected(old('status') == 'aktif')>Aktif</option>
                <option value="non-aktif" @selected(old('status') == 'non-aktif')>Non-Aktif</option>
            </select>
            @error('status')
                <div style="color: red; font-size: 14px;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn">Simpan Anggota</button>
    </form>
@endsection