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

        <h2 class="text-center text-gray-500 font-semibold text-lg mb-4">Daftar dengan</h2>

        <!-- Sosial Media Login -->
        <div class="flex justify-center mb-6">
            <button type="button"
                class="w-1/2 ml-2 bg-[#ADD8E6] text-[#FFF5D7] border border-gray-300 rounded-lg px-4 py-2 flex items-center justify-center hover:bg-[#92C1D9] transition">
                <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path fill="#EA4335"
                        d="M12 10.2v3.84h5.45c-.24 1.25-.98 2.31-2.09 3.02l3.36 2.61c1.96-1.8 3.28-4.44 3.28-7.63 0-.95-.1-1.87-.27-2.76H12z" />
                    <path fill="#4285F4"
                        d="M12 22c2.76 0 5.09-.92 6.79-2.49l-3.36-2.61c-.9.61-2.04.97-3.43.97-2.64 0-4.86-1.78-5.65-4.19H3.31v2.64C4.88 19.84 8.19 22 12 22z" />
                    <path fill="#FBBC04"
                        d="M6.35 13.68a5.86 5.86 0 010-3.39V7.65H3.31a9.96 9.96 0 000 8.7l3.04-2.67z" />
                    <path fill="#34A853"
                        d="M12 4.85c1.52 0 2.89.52 3.97 1.53l2.98-2.98C16.93 2.04 14.63 1 12 1 8.19 1 4.88 3.16 3.31 6.48l3.04 2.64C7.14 6.63 9.36 4.85 12 4.85z" />
                    <path fill="none" d="M0 0h24v24H0z" />
                </svg>
                Google
            </button>
        </div>

        <!-- Pembatas -->
        <div class="flex items-center my-6">
            <div class="flex-1 h-px bg-gray-300"></div>
            <p class="text-gray-500 mx-4 whitespace-nowrap text-sm">Atau daftar dengan akun</p>
            <div class="flex-1 h-px bg-gray-300"></div>
        </div>

        <!-- Form Registrasi -->
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <input type="text" name="name" placeholder="Nama" value="{{ old('name') }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <select name="role" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    <option value="" disabled selected>Pilih Role</option>
                    <option value="user" >User</option>
                    <option value="staff" >Staff</option>
                    <option value="editor">Editor</option>
                </select>
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
