@extends('layouts.app')
@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="max-w-md mx-auto">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6">Tambah Pengajuan</h1>

            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-50 dark:bg-red-900/50 border border-red-200 dark:border-red-700 rounded-lg">
                    <ul class="list-disc list-inside text-sm text-red-600 dark:text-red-400">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pengajuan.store') }}" method="POST" class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                @csrf

                <!-- Nama Acara -->
                <div class="mb-5">
                    <x-input-label for="nama_acara" :value="__('Nama Acara')" class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-1.5 transition-colors duration-200" />
                    <x-text-input 
                        id="nama_acara" 
                        class="block mt-1 w-full rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-100 py-2.5 px-3 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500" 
                        type="text" 
                        name="nama_acara" 
                        :value="old('nama_acara')" 
                        required 
                    />
                    <x-input-error :messages="$errors->get('nama_acara')" class="mt-2 text-xs text-red-600 dark:text-red-400 font-medium" />
                </div>

                <!-- Apa Barang -->
                <div class="mb-5">
                    <x-input-label for="apa_barang" :value="__('Nama Barang')" class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-1.5 transition-colors duration-200" />
                    <x-text-input 
                        id="apa_barang" 
                        class="block mt-1 w-full rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-100 py-2.5 px-3 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500" 
                        type="text" 
                        name="apa_barang" 
                        :value="old('apa_barang')" 
                        required 
                    />
                    <x-input-error :messages="$errors->get('apa_barang')" class="mt-2 text-xs text-red-600 dark:text-red-400 font-medium" />
                </div>

                <!-- Tanggal Pengajuan -->
                <div class="mb-5">
                    <x-input-label for="tanggal_pengajuan" :value="__('Tanggal Pengajuan')" class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-1.5 transition-colors duration-200" />
                    <x-text-input 
                        id="tanggal_pengajuan" 
                        class="block mt-1 w-full rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-100 py-2.5 px-3 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500" 
                        type="date" 
                        name="tanggal_pengajuan" 
                        :value="old('tanggal_pengajuan')" 
                        required 
                    />
                    <x-input-error :messages="$errors->get('tanggal_pengajuan')" class="mt-2 text-xs text-red-600 dark:text-red-400 font-medium" />
                </div>

                <!-- Nominal Uang -->
                <div class="mb-5">
                    <x-input-label for="nominal_uang" :value="__('Nominal Uang (opsional)')" class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-1.5 transition-colors duration-200" />
                    <x-text-input 
                        id="nominal_uang" 
                        class="block mt-1 w-full rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-100 py-2.5 px-3 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500" 
                        type="number" 
                        name="nominal_uang" 
                        :value="old('nominal_uang')" 
                        step="0.01" 
                    />
                    <x-input-error :messages="$errors->get('nominal_uang')" class="mt-2 text-xs text-red-600 dark:text-red-400 font-medium" />
                </div>

                <!-- Buttons -->
                <div class="flex items-center justify-end space-x-3">
                    <a href="{{ route('pengajuan.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 bg-gray-200 dark:bg-gray-700 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600 transition">Kembali</a>
                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 transition">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection