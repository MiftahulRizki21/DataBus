<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" type="x-icon" href="..\startbootstrap-sb-admin-master\dist\assets\img\logoweb.png">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
    .logo {
        width: 120px;
        position: relative;
        top: 0px; /* Adjusted to align visually */
    }
</style>

<body class="bg-[#f4f7fc] flex justify-center items-center h-screen">
    <div class="flex flex-col items-center">
        <!-- Logo Section -->
        <div class="logo mb-6">
            <a href="/"><img src="../startbootstrap-sb-admin-master/dist/assets/img/logoweb.png" alt="Logo" class="w-36"></a>
        </div>
    <div class="bg-[#ffffff] w-96 rounded-lg shadow-lg p-8">
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

        <!-- Tampilkan pesan status jika ada -->
        @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('status') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('error') }}
            </div>
        @endif
        <!-- Sign in with social media -->
        <h2 class="text-center text-gray-500 font-semibold text-lg mb-4">Masuk dengan</h2>
        {{-- <div class="flex justify-center mb-6">
            <a href="{{ route('auth.google') }}" class="w-1/2">
                <button type="button"
                    class="w-full bg-[#493628] text-[#FFF5D7] border border-gray-300 rounded-lg px-4 py-2 flex items-center justify-center hover:bg-[#AF8F6F] transition">
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
            </a>
        </div> --}}

        <!-- Divider -->
        <div class="flex items-center my-6">
            <div class="flex-1 h-px bg-gray-300"></div>
            <p class="text-gray-500 mx-4 whitespace-nowrap text-sm">Atau masuk dengan akun</p>
            <div class="flex-1 h-px bg-gray-300"></div>
        </div>

        <!-- Sign in with credentials -->
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <div class="relative">
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required
                        class="w-full px-4 py-2 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M2.94 6.94L10 11.69l7.06-4.75a1 1 0 00-1.12-1.66l-5.94 4L4.06 5.28a1 1 0 00-1.12 1.66z" />
                        <path d="M10 12.69l-7-4.72v7a1 1 0 001 1h12a1 1 0 001-1v-7l-7 4.72z" />
                    </svg>
                </div>
            </div>

            <div class="mb-4">
                <div class="relative">
                    <input type="password" name="password" placeholder="Password" required
                        class="w-full px-4 py-2 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M8.5 12.5a2.5 2.5 0 115 0 2.5 2.5 0 01-5 0z" />
                        <path
                            d="M17 8h-1V6a6 6 0 00-12 0v2H3a1 1 0 00-1 1v8a1 1 0 001 1h14a1 1 0 001-1V9a1 1 0 00-1-1zm-3 0H6V6a4 4 0 018 0v2z" />
                    </svg>
                </div>
            </div>

            <!-- Remember Me Checkbox -->
            <div class="mb-4 flex items-center">
                <input type="checkbox" name="remember" id="remember" class="mr-2">
                <label for="remember" class="text-sm text-gray-600">Ingat Saya</label>
            </div>

            <button type="submit"
                class="w-full bg-[#002855] text-white py-2 rounded-lg font-semibold hover:bg-[#004c99] transition-all">
                Login
            </button>
        </form>

        <!-- Footer links -->
        <div class="flex justify-between mt-6 text-sm text-gray-600">
            <a href="{{ route('password.request') }}" class="hover:underline">Lupa password?</a>
            <a href="{{ route('register') }}" class="hover:underline">Buat akun baru</a>
        </div>
    </div>
</body>

</html>
