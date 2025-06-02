@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold mb-6">Admin Dashboard</h1>

                    {{-- Tabel Pengajuan Admin --}}
                    <h2 class="text-xl font-semibold mb-4">Pengajuan Admin</h2>
                    <a href="{{ route('admin.pengajuan.index') }}" class="inline-block px-4 py-2 mb-4 bg-blue-600 text-white rounded hover:bg-blue-700">Kelola Pengajuan</a>
                    <div class="overflow-x-auto mb-8">
                        <table class="w-full border border-gray-200 dark:border-gray-600 mb-6">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200 border-b">Nama Acara</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200 border-b">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(\App\Models\Pengajuan::orderBy('created_at', 'desc')->take(5)->get() as $pengajuan)
                                    <tr class="border-b border-gray-200 dark:border-gray-600">
                                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">{{ $pengajuan->nama_acara }}</td>
                                        <td class="px-4 py-3 text-sm">
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
                                        </td>
                                    </tr>
                                @endforeach
                                @if(\App\Models\Pengajuan::count() == 0)
                                    <tr>
                                        <td colspan="2" class="px-4 py-3 text-sm text-gray-500 dark:text-gray-400 text-center">Belum ada pengajuan.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    {{-- Tabel Gaji Admin --}}
                    <h2 class="text-xl font-semibold mb-4">Gaji Admin</h2>
                    <a href="{{ route('admin.gaji.index') }}" class="inline-block px-4 py-2 mb-4 bg-green-600 text-white rounded hover:bg-green-700">Kelola Gaji</a>
                    <div class="overflow-x-auto">
                        <table class="w-full border border-gray-200 dark:border-gray-600">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200 border-b">Nominal Gaji</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200 border-b">Tanggal Gajian</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(\App\Models\Gaji::orderBy('tanggal_gajian', 'desc')->take(5)->get() as $gaji)
                                    <tr class="border-b border-gray-200 dark:border-gray-600">
                                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">{{ number_format($gaji->nominal, 2) }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">{{ $gaji->tanggal_gajian }}</td>
                                    </tr>
                                @endforeach
                                @if(\App\Models\Gaji::count() == 0)
                                    <tr>
                                        <td colspan="2" class="px-4 py-3 text-sm text-gray-500 dark:text-gray-400 text-center">Belum ada data gaji.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection