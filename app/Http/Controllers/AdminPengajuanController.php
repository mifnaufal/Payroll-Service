<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class AdminPengajuanController extends Controller
{
    public function index()
    {
        $pengajuans = Pengajuan::all();
        return view('admin.pengajuan.index', compact('pengajuans'));
    }

    public function updateStatus(Request $request, Pengajuan $pengajuan)
    
    {
        if ($pengajuan->status) {
        if ($request->ajax()) {
            return response()->json(['success' => false, 'message' => 'Status sudah ditetapkan dan tidak bisa diubah.'], 403);
        }
        return redirect()->route(('admin.pengajuan.index'))->with('error', 'Status sudah ditetapkan dan tidak bisa diubah.');
        }

        $request->validate([
            'status' => 'required|in:Terima,Tolak',
        ]);

        $pengajuan->update([
            'status' => $request->status,
        ]);

        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }

        return redirect()->route('admin.pengajuan.index')->with('success', __('Status berhasil diperbarui.'));
    }
}