<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-r from-blue-50 to-white min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md border border-gray-200">
        <div class="flex flex-col items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Login Admin</h2>
            <p class="text-sm text-gray-500 mt-1">Silakan masuk untuk mengelola sistem</p>
        </div>

        {{-- Tampilkan pesan error jika ada --}}
        @if (session('error'))
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 text-sm">
                {{ session('error') }}
            </div>
        @endif

        {{-- Form Login --}}
        <form method="POST" action="{{ route('auth.login') }}" class="space-y-5">
            @csrf

            <div>
                <label for="username" class="block text-sm font-semibold mb-1 text-gray-700">Username</label>
                <input type="text" name="username" id="username" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition">
            </div>

            <div>
                <label for="password" class="block text-sm font-semibold mb-1 text-gray-700">Password</label>
                <input type="password" name="password" id="password" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition">
            </div>

            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-semibold transition duration-200">
                Login
            </button>
        </form>

        <p class="text-xs text-center text-gray-400 mt-6">
            &copy; {{ date('Y') }} SISFO SARPRAS. All rights reserved.
        </p>
    </div>

</body>
</html>
