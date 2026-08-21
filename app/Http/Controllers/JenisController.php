<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $jenis = Jenis::withCount('produk')
            ->when($search, function ($query) use ($search) {
                $query->where('nama_jenis', 'like', "%{$search}%");
            })
            ->orderBy('nama_jenis')
            ->paginate(10)
            ->withQueryString();

        return view('jenis.index', compact('jenis'));
    }

    public function create()
    {
        return view('jenis.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_jenis' => 'required|string|max:255|unique:jenis,nama_jenis',
        ]);

        Jenis::create($validated);

        return redirect()->route('jenis.index')->with('success', 'Jenis berhasil ditambahkan.');
    }

    public function edit(Jenis $jenis)
    {
        return view('jenis.edit', compact('jenis'));
    }

    public function update(Request $request, Jenis $jenis)
    {
        $validated = $request->validate([
            'nama_jenis' => 'required|string|max:255|unique:jenis,nama_jenis,' . $jenis->id,
        ]);

        $jenis->update($validated);

        return redirect()->route('jenis.index')->with('success', 'Jenis berhasil diperbarui.');
    }

    public function destroy(Jenis $jenis)
    {
        $jenis->delete();

        return redirect()->route('jenis.index')->with('success', 'Jenis berhasil dihapus.');
    }
}