<?php

namespace App\Http\Controllers;

use App\Models\Studio;
use Illuminate\Http\Request;

class StudioController extends Controller
{
    public function index()
    {
        $studios = Studio::latest()->paginate(10);
        return view('studios.index', compact('studios'));
    }

    public function create()
    {
        return view('studios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price_per_hour' => 'required|numeric',
            'description' => 'required|string',
        ]);

        Studio::create($request->all());

        return redirect()->route('studios.index')->with('success', 'Studio berhasil ditambahkan!');
    }

    public function edit(Studio $studio)
    {
        return view('studios.edit', compact('studio'));
    }

    public function update(Request $request, Studio $studio)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price_per_hour' => 'required|numeric',
            'description' => 'required|string',
        ]);

        $studio->update($request->all());

        return redirect()->route('studios.index')->with('success', 'Studio berhasil diperbarui!');
    }

    public function destroy(Studio $studio)
    {
        $studio->delete();

        return redirect()->route('studios.index')->with('success', 'Studio berhasil dihapus!');
    }
}