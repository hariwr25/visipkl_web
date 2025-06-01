<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Portal Registrasi</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-br from-blue-100 to-white min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-xl rounded-2xl p-10 w-full max-w-xl text-center border border-blue-200">
        <img src="{{ asset('images/tvrilogo.webp') }}" alt="Logo TVRI" class="w-24 mx-auto mb-6">

        <h1 class="text-3xl font-bold text-blue-700 mb-4">Portal Registrasi TVRI Yogyakarta</h1>
        <p class="text-gray-600 mb-8 text-sm">Silakan pilih jenis registrasi yang ingin Anda lakukan:</p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/pkl" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all duration-200 text-lg font-semibold">
                Pendaftaran PKL
            </a>
            <a href="/kunjungan" class="px-6 py-3 bg-emerald-500 text-white rounded-lg hover:bg-emerald-600 transition-all duration-200 text-lg font-semibold">
                Pendaftaran Kunjungan
            </a>
        </div>

        <footer class="mt-10 text-xs text-gray-400">
            &copy; {{ date('Y') }} TVRI Yogyakarta – New Media Division
        </footer>
    </div>

</body>
</html>
