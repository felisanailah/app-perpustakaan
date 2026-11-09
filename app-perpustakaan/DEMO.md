# Skenario Demo Aplikasi Perpustakaan Digital

1. **Login & Authentikasi:**
   - Login menggunakan akun Admin (`admin@pens.ac.id` / `password`).
   - Tampilan mengarah ke Dashboard utama.

2. **Dashboard & Konsumsi API:**
   - Menampilkan total buku, anggota, dan peminjaman aktif dari `GET /api/stats`.

3. **Manajemen Master Data:**
   - Buka menu **Kategori** & **Buku** (CRUD).
   - Buka menu **Anggota**.

4. **Transaksi Peminjaman & Laporan:**
   - Buat transaksi peminjaman baru di menu **Peminjaman**.
   - Proses pengembalian buku.
   - Buka menu **Laporan** untuk membuktikan data laporan dikonsumsi dari API `GET /api/loans`.

5. **Pengujian API:**
   - Akses `GET /api/books`, `GET /api/members`, `GET /api/stats`.