<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    // Data dummy anggota sementara
    private array $members = [
        [
            'id' => 1,
            'nama' => 'Felisa Nailah Putri',
            'nim' => '3125500059',
            'email' => 'felisa@gmail.com',
            'nomor_telepon' => '081234567890',
            'alamat' => 'Surabaya',
            'status' => 'aktif'
        ],
        [
            'id' => 2,
            'nama' => 'nadya safira',
            'nim' => '3125500037',
            'email' => 'nadya@gmail.com',
            'nomor_telepon' => '081298765432',
            'alamat' => 'Sidoarjo',
            'status' => 'aktif'
        ],
    ];

    public function index()
    {
        $members = $this->members;
        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(StoreMemberRequest $request)
    {
        $validated = $request->validated();

        return redirect()->route('members.index')
            ->with('success', "Anggota \"{$validated['nama']}\" berhasil ditambahkan (data dummy).");
    }

    public function show(string $id)
    {
        return "MemberController@show, id: {$id}";
    }

    public function edit(string $id)
    {
        return "MemberController@edit, id: {$id}";
    }

    public function update(Request $request, string $id)
    {
        return "MemberController@update, id: {$id}";
    }

    public function destroy(string $id)
    {
        return "MemberController@destroy, id: {$id}";
    }
}