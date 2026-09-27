@extends('layouts.app')

@section('title', 'Detail Anggota')

@section('content')
    <h1>Detail Anggota</h1>
    <p><a href="{{ route('members.index') }}">&larr; Kembali ke daftar anggota</a></p>

    <table border="1" cellpadding="8" cellspacing="0" style="max-width: 500px; border-collapse: collapse;">
        <tr>
            <th style="text-align: left; width: 140px;">ID</th>
            <td>{{ $member['id'] }}</td>
        </tr>
        <tr>
            <th style="text-align: left;">Nama</th>
            <td>{{ $member['nama'] }}</td>
        </tr>
        <tr>
            <th style="text-align: left;">NIM</th>
            <td>{{ $member['nim'] }}</td>
        </tr>
        <tr>
            <th style="text-align: left;">Email</th>
            <td>{{ $member['email'] }}</td>
        </tr>
        <tr>
            <th style="text-align: left;">No. Telepon</th>
            <td>{{ $member['nomor_telepon'] }}</td>
        </tr>
        <tr>
            <th style="text-align: left;">Alamat</th>
            <td>{{ $member['alamat'] }}</td>
        </tr>
        <tr>
            <th style="text-align: left;">Status</th>
            <td>{{ ucfirst($member['status']) }}</td>
        </tr>
    </table>

    <div style="margin-top: 15px;">
        <a href="{{ route('members.edit', $member['id']) }}" class="btn" style="padding: 6px 12px; background: #eab308; color: white; text-decoration: none; border-radius: 4px;">Edit Data</a>
    </div>
@endsection