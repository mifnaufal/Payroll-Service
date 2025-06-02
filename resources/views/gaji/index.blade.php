@extends('layouts.app')

@section('content')
    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ __('Daftar Gaji') }}</h1>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full border border-gray-200 dark:border-gray-600">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200 border-b border-gray-200 dark:border-gray-600">{{ __('Nominal Gaji') }}</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200 border-b border-gray-200 dark:border-gray-600">{{ __('Tanggal Gajian') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($gajis as $gaji)
                                <tr class="border-b border-gray-200 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700/50">
                                    <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">{{ number_format($gaji->nominal, 2) }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">{{ $gaji->tanggal_gajian }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="px-4 py-3 text-sm text-gray-500 dark:text-gray-400 text-center">{{ __('Belum ada data gaji.') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection