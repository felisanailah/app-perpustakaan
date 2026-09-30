<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Perpustakaan')</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9fafb;
            color: #1f2937;
        }
        header {
            background-color: #2563eb;
            color: white;
            padding: 1rem 2rem;
        }
        header h1 {
            margin: 0;
            font-size: 1.5rem;
        }
        nav a {
            color: white;
            margin-right: 15px;
            text-decoration: none;
            font-weight: bold;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .container {
            padding: 20px;
            max-width: 1000px;
            margin: 0 auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            background: white;
        }
        th, td {
            border: 1px solid #e5e7eb;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f3f4f6;
        }
        .btn {
            display: inline-block;
            padding: 6px 12px;
            background-color: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            border: none;
            cursor: pointer;
        }
        .inline {
            display: inline;
        }
        .alert-success {
            padding: 10px 15px;
            background-color: #d1fae5;
            color: #065f46;
            border-radius: 4px;
            margin-bottom: 15px;
        }
        
        /* CSS Badge Status */
        .badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: bold;
            color: #fff;
            display: inline-block;
        }
        .badge-success { background-color: #16a34a; } /* Hijau untuk dikembalikan */
        .badge-warning { background-color: #d97706; } /* Oranye untuk dipinjam */
        .badge-danger  { background-color: #dc2626; } /* Merah untuk terlambat */
    </style>
</head>
<body>
    <header>
        <h1>Sistem Perpustakaan</h1>
        <nav>
            <a href="{{ route('books.index') }}">Buku</a>
            <a href="{{ route('categories.index') }}">Kategori</a>
            <a href="{{ route('members.index') }}">Anggota</a>
            <a href="{{ route('loans.index') }}">Peminjaman</a>
        </nav>
    </header>

    <div class="container">
        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>