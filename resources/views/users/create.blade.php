<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">

    <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow">
        <h1 class="text-2xl font-bold mb-4">Tambah User</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('users') }}" method="POST" class="space-y-4">
            @csrf
            <input name="username" type="text" placeholder="Username" value="{{ old('username') }}"
                   class="w-full border p-2 rounded" required>

            <input name="email" type="email" placeholder="Email" value="{{ old('email') }}"
                   class="w-full border p-2 rounded" required>

            <input name="password" type="password" placeholder="Password"
                   class="w-full border p-2 rounded" required>

            <select name="role" class="w-full border p-2 rounded" required>
                <option value="">-- Pilih Role --</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>

            <select name="class" class="w-full border p-2 rounded" required>
                <option value="">-- Pilih Kelas --</option>
                @foreach (['X', 'XI', 'XII'] as $kelas)
                    <option value="{{ $kelas }}">{{ $kelas }}</option>
                @endforeach
            </select>

            <select name="major" class="w-full border p-2 rounded" required>
                <option value="">-- Pilih Jurusan --</option>
                @foreach (['RPL', 'TJKT', 'PSPT', 'ANIMASI', 'TE'] as $jurusan)
                    <option value="{{ $jurusan }}">{{ $jurusan }}</option>
                @endforeach
            </select>

            <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

</body>
</html>
