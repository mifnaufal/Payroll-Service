@extends('layouts.app') 
@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-8">Detail Pengajuan</h1>

        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl p-8 w-full">
            <h5 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-6">{{ $pengajuan->nama_acara }}</h5>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <p class="text-base text-gray-700 dark:text-gray-200"><strong>Apa Barang:</strong> {{ $pengajuan->apa_barang }}</p>
                <p class="text-base text-gray-700 dark:text-gray-200"><strong>Tanggal Pengajuan:</strong> {{ $pengajuan->tanggal_pengajuan }}</p>
                <p class="text-base text-gray-700 dark:text-gray-200"><strong>Nominal Uang:</strong> {{ $pengajuan->nominal_uang ? number_format($pengajuan->nominal_uang, 2) : '-' }}</p>
                <p class="text-base text-gray-700 dark:text-gray-200">
                    <strong>Status:</strong>
                    @if ($pengajuan->status)
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                            {{ $pengajuan->status === 'Terima' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300' }}">
                            {{ $pengajuan->status }}
                        </span>
                    @else
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-gray-200 text-gray-700 dark:bg-gray-700 dark:text-gray-300">
                            Belum diproses
                        </span>
                    @endif
                </p>
            </div>
            <div class="mt-8 flex items-center space-x-4">
                <a href="{{ route('pengajuan.index') }}" class="px-6 py-3 text-base font-medium text-gray-700 dark:text-gray-200 bg-gray-200 dark:bg-gray-700 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition">Kembali</a>
                <a href="{{ route('pengajuan.edit', $pengajuan) }}" class="px-6 py-3 text-base font-medium text-white bg-yellow-600 rounded-lg hover:bg-yellow-700 transition">Edit</a>
            </div>
        </div>
    </div>
@endsection