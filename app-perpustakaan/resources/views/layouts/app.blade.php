<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Sistem Perpustakaan' }}</title>
    <style>
        body {
            font-family: system-ui, -apple-system, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #1d72b8;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: white;
            text-decoration: none;
            display: block;
            margin-bottom: 0.5rem;
        }
        .nav-links {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 1rem;
        }
        .nav-links a:hover {
            text-decoration: underline;
        }
        .btn-logout {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            font-size: 0.9rem;
        }
        .btn-logout:hover {
            background-color: #c82333;
        }
        .container {
            max-width: 1100px;
            margin: 2rem auto;
            padding: 0 1rem;
        }
        /* Style Tabel Persis Foto Kedua */
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffffff;
            margin-top: 1.5rem;
            border: 1px solid #e9ecef;
        }
        th {
            background-color: #f1f3f5;
            text-align: left;
            padding: 12px;
            font-weight: bold;
            border-bottom: 1px solid #dee2e6;
        }
        td {
            padding: 12px;
            border-bottom: 1px solid #e9ecef;
        }
        .btn-primary {
            background-color: #2f77f4;
            color: white;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
            font-weight: 500;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div>
            <a href="{{ url('/') }}" class="navbar-brand">Sistem Perpustakaan</a>
            <div class="nav-links">
                <a href="{{ route('books.index') }}">Buku</a>
                @if(auth()->check() && auth()->user()->role === 'admin')
                    <a href="{{ route('categories.index') }}">Kategori</a>
                @endif
                <a href="{{ route('members.index') }}">Anggota</a>
                <a href="{{ route('loans.index') }}">Peminjaman</a>
            </div>
        </div>

        <div class="nav-links">
            @auth
                <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="btn-logout">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn-primary">Login</a>
            @endauth
        </div>
    </nav>

    <main class="container">
        @yield('content')
    </main>

</body>
</html>