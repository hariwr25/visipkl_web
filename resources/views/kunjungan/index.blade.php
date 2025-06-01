<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Kunjungan Industri TVRI Yogyakarta</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .slide {
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 100%;
      opacity: 0;
      transition: opacity 0.7s ease-in-out;
      pointer-events: none;
      border-radius: 1rem;
    }
    .slide.active {
      opacity: 1;
      pointer-events: auto;
      position: relative;
    }
  </style>
</head>
<body class="bg-gradient-to-br from-indigo-50 via-white to-blue-50 min-h-screen flex flex-col">

  <!-- Hero Section with Slider -->
  <section class="relative bg-gradient-to-r from-indigo-600 to-blue-500 text-white py-20 px-6 sm:px-16 lg:px-24 overflow-hidden">
    <div class="max-w-7xl mx-auto flex flex-col-reverse lg:flex-row items-center justify-between gap-12 relative">

      <div class="max-w-xl text-center lg:text-left z-20">
        <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight leading-tight mb-6 drop-shadow-lg">
          Kunjungan Industri <br> TVRI Yogyakarta
        </h1>
        <p class="text-lg sm:text-xl opacity-90 mb-8 leading-relaxed drop-shadow-md">
          Jelajahi studio-studio kami dan pelajari langsung proses produksi siaran TVRI.
          Daftar kunjunganmu sekarang dan raih pengalaman berharga!
        </p>

        <div class="flex justify-center lg:justify-start gap-6">
          <a href="/kunjungan/daftar" class="px-8 py-3 bg-white text-indigo-700 font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition">
            Daftar Kunjungan
          </a>
          <a href="/kunjungan/status" class="px-8 py-3 border-2 border-white text-white font-semibold rounded-lg hover:bg-white hover:text-indigo-700 transition">
            Cek Status Kunjungan
          </a>
        </div>
      </div>

      <!-- Slider Container -->
      <div class="w-full max-w-md lg:max-w-lg relative h-[320px] sm:h-[380px] rounded-xl overflow-hidden shadow-xl">
        <img src="{{ asset('images/berita.JPG') }}" alt="Studio Siaran" class="slide active object-cover w-full h-full rounded-xl" />
        <img src="{{ asset('images/podcast1.jpg') }}" alt="Peralatan Produksi" class="slide object-cover w-full h-full rounded-xl" />

        <!-- Prev/Next Buttons -->
        <button id="prevBtn" aria-label="Previous Slide"
          class="absolute top-1/2 -translate-y-1/2 left-3 bg-indigo-700 bg-opacity-60 hover:bg-opacity-80 text-white rounded-full w-10 h-10 flex items-center justify-center shadow-lg transition z-30">
          &#8592;
        </button>
        <button id="nextBtn" aria-label="Next Slide"
          class="absolute top-1/2 -translate-y-1/2 right-3 bg-indigo-700 bg-opacity-60 hover:bg-opacity-80 text-white rounded-full w-10 h-10 flex items-center justify-center shadow-lg transition z-30">
          &#8594;
        </button>
      </div>
    </div>
  </section>

  <!-- Studio Info Section -->
  <section class="py-16 px-6 sm:px-16 lg:px-24 bg-white">
    <div class="max-w-7xl mx-auto">
      <h2 class="text-3xl font-bold text-center text-indigo-800 mb-12">
        Studio-Studio TVRI Yogyakarta
      </h2>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">
        <div class="bg-indigo-100 rounded-xl p-6 shadow-lg hover:shadow-xl transition cursor-default">
          <h3 class="text-xl font-semibold mb-3 text-indigo-700">Studio Siaran Utama</h3>
          <p class="text-indigo-800 text-sm leading-relaxed">
            Studio terbesar dengan peralatan siaran lengkap dan profesional, tempat produksi acara utama TVRI.
          </p>
        </div>
        <div class="bg-indigo-100 rounded-xl p-6 shadow-lg hover:shadow-xl transition cursor-default">
          <h3 class="text-xl font-semibold mb-3 text-indigo-700">Studio Produksi Konten</h3>
          <p class="text-indigo-800 text-sm leading-relaxed">
            Fokus pada produksi konten kreatif seperti dokumenter, talkshow, dan program hiburan.
          </p>
        </div>
        <div class="bg-indigo-100 rounded-xl p-6 shadow-lg hover:shadow-xl transition cursor-default">
          <h3 class="text-xl font-semibold mb-3 text-indigo-700">Studio Editing & Post-Production</h3>
          <p class="text-indigo-800 text-sm leading-relaxed">
            Area di mana hasil rekaman diolah dan diedit untuk kualitas siaran terbaik.
          </p>
        </div>
        <div class="bg-indigo-100 rounded-xl p-6 shadow-lg hover:shadow-xl transition cursor-default">
          <h3 class="text-xl font-semibold mb-3 text-indigo-700">Studio Pelatihan</h3>
          <p class="text-indigo-800 text-sm leading-relaxed">
            Tempat pelatihan teknis dan siaran bagi peserta kunjungan untuk praktik langsung.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Informasi Kunjungan -->
  <section class="py-16 px-6 sm:px-16 lg:px-24 bg-white">
    <div class="max-w-7xl mx-auto max-w-4xl">
      <h2 class="text-3xl font-bold text-indigo-800 mb-8 text-center">Informasi Kunjungan</h2>
      <ul class="list-disc list-inside space-y-4 text-indigo-900 text-lg">
        <li>Waktu kunjungan: Senin - Jumat, pukul 09.00 - 15.00 WIB.</li>
        <li>Durasi kunjungan sekitar 2-3 jam dengan didampingi guide profesional.</li>
        <li>Peserta akan diajak melihat langsung proses produksi siaran di berbagai studio.</li>
        <li>Peserta wajib membawa kartu identitas dan mematuhi aturan protokol kesehatan.</li>
        <li>Pendaftaran kunjungan dapat dilakukan melalui tombol “Daftar Kunjungan” di atas.</li>
        <li>Untuk mengetahui status kunjungan, gunakan tombol “Cek Status Kunjungan”.</li>
      </ul>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-indigo-600 text-white py-6 text-center text-sm mt-auto">
    &copy; 2025 TVRI Yogyakarta – Divisi New Media
  </footer>

  <script>
    // Slider Logic
    const slides = document.querySelectorAll('.slide');
    let currentSlide = 0;

    const showSlide = (index) => {
      slides.forEach((slide, i) => {
        slide.classList.toggle('active', i === index);
      });
    }

    document.getElementById('prevBtn').addEventListener('click', () => {
      currentSlide = (currentSlide - 1 + slides.length) % slides.length;
      showSlide(currentSlide);
    });

    document.getElementById('nextBtn').addEventListener('click', () => {
      currentSlide = (currentSlide + 1) % slides.length;
      showSlide(currentSlide);
    });

    // Auto slide every 5 seconds
    setInterval(() => {
      currentSlide = (currentSlide + 1) % slides.length;
      showSlide(currentSlide);
    }, 5000);
  </script>

</body>
</html>
