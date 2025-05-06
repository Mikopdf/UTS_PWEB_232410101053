@extends('layouts.app')

@section('title', 'Pengelolaan')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="bg-white shadow rounded-lg mb-6">
        <div class="flex justify-between items-center bg-blue-600 text-white px-6 py-4 rounded-t-lg">
            <h2 class="text-lg font-semibold">Pengelolaan Data Boss</h2>
            <span class="text-sm">Logged in as: {{ session('username') }}</span>
        </div>
        <div class="p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($products as $item)
            <div class="bg-white border rounded-lg shadow hover:shadow-md transition duration-300 flex flex-col">
                <img src="{{ asset($item['gambar']) }}" alt="{{ $item['nama'] }}" class="rounded-t-lg h-48 object-cover">
                <div class="p-4 flex flex-col justify-between flex-grow">
                    <h3 class="text-lg font-bold mb-2">{{ $item['nama'] }}</h3>
                    <p class="text-gray-600 line-clamp-2">{{ $item['deskripsi_singkat'] }}</p>
                    <div class="flex justify-between items-center mt-4">
                        <span class="text-sm text-gray-500">ID: {{ $item['id'] }}</span>
                        <button
                            class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm"
                            onclick="openModal('{{ $item['nama'] }}', '{{ asset($item['gambar']) }}', '{{ asset($item['gambar_tambahan']) }}', `{{ $item['deskripsi_panjang'] }}`)">
                            View
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


<div id="detailModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg shadow-lg max-w-md w-full relative overflow-hidden">
        <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-500 hover:text-red-500 text-xl">&times;</button>

        <img id="modalMainImage" src="" alt="Gambar Utama" class="w-full h-64 object-cover rounded-t-lg">

        <img id="modalExtraImage" src="" alt="Gambar Tambahan" class="w-full h-48 object-cover mt-2 px-2 rounded">

        <div class="p-4 h-48 overflow-auto">
            <h3 id="modalTitle" class="text-xl font-semibold mb-2"></h3>
            <p id="modalDescription" class="text-gray-700"></p>
        </div>
    </div>
</div>

<script>
    function openModal(title, mainImage, extraImage, description) {
        document.getElementById('modalTitle').innerText = title;
        document.getElementById('modalMainImage').src = mainImage;
        document.getElementById('modalExtraImage').src = extraImage;
        document.getElementById('modalDescription').innerText = description;
        document.getElementById('detailModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('detailModal').classList.add('hidden');
    }
</script>
@endsection
