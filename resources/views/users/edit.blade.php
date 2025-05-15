<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">

    <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow">
        <h1 class="text-2xl font-bold mb-4">Edit User</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('users.update', $user->id_user) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <input name="username" type="text" value="{{ old('username', $user->username) }}"
                   class="w-full border p-2 rounded" required>

            <input name="email" type="email" value="{{ old('email', $user->email) }}"
                   class="w-full border p-2 rounded" required>

            <input name="password" type="password" placeholder="Kosongkan jika tidak diubah"
                   class="w-full border p-2 rounded">

            <select name="role" class="w-full border p-2 rounded" required>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
            </select>

            <select name="class" class="w-full border p-2 rounded" required>
                @foreach (['X', 'XI', 'XII'] as $kelas)
                    <option value="{{ $kelas }}" {{ $user->class == $kelas ? 'selected' : '' }}>{{ $kelas }}</option>
                @endforeach
            </select>

            <select name="major" class="w-full border p-2 rounded" required>
                @foreach (['RPL', 'TJKT', 'PSPT', 'ANIMASI', 'TE'] as $jurusan)
                    <option value="{{ $jurusan }}" {{ $user->major == $jurusan ? 'selected' : '' }}>{{ $jurusan }}</option>
                @endforeach
            </select>

            <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">Update</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

</body>
</html>
