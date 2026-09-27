<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        // Mengambil data peminjaman dari database beserta pagination
        $loans = Loan::paginate(10);

        return view('loans.index', compact('loans'));
    }

    public function create()
    {
        return view('loans.create');
    }

    public function store(Request $request)
    {
        // Nanti diisi logika pembuatan transaksi peminjaman di Pertemuan 7
    }

    public function show(string $id)
    {
        $loan = Loan::findOrFail($id);

        return view('loans.show', compact('loan'));
    }

    public function edit(string $id)
    {
        $loan = Loan::findOrFail($id);

        return view('loans.edit', compact('loan'));
    }

    public function update(Request $request, string $id)
    {
        // Nanti diisi logika update transaksi di Pertemuan 7
    }

    public function destroy(string $id)
    {
        $loan = Loan::findOrFail($id);
        $loan->delete();

        return redirect()->route('loans.index')
            ->with('success', 'Data peminjaman berhasil dihapus.');
    }
}