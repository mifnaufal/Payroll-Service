@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Tambah Gaji</h1>
    <form action="{{ route('admin.gaji.store') }}" method="POST" class="max-w-md">
        @csrf
        <div class="mb-4">
            <label class="block mb-1">Nominal Gaji</label>
            <input type="number" name="nominal" class="w-full border rounded px-2 py-1" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Tanggal Gajian</label>
            <input type="date" name="tanggal_gajian" class="w-full border rounded px-2 py-1" required>
        </div>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
        <a href="{{ route('admin.gaji.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
@endsection