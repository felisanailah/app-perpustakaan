<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use App\Models\Member;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::with(['member', 'user', 'books'])->latest()->get();
        return view('loans.index', compact('loans'));
    }

    public function create()
    {
        $members = Member::all();
        $books = Book::all();

        // Variabel $users dihapus karena petugas tidak lagi dipilih manual
        return view('loans.create', compact('members', 'books'));
    }

    public function store(Request $request)
    {
        // Validasi user_id dihapus karena diisi otomatis dari akun yang sedang login
        $validated = $request->validate([
            'member_id' => 'required|integer|exists:members,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
            'book_ids' => 'required|array|min:1',
            'book_ids.*' => 'integer|exists:books,id',
        ]);

        $loan = Loan::create([
            'member_id' => $validated['member_id'],
            'user_id' => auth()->id(), // Otomatis terisi dari ID user yang sedang login
            'tanggal_pinjam' => $validated['tanggal_pinjam'],
            'tanggal_kembali' => $validated['tanggal_kembali'],
        ]);

        $loan->books()->attach($validated['book_ids']);

        return redirect()->route('loans.index')
            ->with('success', 'Transaksi peminjaman berhasil ditambahkan.');
    }

    public function show(Loan $loan)
    {
        $loan->load(['member', 'user', 'books']);
        return view('loans.show', compact('loan'));
    }

    public function kembalikan($id)
    {
        $loan = Loan::findOrFail($id);
        $loan->update([
            'status' => 'dikembalikan',
        ]);

        return redirect()->route('loans.index')
            ->with('success', 'Buku berhasil dikembalikan.');
    }
}