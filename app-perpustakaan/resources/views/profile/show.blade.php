@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 500px; margin-top: 2rem;">
    <h2>Profil Saya</h2>
    
    @if (session('success'))
        <div style="color: green; margin-bottom: 1rem;">{{ session('success') }}</div>
    @endif

    <div style="margin-bottom: 1.5rem; background: #f8f9fa; padding: 1rem; border-radius: 5px;">
        <p><strong>Nama:</strong> {{ auth()->user()->name }}</p>
        <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
        <p><strong>Role:</strong> {{ ucfirst(auth()->user()->role) }}</p>
    </div>

    <h3>Ganti Password</h3>
    <form action="{{ route('profile.password.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 1rem;">
            <label>Password Saat Ini</label>
            <input type="password" name="current_password" required style="width: 100%; padding: .5rem;">
            @error('current_password') <small style="color:red;">{{ $message }}</small> @enderror
        </div>

        <div style="margin-bottom: 1rem;">
            <label>Password Baru</label>
            <input type="password" name="password" required style="width: 100%; padding: .5rem;">
            @error('password') <small style="color:red;">{{ $message }}</small> @enderror
        </div>

        <div style="margin-bottom: 1rem;">
            <label>Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation" required style="width: 100%; padding: .5rem;">
        </div>

        <button type="submit" style="padding: .5rem 1rem; background: #007bff; color: white; border: none; border-radius: 4px;">Perbarui Password</button>
    </form>
</div>
@endsection