<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemilihan Ketua</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto py-10">
        <header class="text-center mb-8">
            <h6 class="text-4xl font-bold mb-2">Pemilihan Bakal Calon Ketua</h6>
            <h3 class="text-4xl font-bold mb-2">PUK SP LEM SPSI PT. IPPI</h3>
            <h6 class="text-4xl font-bold mb-2">PERIODE TAHUN 2025 - 2028</h6>
            <p class="text-lg">Masukkan ID Anda dan pilih calon ketua favorit Anda!</p>
        </header>

        @if(session('error'))
            <div class="bg-red-100 text-red-800 p-4 mb-4 rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 mb-4 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Form Section -->
            <div class="bg-white shadow-md rounded-lg p-6">
                @if(!$validatedUserId)
                    <h2 class="text-2xl font-semibold mb-4">Masukkan ID</h2>
                    <form action="{{ route('validate.user') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="user_id" class="block text-sm font-medium text-gray-700">User ID</label>
                            <input type="text" name="user_id" id="user_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                        </div>
                        <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700">Validasi</button>
                    </form>
                @else
                    <h2 class="text-2xl font-semibold mb-4">Formulir Pencalonan</h2>
                    <form action="{{ route('submit.vote') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $validatedUserId }}">
                        <div class="mb-4">
                            <label for="candidate_name" class="block text-sm font-medium text-gray-700">Nama Calon</label>
                            <input type="text" name="candidate_name" id="candidate_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                        </div>
                        <button type="submit" class="w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700">Ajukan Calon</button>
                    </form>
                @endif
            </div>

            <!-- Results Section -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-4">Hasil Pemilihan</h2>
                <ul class="divide-y divide-gray-200">
                    @forelse($candidates as $candidate)
                        <li class="py-4 flex items-center justify-between">
                            <span class="font-medium">{{ $candidate->name }}</span>
                            <span class="text-gray-500">{{ $candidate->votes }} votes</span>
                        </li>
                    @empty
                        <li class="py-4 text-gray-500">Belum ada calon yang diajukan.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
