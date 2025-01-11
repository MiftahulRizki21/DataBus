    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="shortcut icon" type="x-icon" href="..\startbootstrap-sb-admin-master\dist\assets\img\logoweb.png">

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <style>
        .logo {
            width: 120px;
            position: relative;
            top: 120px; /* Adjusted to align visually */
        }
    </style>

    <body class="bg-[#f4f7fc] flex justify-center items-center h-screen overflow-auto">
        <div class="flex flex-col items-center">
            <!-- Logo Section -->
            <div class="logo mb-6">
                <a href="/"><img src="../startbootstrap-sb-admin-master/dist/assets/img/logoweb.png" alt="Logo" class="w-36"></a>
            </div>
        <div class="bg-[#ffffff] w-96 rounded-lg shadow-lg p-8" style="margin-top: 120px;">
            <!-- Tampilkan pesan error jika ada -->
            @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <h2 class="text-center text-gray-500 font-semibold text-lg mb-4">Daftar | Editor</h2>

            

            
            <!-- Form Registrasi -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-4">
                    <input type="text" name="name" placeholder="Nama" value="{{ old('name') }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <input type="text" name="role" placeholder="Editor" value="editor" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" readonly>
                </div>
                <div class="mb-4">
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <input type="password" name="password" placeholder="Password" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
                <button type="submit"
                    class="w-full bg-[#002855] text-white py-2 rounded-lg font-semibold hover:bg-[#004c99] transition-all">
                    Register
                </button>
            </form>

            <!-- Footer links -->
            <div class="flex justify-between mt-6 text-sm text-gray-600">
                <a href="/login" class="hover:underline">Sudah punya akun?</a>
            </div>
        </div>
    </body>
