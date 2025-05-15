<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-6">Login Admin</h2>

        {{-- Tampilkan pesan error jika ada --}}
        @if (session('error'))
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        {{-- Form Login --}}
        <form method="POST" action="{{ route('auth.login') }}">
            @csrf

            <div class="mb-4">
                <label for="username" class="block text-sm font-semibold mb-1">Username</label>
                <input type="text" name="username" id="username" required
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-400">
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-semibold mb-1">Password</label>
                <input type="password" name="password" id="password" required
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-400">
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition duration-200 font-semibold">
                Login
            </button>
        </form>
    </div>

</body>
</html>
1