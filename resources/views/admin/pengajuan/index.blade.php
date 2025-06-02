@extends('layouts.app')
@section('content')
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-50 dark:bg-green-900/50 border border-green-200 dark:border-green-700 rounded-lg text-sm text-green-600 dark:text-green-400">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="mb-4 p-4 bg-red-50 dark:bg-red-900/50 border border-red-200 dark:border-red-700 rounded-lg text-sm text-red-600 dark:text-red-400">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="overflow-x-auto">
                        <table class="w-full border border-gray-200 dark:border-gray-600">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200 border-b border-gray-200 dark:border-gray-600">{{ __('Nama Acara') }}</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200 border-b border-gray-200 dark:border-gray-600">{{ __('Apa Barang') }}</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200 border-b border-gray-200 dark:border-gray-600">{{ __('Tanggal Pengajuan') }}</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200 border-b border-gray-200 dark:border-gray-600">{{ __('Nominal Uang') }}</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200 border-b border-gray-200 dark:border-gray-600">{{ __('Status') }}</th>
                                    @if (auth()->check() && auth()->user()->role !== 'admin')
                                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200 border-b border-gray-200 dark:border-gray-600">{{ __('Aksi') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengajuans as $pengajuan)
                                    <tr class="border-b border-gray-200 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700/50">
                                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">{{ $pengajuan->nama_acara }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">{{ $pengajuan->apa_barang }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">{{ $pengajuan->tanggal_pengajuan }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">{{ $pengajuan->nominal_uang ? number_format($pengajuan->nominal_uang, 2) : '-' }}</td>
                                        <td class="px-4 py-3 text-sm">
                                            @if ($pengajuan->status)
                                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $pengajuan->status === 'Terima' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300' }}">
                                                    {{ $pengajuan->status }}
                                                </span>
                                            @else
                                                <div class="flex space-x-2">
                                                    <form action="{{ route('admin.pengajuan.updateStatus', $pengajuan) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="status" value="Terima">
                                                        <button type="submit" class="inline-flex items-center px-3 py-1 border border-transparent text-xs font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 dark:bg-green-500 dark:hover:bg-green-600">
                                                            {{ __('Terima') }}
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('admin.pengajuan.updateStatus', $pengajuan) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="status" value="Tolak">
                                                        <button type="submit" class="inline-flex items-center px-3 py-1 border border-transparent text-xs font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 dark:bg-red-500 dark:hover:bg-red-600">
                                                            {{ __('Tolak') }}
                                                        </button>
                                                    </form>
                                                </div>
                                            @endif
                                        </td>
                                        @if (auth()->check() && auth()->user()->role !== 'admin')
                                            <td class="px-4 py-3 text-sm">
                                                <a href="{{ route('admin.pengajuan.show', $pengajuan) }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 mr-2">{{ __('Detail') }}</a>
                                                <a href="{{ route('admin.pengajuan.edit', $pengajuan) }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 mr-2">{{ __('Edit') }}</a>
                                                <form action="{{ route('admin.pengajuan.destroy', $pengajuan) }}" method="POST" class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('{{ __('Yakin ingin menghapus?') }}')" class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300">{{ __('Hapus') }}</button>
                                                </form>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                                @if ($pengajuans->isEmpty())
                                    <tr>
                                        <td colspan="{{ auth()->check() && auth()->user()->role !== 'admin' ? 6 : 5 }}" class="px-4 py-3 text-sm text-gray-500 dark:text-gray-400 text-center">{{ __('Belum ada pengajuan.') }}</td>
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