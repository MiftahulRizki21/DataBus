<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#191919] flex justify-center items-center h-screen">
    <div class="bg-[#f1f0e8] w-96 rounded-lg shadow-lg p-8">
        <!-- Sign in with social media -->
        <h2 class="text-center text-gray-500 font-semibold text-lg mb-4">Masuk dengan</h2>
        <div class="flex justify-between mb-6">
            <button type="button"
                class="w-1/2 mr-2 bg-[#493628] text-[#FFF5D7] border border-gray-300 rounded-lg px-4 py-2 flex items-center justify-center hover:bg-[#AF8F6F] transition">
                <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                    aria-label="GitHub">
                    <path
                        d="M12 0C5.372 0 0 5.372 0 12c0 5.302 3.438 9.8 8.207 11.387.6.111.793-.261.793-.577 0-.285-.01-1.04-.016-2.042-3.338.726-4.042-1.416-4.042-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.09-.745.083-.73.083-.73 1.205.085 1.838 1.236 1.838 1.236 1.07 1.835 2.807 1.304 3.492.997.107-.774.418-1.305.761-1.605-2.665-.305-5.467-1.334-5.467-5.934 0-1.311.469-2.382 1.236-3.222-.123-.305-.536-1.527.117-3.176 0 0 1.008-.323 3.3 1.23a11.51 11.51 0 013-.404c1.02.004 2.042.137 3 .404 2.292-1.553 3.3-1.23 3.3-1.23.653 1.649.24 2.871.118 3.176.77.84 1.236 1.911 1.236 3.222 0 4.61-2.806 5.625-5.478 5.92.43.372.815 1.102.815 2.222 0 1.606-.015 2.897-.015 3.293 0 .319.192.694.801.576C20.565 21.796 24 17.302 24 12c0-6.628-5.372-12-12-12z" />
                </svg>
                GitHub
            </button>
            <button type="button"
                class="w-1/2 ml-2 bg-[#493628] text-[#FFF5D7] border border-gray-300 rounded-lg px-4 py-2 flex items-center justify-center hover:bg-[#AF8F6F] transition">
                <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-label="Google">
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

        <!-- Divider -->
        <div class="flex items-center my-6">
            <div class="flex-1 h-px bg-gray-300"></div>
            <p class="text-gray-500 mx-4 whitespace-nowrap text-sm">Atau masuk dengan akun</p>
            <div class="flex-1 h-px bg-gray-300"></div>
        </div>

        <!-- Sign in with credentials -->
        <form method="POST" action="{{ route('beranda') }}">
            <div class="mb-4">
                <div class="relative">
                    <input type="email" placeholder="Email" required
                        class="w-full px-4 py-2 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        aria-label="Email Icon">
                        <path
                            d="M2.94 6.94L10 11.69l7.06-4.75a1 1 0 00-1.12-1.66l-5.94 4L4.06 5.28a1 1 0 00-1.12 1.66z" />
                        <path d="M10 12.69l-7-4.72v7a1 1 0 001 1h12a1 1 0 001-1v-7l-7 4.72z" />
                    </svg>
                </div>
            </div>
            <div class="mb-4">
                <div class="relative">
                    <input type="password" placeholder="Password" required
                        class="w-full px-4 py-2 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        aria-label="Password Icon">
                        <path d="M8.5 12.5a2.5 2.5 0 115 0 2.5 2.5 0 01-5 0z" />
                        <path
                            d="M17 8h-1V6a6 6 0 00-12 0v2H3a1 1 0 00-1 1v8a1 1 0 001 1h14a1 1 0 001-1V9a1 1 0 00-1-1zm-3 0H6V6a4 4 0 018 0v2z" />
                    </svg>
                </div>
            </div>

            <button
                class="w-full bg-[#493628] text-white py-2 rounded-lg font-semibold hover:bg-[#AF8F6F] transition-all">
                {{ __('Login') }}
            </button>
        </form>

        <!-- Footer links -->
        <div class="flex justify-between mt-6 text-sm text-gray-600">
            <a href="/password/reset" class="hover:underline">Lupa password?</a>
            <a href="/register" class="hover:underline">Buat akun baru</a>
        </div>
    </div>
</body>

</html>