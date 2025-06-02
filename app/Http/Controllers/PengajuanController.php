<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PengajuanController extends Controller
{
    public function index()
    {
        $pengajuans = Pengajuan::all();
        return view('pengajuans.index', compact('pengajuans'));
    }

    public function create()
    {
        return view('pengajuans.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_acara' => 'required|string|max:255',
            'apa_barang' => 'required|string|max:255',
            'tanggal_pengajuan' => 'required|date',
            'nominal_uang' => 'nullable|numeric|max:999999.99|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Pengajuan::create($request->only(['nama_acara', 'apa_barang', 'tanggal_pengajuan', 'nominal_uang']));

        return redirect()->route('dashboard')->with('success', __('Pengajuan berhasil ditambahkan.'));
    }

    public function show(Pengajuan $pengajuan)
    {
        return view('pengajuans.show', compact('pengajuan'));
    }

    public function edit(Pengajuan $pengajuan)
    {
        return view('pengajuans.edit', compact('pengajuan'));
    }

    public function update(Request $request, Pengajuan $pengajuan)
    {
        $validator = Validator::make($request->all(), [
            'nama_acara' => 'required|string|max:255',
            'apa_barang' => 'required|string|max:255',
            'tanggal_pengajuan' => 'required|date',
            'nominal_uang' => 'nullable|numeric|max:999999.99|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $pengajuan->update($request->only(['nama_acara', 'apa_barang', 'tanggal_pengajuan', 'nominal_uang']));

        return redirect()->route('dashboard')->with('success', __('Pengajuan berhasil diperbarui.'));
    }

    public function destroy(Pengajuan $pengajuan)
    {
        $pengajuan->delete();
        return redirect()->route('dashboard')->with('success', __('Pengajuan berhasil dihapus.'));
    }
}