<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Gaji;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    $pengajuans = Pengajuan::all();
    $gajis = Gaji::orderBy('tanggal_gajian', 'desc')->get();
    return view('dashboard', compact('pengajuans', 'gajis'));
}
}