<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#191919] flex justify-center items-center h-screen">
    <div class="bg-[#f1f0e8] w-96 rounded-lg shadow-lg p-8">
        <h2 class="text-center text-gray-500 font-semibold text-lg mb-4">Reset Password</h2>

        <!-- Informasi reset password -->
        <p class="text-gray-600 text-sm mb-4 text-center">Masukkan email Anda untuk menerima tautan reset password.</p>

        <!-- Form reset password -->
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-4">
                <div class="relative">
                    <input type="email" name="email" placeholder="Email" required
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

            <button
                class="w-full bg-[#493628] text-white py-2 rounded-lg font-semibold hover:bg-[#AF8F6F] transition-all">
                Kirim Tautan Reset
            </button>
        </form>

        <!-- Footer links -->
        <div class="flex justify-between mt-6 text-sm text-gray-600">
            <a href="/login" class="hover:underline">Kembali ke Login</a>
            <a href="/register" class="hover:underline">Buat akun baru</a>
        </div>
    </div>
</body>

</html>