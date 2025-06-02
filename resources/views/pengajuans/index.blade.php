@extends('layouts.app')
@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6">{{ __('Daftar Pengajuan') }}</h1>
            @if (session('success'))
                <div
                    class="mb-4 p-4 bg-green-50 dark:bg-green-900/50 border border-green-200 dark:border-green-700 rounded-lg text-sm text-green-600 dark:text-green-400">
                    {{ session('success') }}
                </div>
            @endif
            <div class="mb-4">
                <a href="{{ route('pengajuan.create') }}"
                    class="inline-block px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 transition">{{ __('Tambah Pengajuan') }}</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full border border-gray-200 dark:border-gray-600">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200">
                                {{ __('Nama Acara') }}</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200">
                                {{ __('Apa Barang') }}</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200">
                                {{ __('Tanggal Pengajuan') }}</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200">
                                {{ __('Nominal Uang') }}</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200">
                                {{ __('Aksi') }}</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
                        @forelse ($pengajuans as $pengajuan)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">{{ $pengajuan->nama_acara }}
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">{{ $pengajuan->apa_barang }}
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                                    {{ $pengajuan->tanggal_pengajuan }}</td>
                                <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                                    {{ $pengajuan->nominal_uang ? number_format($pengajuan->nominal_uang, 2) : '-' }}</td>
                                <td class="px-4 py-3 text-sm">
                                    <div class="inline items-center space-x-2">
                                        <a href="{{ route('pengajuan.show', $pengajuan) }}"
                                            class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 dark:hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition"
                                            aria-label="{{ __('Detail Pengajuan') }}">
                                            {{ __('Detail') }}
                                        </a>
                                        <a href="{{ route('pengajuan.edit', $pengajuan) }}"
                                            class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-yellow-600 rounded-md hover:bg-yellow-700 dark:hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition"
                                            aria-label="{{ __('Edit Pengajuan') }}">
                                            {{ __('Edit') }}
                                        </a>
                                        <form action="{{ route('pengajuan.destroy', $pengajuan) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700 dark:hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition"
                                                onclick="return confirm('{{ __('Yakin ingin menghapus?') }}')"
                                                aria-label="{{ __('Hapus Pengajuan') }}">
                                                {{ __('Hapus') }}
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                                    {{ __('Belum ada pengajuan.') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
