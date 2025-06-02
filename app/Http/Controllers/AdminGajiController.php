<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use App\Models\Gaji;

class AdminGajiController extends Controller
{
    public function index()
    {
        $gajis = Gaji::orderBy('tanggal_gajian', 'desc')->get();
        return view('admin.gaji.index', compact('gajis'));
    }

    public function create()
    {
        return view('admin.gaji.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nominal' => 'required|numeric|min:0',
            'tanggal_gajian' => 'required|date',
        ]);
        Gaji::create($request->only('nominal', 'tanggal_gajian'));
        return redirect()->route('admin.gaji.index')->with('success', 'Gaji berhasil ditambahkan.');
    }

    public function edit(Gaji $gaji)
    {
        return view('admin.gaji.edit', compact('gaji'));
    }

    public function update(Request $request, Gaji $gaji)
    {
        $request->validate([
            'nominal' => 'required|numeric|min:0',
            'tanggal_gajian' => 'required|date',
        ]);
        $gaji->update($request->only('nominal', 'tanggal_gajian'));
        return redirect()->route('admin.gaji.index')->with('success', 'Gaji berhasil diupdate.');
    }

    public function destroy(Gaji $gaji)
    {
        $gaji->delete();
        return redirect()->route('admin.gaji.index')->with('success', 'Gaji berhasil dihapus.');
    }
}