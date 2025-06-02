@extends('layouts.app')

@section('content')
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6">{{ __('Edit Gaji') }}</h1>

                    <form action="{{ route('admin.gaji.update', $gaji) }}" method="POST" class="max-w-md">
                        @csrf
                        @method('PUT')

                        <!-- Nominal Gaji -->
                        <div class="mb-4">
                            <label for="nominal" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">{{ __('Nominal Gaji') }}</label>
                            <input type="number" name="nominal" id="nominal" class="w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 text-gray-900 dark:text-gray-100 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400" value="{{ old('nominal', $gaji->nominal) }}" required>
                            @error('nominal')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tanggal Gajian -->
                        <div class="mb-6">
                            <label for="tanggal_gajian" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">{{ __('Tanggal Gajian') }}</label>
                            <input type="date" name="tanggal_gajian" id="tanggal_gajian" class="w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 text-gray-900 dark:text-gray-100 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400" value="{{ old('tanggal_gajian', \Illuminate\Support\Carbon::parse($gaji->tanggal_gajian)->format('Y-m-d')) }}" required>
                            @error('tanggal_gajian')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tombol -->
                        <div class="flex items-center space-x-3">
                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-indigo-500 dark:hover:bg-indigo-600">
                                {{ __('Update') }}
                            </button>
                            <a href="{{ route('admin.gaji.index') }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300">{{ __('Batal') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection