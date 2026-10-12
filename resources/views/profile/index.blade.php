<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Profil | Mahasiswa</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="profile-page bg-white text-gray-900 font-sans antialiased">

    <div class="splash-screen" data-splash-screen role="status" aria-live="polite" hidden>
        <div class="splash-content">
            <span class="splash-eyebrow">PERSONAL PORTFOLIO</span>
            <p class="splash-mark" aria-hidden="true">FLATAMA<span>.</span></p>
            <span class="splash-caption">MENYIAPKAN TAMPILAN</span>
            <span class="splash-progress" aria-hidden="true"><span></span></span>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="site-nav fixed w-full bg-white z-50">
        <div class="site-nav-inner">
            <a href="#home" class="site-brand text-xl font-bold">FLATAMA.</a>
            <button class="menu-toggle" type="button" aria-label="Buka menu navigasi" aria-expanded="false" aria-controls="site-navigation-links">
                <span></span>
                <span></span>
            </button>
            <div class="site-nav-links" id="site-navigation-links">
                <a href="#home" class="transition">HOME</a>
                <a href="#about" class="transition">ABOUT ME</a>
                <a href="#portfolio" class="transition">PROJECTS</a>
                <a href="#contact" class="transition">CONTACT</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section min-h-screen flex items-center bg-white pt-24 pb-14">
        <div class="hero-layout">
            <div class="hero-gallery" aria-label="Visual karya dan proses pengembangan web">
                <figure class="hero-photo hero-photo-main" data-reveal data-delay="160">
                    <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1000&q=85" alt="Developer sedang bekerja di depan laptop" fetchpriority="high">
                </figure>
                <figure class="hero-photo hero-photo-secondary" data-reveal data-delay="260">
                    <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&w=800&q=85" alt="Baris kode dalam editor pemrograman" loading="lazy">
                </figure>
                <figure class="hero-photo hero-photo-secondary" data-reveal data-delay="360">
                    <img src="https://images.unsplash.com/photo-1551650975-87deedd944c3?auto=format&fit=crop&w=800&q=85" alt="Desain aplikasi web pada perangkat mobile" loading="lazy">
                </figure>
            </div>

            <div class="hero-content px-4">
                <p class="hero-index" data-reveal>MAHASISWA <span>·</span> STKIP PGRI PACITAN</p>
                <h1 class="hero-title text-5xl md:text-6xl font-extrabold text-gray-900 mb-4" data-reveal data-delay="80">
                    <span>FLATAMA</span><span>PUTRA LESTA</span><span>NUGRAHA</span>
                </h1>
                <p class="hero-role" data-reveal data-delay="140">WEB CREATOR <span>—</span> KEGIATAN SAMPINGAN</p>
                <p class="hero-copy text-xl md:text-2xl text-gray-600 mb-8" data-reveal data-delay="200">
                    Di sela perjalanan kuliah, saya merangkai ide menjadi website yang sederhana, bermanfaat, dan menyenangkan untuk digunakan.
                </p>
                <a href="#contact" class="hero-cta bg-black text-white px-6 py-3 text-lg font-medium transition" data-reveal data-delay="260">
                    CONTACT ME <span aria-hidden="true">&rarr;</span>
                </a>
            </div>

            <a href="#about" class="hero-scroll" data-reveal><span></span>SCROLL TO EXPLORE</a>
            <div class="hero-side-mark" aria-hidden="true">01 / 04</div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="profile-section py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <p class="section-index" data-reveal>01 — ABOUT ME</p>
            <h2 class="text-3xl font-bold text-gray-900 mb-6" data-reveal>Tentang Saya</h2>
            <p class="text-lg text-gray-600 leading-relaxed" data-reveal data-delay="100">
                Saya adalah mahasiswa STKIP PGRI Pacitan yang senang belajar dan terus bertumbuh. Di luar kegiatan kuliah, saya membuat website sebagai proyek sampingan—ruang untuk bereksperimen, mengasah kemampuan, dan mewujudkan ide menjadi sesuatu yang bisa digunakan. Bagi saya, setiap halaman yang dibangun adalah kesempatan baru untuk belajar dan memberi manfaat.
            </p>
            
            <div class="skill-list mt-10 flex flex-wrap justify-center gap-4" data-reveal data-delay="180">
                <!-- Skill Badges -->
                <span class="skill-chip px-4 py-2 font-medium">Laravel</span>
                <span class="skill-chip px-4 py-2 font-medium">PHP</span>
                <span class="skill-chip px-4 py-2 font-medium">Tailwind CSS</span>
                <span class="skill-chip px-4 py-2 font-medium">MySQL</span>
                <span class="skill-chip px-4 py-2 font-medium">Git & GitHub</span>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio" class="profile-section py-20 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4">
            <p class="section-index text-center" data-reveal>02 — SELECTED PROJECTS</p>
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-12" data-reveal>Karya & Proyek</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                @forelse($projects as $project)
                <!-- Card Project -->
                <div class="project-card bg-white overflow-hidden transition" data-reveal>
                    <!-- Ganti src di bawah dengan path gambar dari database jika ada -->
                    <img src="{{ $project->image_path ?? 'https://via.placeholder.com/400x250' }}" alt="{{ $project->title }}" class="project-image w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $project->title }}</h3>
                        <p class="text-gray-600 mb-4 line-clamp-3">
                            {{ $project->description }}
                        </p>
                        @if($project->link)
                        <a href="{{ $project->link }}" target="_blank" rel="noopener noreferrer" class="project-link font-medium hover:underline">Lihat Proyek &rarr;</a>
                        @endif
                    </div>
                </div>
                @empty
                <!-- Data kosong jika belum diisi di database -->
                <div class="col-span-full text-center text-gray-500 py-10" data-reveal>
                    Belum ada proyek yang ditambahkan. Silakan isi tabel 'projects' di database.
                </div>
                @endforelse

            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="profile-section py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <p class="section-index" data-reveal>03 — GET IN TOUCH</p>
            <h2 class="text-3xl font-bold text-gray-900 mb-6" data-reveal>Mari Bekerja Sama</h2>
            <p class="text-lg text-gray-600 mb-8" data-reveal data-delay="100">
                Punya ide website, ingin bertukar pikiran, atau belajar bersama? Saya senang membuka percakapan dan menjajaki kolaborasi yang cocok.
            </p>
            <a href="https://wa.me/6281332225675" target="_blank" rel="noopener noreferrer" class="contact-cta bg-black text-white px-8 py-4 text-lg font-medium hover:bg-gray-800 transition" data-reveal data-delay="200">
                Hubungi via WhatsApp <span aria-hidden="true">&rarr;</span>
            </a>
            
            <div class="social-links mt-12 flex justify-center space-x-6" data-reveal data-delay="300">
                <a href="https://www.instagram.com/fla_tama/" target="_blank" rel="noopener noreferrer" class="text-gray-500 hover:text-gray-900 transition font-medium">Instagram</a>
                <a href="https://github.com/momorislayer" target="_blank" rel="noopener noreferrer" class="text-gray-500 hover:text-gray-900 transition font-medium">GitHub</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-400 py-6 text-center">
        <p>&copy; {{ date('Y') }} Flatama Putra Lesta Nugraha. Dibuat dengan rasa ingin tahu dan semangat belajar.</p>
    </footer>

</body>
</html>