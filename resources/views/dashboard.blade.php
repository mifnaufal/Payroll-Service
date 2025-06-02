@extends('layouts.app')
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6">{{ __('Daftar Pengajuan') }}</h1>

                    @if (session('success'))
                        <div
                            class="mb-4 p-4 bg-green-50 dark:bg-green-900/50 border border-green-200 dark:border-green-700 rounded-lg text-sm text-green-600 dark:text-green-400">
                            {{ session('success') }}
                        </div>
                    @endif
                    <a href="{{ route('pengajuan.index') }}"
                        class="inline-block px-4 py-2 mb-4 bg-blue-600 text-white rounded hover:bg-blue-700">Kelola
                        Pengajuan</a>
                    <div class="overflow-x-auto">
                        <table class="w-full border border-gray-200 dark:border-gray-600">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th
                                        class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200 border-b border-gray-200 dark:border-gray-600">
                                        {{ __('Nama Acara') }}</th>
                                    <th
                                        class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200 border-b border-gray-200 dark:border-gray-600">
                                        {{ __('Apa Barang') }}</th>
                                    <th
                                        class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200 border-b border-gray-200 dark:border-gray-600">
                                        {{ __('Tanggal Pengajuan') }}</th>
                                    <th
                                        class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200 border-b border-gray-200 dark:border-gray-600">
                                        {{ __('Nominal Uang') }}</th>
                                    <th
                                        class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200 border-b border-gray-200 dark:border-gray-600">
                                        {{ __('Status') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengajuans as $pengajuan)
                                    <tr class="border-b border-gray-200 dark:border-gray-600">
                                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                                            {{ $pengajuan->nama_acara }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                                            {{ $pengajuan->apa_barang }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                                            {{ $pengajuan->tanggal_pengajuan }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                                            {{ $pengajuan->nominal_uang ? number_format($pengajuan->nominal_uang, 2) : '-' }}
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            @if ($pengajuan->status)
                                                <span
                                                    class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                        {{ $pengajuan->status === 'Terima' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300' }}">
                                                    {{ $pengajuan->status }}
                                                </span>
                                            @else
                                                <span
                                                    class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-gray-200 text-gray-700 dark:bg-gray-700 dark:text-gray-300">
                                                    Belum diproses
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                @if ($pengajuans->isEmpty())
                                    <tr>
                                        <td colspan="5"
                                            class="px-4 py-3 text-sm text-gray-500 dark:text-gray-400 text-center">
                                            {{ __('Belum ada pengajuan.') }}</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <h2 class="text-xl font-bold text-gray-900 dark:text-gray-100 mt-10 mb-4">Daftar Gaji</h2>
                        <a href="{{ route('gaji.index') }}"
                            class="inline-block px-4 py-2 mb-4 bg-green-600 text-white rounded hover:bg-green-700">Kelola
                            Gaji</a>
                        <div class="overflow-x-auto">
                            <table class="w-full border border-gray-200 dark:border-gray-600">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th
                                            class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200 border-b">
                                            Nominal Gaji</th>
                                        <th
                                            class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200 border-b">
                                            Tanggal Gajian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($gajis as $gaji)
                                        <tr class="border-b border-gray-200 dark:border-gray-600">
                                            <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                                                {{ number_format($gaji->nominal, 2) }}</td>
                                            <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                                                {{ $gaji->tanggal_gajian }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2"
                                                class="px-4 py-3 text-sm text-gray-500 dark:text-gray-400 text-center">Belum
                                                ada data gaji.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
