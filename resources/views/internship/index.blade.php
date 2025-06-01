<!DOCTYPE html>
<html lang="id" >
<head>
  <meta charset="UTF-8" />
  <title>Portal Praktik Kerja Lapangan</title>
  @vite('resources/css/app.css')
  <style>
    /* Tambahan styling slider */
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

  {{-- Hero Section dengan Slider --}}
  <section class="relative bg-gradient-to-r from-indigo-600 to-blue-500 text-white py-20 px-6 sm:px-16 lg:px-24 overflow-hidden">
    <div class="max-w-7xl mx-auto flex flex-col-reverse lg:flex-row items-center justify-between gap-12 relative">

      <div class="max-w-xl text-center lg:text-left z-20">
        <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight leading-tight mb-6 drop-shadow-lg">
          Portal Praktek Kerja Lapangan <br> TVRI Yogyakarta
        </h1>
        <p class="text-lg sm:text-xl opacity-90 mb-8 leading-relaxed drop-shadow-md">
          Tingkatkan pengalaman kerjamu dengan program PKL terbaik kami. Daftar sekarang dan raih kesempatan berharga!
        </p>

        <div class="flex justify-center lg:justify-start gap-6">
          <a href="/internship/form_pendaftaran" class="px-8 py-3 bg-white text-indigo-700 font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition">
            Daftar PKL
          </a>
          <a href="/internship/status_pkl" class="px-8 py-3 border-2 border-white text-white font-semibold rounded-lg hover:bg-white hover:text-indigo-700 transition">
            Cek Status Pendaftaran
          </a>
        </div>
      </div>

      {{-- Slider Container --}}
      <div class="w-full max-w-md lg:max-w-lg relative h-[320px] sm:h-[380px] rounded-xl overflow-hidden shadow-xl">
        <img src="{{ asset('images/pkl1.jpg') }}" alt="Ilustrasi PKL 1" class="slide active object-cover w-full h-full" />
        <img src="{{ asset('images/pkl2.jpg') }}" alt="Ilustrasi PKL 2" class="slide object-cover w-full h-full" />

        {{-- Prev/Next Buttons --}}
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

  {{-- Info Section --}}
  <section class="py-16 px-6 sm:px-16 lg:px-24 bg-white">
    <div class="max-w-7xl mx-auto">
      <h2 class="text-3xl font-bold text-center text-indigo-800 mb-12">
        Kenapa Harus PKL di TVRI?
      </h2>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">
        <div class="bg-indigo-100 rounded-xl p-6 shadow-lg hover:shadow-xl transition cursor-default">
          <h3 class="text-xl font-semibold mb-3 text-indigo-700">Pengalaman Kerja Nyata</h3>
          <p class="text-indigo-800 text-sm leading-relaxed">
            Terjun langsung ke dunia kerja dengan bimbingan mentor profesional di TVRI.
          </p>
        </div>
        <div class="bg-indigo-100 rounded-xl p-6 shadow-lg hover:shadow-xl transition cursor-default">
          <h3 class="text-xl font-semibold mb-3 text-indigo-700">Jaringan Profesional</h3>
          <p class="text-indigo-800 text-sm leading-relaxed">
            Bangun koneksi yang berguna untuk karier masa depan kamu.
          </p>
        </div>
        <div class="bg-indigo-100 rounded-xl p-6 shadow-lg hover:shadow-xl transition cursor-default">
          <h3 class="text-xl font-semibold mb-3 text-indigo-700">Pengembangan Soft Skill</h3>
          <p class="text-indigo-800 text-sm leading-relaxed">
            Asah kemampuan komunikasi, teamwork, dan problem solving secara langsung.
          </p>
        </div>
        <div class="bg-indigo-100 rounded-xl p-6 shadow-lg hover:shadow-xl transition cursor-default">
          <h3 class="text-xl font-semibold mb-3 text-indigo-700">Sertifikat Resmi</h3>
          <p class="text-indigo-800 text-sm leading-relaxed">
            Dapatkan sertifikat yang bisa menunjang portofolio dan CV kamu.
          </p>
        </div>
      </div>
    </div>
  </section>

  {{-- Divisi TVRI Yogyakarta Section --}}
  <section class="py-16 px-6 sm:px-16 lg:px-24 bg-white">
    <div class="max-w-7xl mx-auto text-center">
      <h2 class="text-3xl font-bold text-indigo-800 mb-12">DIVISI</h2>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 text-left max-w-5xl mx-auto">
        <div class="bg-indigo-50 rounded-xl p-6 shadow-md hover:shadow-lg transition">
          <h3 class="text-xl font-semibold mb-3 text-indigo-700">Divisi Produksi</h3>
          <p class="text-indigo-800 text-sm leading-relaxed">
            Bertanggung jawab atas pembuatan dan pengelolaan konten siaran, mulai dari pengambilan gambar hingga editing final.
          </p>
        </div>
        <div class="bg-indigo-50 rounded-xl p-6 shadow-md hover:shadow-lg transition">
          <h3 class="text-xl font-semibold mb-3 text-indigo-700">Divisi Penyiaran</h3>
          <p class="text-indigo-800 text-sm leading-relaxed">
            Mengelola jadwal siaran dan memastikan siaran berjalan lancar sesuai dengan standar kualitas TVRI.
          </p>
        </div>
        <div class="bg-indigo-50 rounded-xl p-6 shadow-md hover:shadow-lg transition">
          <h3 class="text-xl font-semibold mb-3 text-indigo-700">Divisi Teknik</h3>
          <p class="text-indigo-800 text-sm leading-relaxed">
            Menangani seluruh aspek teknis stasiun, termasuk pemeliharaan peralatan dan instalasi teknologi broadcast.
          </p>
        </div>
        <div class="bg-indigo-50 rounded-xl p-6 shadow-md hover:shadow-lg transition">
          <h3 class="text-xl font-semibold mb-3 text-indigo-700">Divisi Program</h3>
          <p class="text-indigo-800 text-sm leading-relaxed">
            Merancang dan mengatur konten program yang sesuai dengan misi dan visi TVRI serta kebutuhan pemirsa.
          </p>
        </div>
        <div class="bg-indigo-50 rounded-xl p-6 shadow-md hover:shadow-lg transition">
          <h3 class="text-xl font-semibold mb-3 text-indigo-700">Divisi Humas</h3>
          <p class="text-indigo-800 text-sm leading-relaxed">
            Bertugas membangun dan menjaga hubungan baik dengan masyarakat, media, serta mengelola komunikasi eksternal.
          </p>
        </div>
        <div class="bg-indigo-50 rounded-xl p-6 shadow-md hover:shadow-lg transition">
          <h3 class="text-xl font-semibold mb-3 text-indigo-700">Divisi Keuangan</h3>
          <p class="text-indigo-800 text-sm leading-relaxed">
            Mengelola keuangan stasiun termasuk anggaran, pengeluaran, serta pelaporan keuangan secara transparan.
          </p>
        </div>
        <div class="bg-indigo-50 rounded-xl p-6 shadow-md hover:shadow-lg transition">
          <h3 class="text-xl font-semibold mb-3 text-indigo-700">Divisi Sumber Daya Manusia</h3>
          <p class="text-indigo-800 text-sm leading-relaxed">
            Mengatur rekrutmen, pelatihan, dan kesejahteraan karyawan agar kualitas sumber daya manusia terus meningkat.
          </p>
        </div>
      </div>
    </div>
  </section>
   {{-- Testimoni Section --}}
   <section class="py-16 px-6 sm:px-16 lg:px-24 bg-gradient-to-tr from-blue-50 to-white">
    <div class="max-w-7xl mx-auto text-center">
      <h2 class="text-3xl font-bold text-indigo-800 mb-12">Apa Kata Peserta PKL Kami?</h2>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
        @foreach ([
          ['text' => 'PKL di TVRI memberikan pengalaman yang luar biasa dan membuka wawasan saya!', 'name' => 'Rina, Mahasiswa UGM'],
          ['text' => 'Mentor yang ramah dan lingkungan kerja yang mendukung. Sangat direkomendasikan!', 'name' => 'Agus, Mahasiswa UNY'],
          ['text' => 'Banyak ilmu baru dan networking yang membantu karier saya.', 'name' => 'Sari, Mahasiswa UII'],
        ] as $testimoni)
          <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition transform hover:-translate-y-1">
            <p class="italic text-indigo-700 mb-4">"{{ $testimoni['text'] }}"</p>
            <p class="font-semibold text-indigo-900">- {{ $testimoni['name'] }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- Footer --}}
  <footer class="bg-indigo-600 text-white py-6 text-center text-sm mt-auto">
    &copy; {{ date('Y') }} TVRI Yogyakarta – New Media Division
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
