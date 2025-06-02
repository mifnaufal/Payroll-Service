@extends('layouts.app')

@section('content')
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ __('Daftar Gaji') }}</h1>
                        <a href="{{ route('admin.gaji.create') }}"
                           class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-indigo-500 dark:hover:bg-indigo-600">
                            {{ __('Tambah Gaji') }}
                        </a>
                    </div>

                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-50 dark:bg-green-900/50 border border-green-200 dark:border-green-700 rounded-lg text-sm text-green-600 dark:text-green-400">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="w-full border border-gray-200 dark:border-gray-600">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200 border-b border-gray-200 dark:border-gray-600">{{ __('Nominal Gaji') }}</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200 border-b border-gray-200 dark:border-gray-600">{{ __('Tanggal Gajian') }}</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200 border-b border-gray-200 dark:border-gray-600">{{ __('Aksi') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gajis as $gaji)
                                    <tr class="border-b border-gray-200 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700/50">
                                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">{{ number_format($gaji->nominal, 2) }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">{{ $gaji->tanggal_gajian }}</td>
                                        <td class="px-4 py-3 text-sm">
                                            <a href="{{ route('admin.gaji.edit', $gaji) }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 mr-2">{{ __('Edit') }}</a>
                                            <form action="{{ route('admin.gaji.destroy', $gaji) }}" method="POST" class="inline-block" onsubmit="return confirm('{{ __('Yakin ingin menghapus?') }}')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300 ml-2">{{ __('Hapus') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                @if ($gajis->isEmpty())
                                    <tr>
                                        <td colspan="3" class="px-4 py-3 text-sm text-gray-500 dark:text-gray-400 text-center">{{ __('Belum ada data gaji.') }}</td>
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