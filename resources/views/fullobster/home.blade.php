@extends('fullobster.layouts.app')

@section('title', 'FULLOBSTER - Produk & Layanan Lobster Air Tawar Berkualitas')
@section('description', 'FULLOBSTER menyediakan produk lobster air tawar berkualitas dan layanan terbaik. Bibit lobster,
    lobster konsumsi, dan produk olahan premium sejak 2017.')

@section('content')
    <!-- Hero Section -->
    <section class="hero-fullobster" style="min-height: 100vh; display: flex; align-items: center; position: relative;">
        <!-- Background with overlay -->
        <div class="position-absolute top-0 start-0 w-100 h-100"
            style="background: linear-gradient(135deg, #C62828 0%, #B71C1C 50%, #8B0000 100%); z-index: 1;"></div>

        <!-- Accent shapes -->
        <div class="hero-accent-shape"></div>

        <div class="container position-relative" style="z-index: 2;">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content text-white" data-aos="fade-right">
                        <h1 class="display-4 fw-bold mb-4">
                            Produk & Layanan
                            <span style="color: #FFD54F;">Lobster Air Tawar</span>
                        </h1>
                        <p class="lead mb-4">
                            Menyediakan bibit lobster berkualitas, lobster konsumsi segar,
                            dan produk olahan premium untuk kebutuhan bisnis Anda sejak 2017.
                        </p>
                        <div class="d-flex flex-wrap gap-3">
                            <a href="#packages" class="btn btn-light btn-lg fw-semibold px-4">
                                Lihat Produk
                            </a>
                            <a href="https://wa.me/6285706531027?text=Halo%20Fullobster,%20saya%20ingin%20memesan%20produk%20lobster" target="_blank" class="btn btn-outline-light btn-lg px-4">
                                Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image text-center" data-aos="fade-left" data-aos-delay="200">
                        <img src="{{ asset('images/fullobster-logo.png') }}" alt="FULLOBSTER Logo"
                            class="img-fluid hero-logo"
                            style="max-height: 420px; width: auto; filter: drop-shadow(0 10px 30px rgba(0,0,0,0.3));">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about-us" class="about-section py-5">
        <div class="container">
            <!-- Section Header -->
            <div class="section-header-wrapper text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">About Us</h2>
                <div class="title-underline"></div>
            </div>

            <!-- Introduction -->
            <div class="row align-items-center mb-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="about-content">
                        <h3 class="about-subtitle">Introduction</h3>
                        <p class="about-text">
                            Fullobster adalah brand yang tergabung di bidang budidaya, penahiran, tambahan, dan produk
                            olahan lobster air tawar sejak 2017.
                            Kami hadir sebagai solusi komprehensif untuk industri lobster air tawar di Indonesia, dengan
                            komitmen untuk memberikan
                            kualitas terbaik dalam setiap aspek bisnis yang kami jalankan.
                        </p>
                        <p class="about-text">
                            Dengan pengalaman bertahun-tahun dan tim ahli yang berpengalaman, Fullobster telah menjadi
                            pionir dalam pengembangan
                            teknologi budidaya lobster air tawar yang inovatif dan berkelanjutan di Indonesia.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="about-image text-center">
                        <img src="{{ asset('images/about_us.png') }}" alt="Fullobster About Us"
                            class="img-fluid rounded shadow" style="max-height: 400px;">
                    </div>
                </div>
            </div>

            <!-- Vision & Mission Cards -->
            <div class="row g-4 mb-5">
                <!-- Vision Card -->
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="info-card h-100">
                        <div class="card-header">
                            <h4 class="card-title">VISION</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                Menjadi pusat jasa dikadalam formulasi olahan budidaya, tambahan dan produk olahan lobster
                                air tawar
                                terdepan di Indonesia yang mengutamakan kualitas, inovasi, dan keberlanjutan untuk mendukung
                                kesejahteraan masyarakat dan kelestarian lingkungan.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Mission Card -->
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="info-card h-100">
                        <div class="card-header">
                            <h4 class="card-title">MISSION</h4>
                        </div>
                        <div class="card-body">
                            <ul class="mission-list">
                                <li>Memberikan pelatihan dan edukasi terkait budidaya lobster air tawar kepada masyarakat
                                </li>
                                <li>Mengembangkan teknologi budidaya yang ramah lingkungan dan berkelanjutan</li>
                                <li>Menciptakan produk olahan berkualitas tinggi dari lobster air tawar</li>
                                <li>Membangun ekosistem bisnis yang mendukung petani lobster lokal</li>
                                <li>Menghadirkan inovasi dalam setiap aspek industri lobster air tawar</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Philosophy Section -->
            <div class="philosophy-section" data-aos="fade-up" data-aos-delay="300">
                <h3 class="text-center mb-4">Our Philosophy</h3>
                <div class="philosophy-content">
                    <p class="text-center philosophy-text">
                        "Fullobster hadir dengan keyakinan bahwa lobster air tawar bukan hanya komoditas,
                        tetapi juga representasi dari dedikasi terhadap kualitas, inovasi, dan keberlanjutan.
                        Kami percaya bahwa setiap langkah dalam proses budidaya hingga pengolahan harus
                        dilakukan dengan penuh tanggung jawab untuk menciptakan nilai terbaik bagi konsumen
                        dan lingkungan."
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Cultivation Flow Section -->
    <section class="cultivation-flow">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="cultivation-title">ALUR BUDIDAYA LOBSTER</h2>
                <p class="cultivation-subtitle">Ikuti langkah-langkah berikut untuk budidaya lobster yang sukses</p>
            </div>

            <div class="flow-steps">
                <!-- Step 1 -->
                <div class="step-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="step-number">1</div>
                    <div class="step-content">
                        <h3 class="step-title">Persiapan Kolam & Adaptasi</h3>
                        <p class="step-description">
                            Menyiapkan kolam dengan sistem filtrasi yang baik dan mengadaptasi indukan lobster ke lingkungan
                            baru selama 3-7 hari untuk memastikan kondisi optimal.
                        </p>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="step-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="step-number">2</div>
                    <div class="step-content">
                        <h3 class="step-title">Seleksi Indukan & Pemijahan</h3>
                        <p class="step-description">
                            Memilih indukan lobster berkualitas tinggi dan memulai proses pemijahan yang berlangsung 1-4
                            minggu dalam kondisi lingkungan yang terkontrol.
                        </p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="step-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="step-number">3</div>
                    <div class="step-content">
                        <h3 class="step-title">Karantina & Penetasan</h3>
                        <p class="step-description">
                            Memindahkan indukan bertelur ke kolam karantina khusus dan melakukan monitoring intensif selama
                            proses penetasan telur lobster.
                        </p>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="step-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="step-number">4</div>
                    <div class="step-content">
                        <h3 class="step-title">Pembesaran Bibit</h3>
                        <p class="step-description">
                            Merawat dan membesarkan bibit lobster dengan pakan berkualitas tinggi dan melakukan monitoring
                            pertumbuhan secara rutin.
                        </p>
                    </div>
                </div>

                <!-- Step 5 -->
                <div class="step-card" data-aos="fade-up" data-aos-delay="500">
                    <div class="step-number">5</div>
                    <div class="step-content">
                        <h3 class="step-title">Panen & Distribusi</h3>
                        <p class="step-description">
                            Memanen lobster yang sudah mencapai ukuran ideal dan menyiapkan proses distribusi ke konsumen
                            dengan kualitas terjamin.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Paket Section -->
    <section id="packages" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="mb-3" style="color: var(--fullobster-primary);">Pilihan Paket</h2>
                <p class="lead text-muted">
                    Pilih paket yang sesuai dengan kebutuhan budidaya lobster Anda
                </p>
            </div>

            <div class="row justify-content-center g-4">
                <!-- Paket Small -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card h-100 border-0 shadow-sm paket-card overflow-hidden">
                        <div class="card-img-wrapper">
                            <img src="{{ asset('images/paket_small.png') }}" alt="Paket Small" class="card-img-top">
                        </div>
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-2" style="color: #795548;">Paket Small</h5>
                            <p class="h5 fw-bold mb-3" style="color: var(--fullobster-primary);">Rp 1.950.000</p>
                            <ul class="list-unstyled small text-muted mb-0">
                                <li class="mb-1">10 Ekor Indukan (5 Betina + 5 Jantan)</li>
                                <li class="mb-1">Kolam Terpal 1m x 1m x 50cm + Rangka</li>
                                <li class="mb-1">Pompa Filter + Media Filter Lengkap</li>
                                <li class="mb-1">Aerator + Shelter 10 pcs</li>
                                <li class="mb-1">E-book Panduan + Garansi 1 Hari</li>
                                <li>Jaminan Hasil Panen / Buy Back</li>
                            </ul>
                        </div>
                        <div class="card-footer bg-white border-0 p-3 pt-0">
                            <a href="https://wa.me/6285706531027?text=Halo%20Fullobster,%20saya%20tertarik%20dengan%20Paket%20Small%20(Rp%201.950.000)"
                                target="_blank" class="btn btn-secondary w-100">
                                Pesan Paket Small
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Paket Silver -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="card h-100 border-0 shadow paket-card overflow-hidden">
                        <div class="card-img-wrapper">
                            <img src="{{ asset('images/paket_silver.png') }}" alt="Paket Silver" class="card-img-top">
                        </div>
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-2" style="color: #757575;">Paket Silver</h5>
                            <p class="h5 fw-bold mb-3" style="color: var(--fullobster-primary);">Rp 2.450.000</p>
                            <ul class="list-unstyled small text-muted mb-0">
                                <li class="mb-1">10 Ekor Indukan Grade A (5 Betina + 5 Jantan)</li>
                                <li class="mb-1">Kolam Terpal 2m x 1m x 50cm + Rangka</li>
                                <li class="mb-1">Pompa Filter + Media Filter Lengkap</li>
                                <li class="mb-1">Aerator + Shelter 10 pcs</li>
                                <li class="mb-1">E-book Panduan + Garansi 1 Bulan</li>
                                <li>Jaminan Hasil Panen / Buy Back</li>
                            </ul>
                        </div>
                        <div class="card-footer bg-white border-0 p-3 pt-0">
                            <a href="https://wa.me/6285706531027?text=Halo%20Fullobster,%20saya%20tertarik%20dengan%20Paket%20Silver%20(Rp%202.450.000)"
                                target="_blank" class="btn w-100" style="background: #757575; color: #fff;">
                                Pesan Paket Silver
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Paket Gold -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="card h-100 border-0 shadow-lg paket-card overflow-hidden position-relative">
                        <span class="badge position-absolute"
                            style="top: 15px; right: 15px; background: #FFB300; color: #333; z-index: 10; padding: 8px 15px; font-size: 0.85rem;">Best
                            Seller</span>
                        <div class="card-img-wrapper">
                            <img src="{{ asset('images/paket_gold.png') }}" alt="Paket Gold" class="card-img-top">
                        </div>
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-2" style="color: #FFB300;">Paket Gold</h5>
                            <p class="h5 fw-bold mb-3" style="color: var(--fullobster-primary);">Rp 2.950.000</p>
                            <ul class="list-unstyled small text-muted mb-0">
                                <li class="mb-1">20 Ekor Indukan Size 4" (10 Betina + 10 Jantan)</li>
                                <li class="mb-1">Kolam Terpal 2m x 1m x 50cm + Rangka Paralon</li>
                                <li class="mb-1">Pompa Filter 2000 l/h + Media Filter Lengkap</li>
                                <li class="mb-1">Aerator + Shelter 20 pcs + Pelet 2kg</li>
                                <li class="mb-1">E-book + Video Tutorial + Garansi 1.5 Bulan</li>
                                <li>Jaminan Panen + Free Konsultasi</li>
                            </ul>
                        </div>
                        <div class="card-footer bg-white border-0 p-3 pt-0">
                            <a href="https://wa.me/6285706531027?text=Halo%20Fullobster,%20saya%20tertarik%20dengan%20Paket%20Gold%20(Rp%202.950.000)"
                                target="_blank" class="btn w-100"
                                style="background: #FFB300; color: #333; font-weight: 600;">
                                Pesan Paket Gold
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .paket-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 12px;
        }

        .paket-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .paket-card .card-img-wrapper {
            overflow: hidden;
        }

        .paket-card .card-img-top {
            width: 100%;
            height: auto;
            transition: transform 0.3s ease;
        }

        .paket-card:hover .card-img-top {
            transform: scale(1.02);
        }

        .paket-card .card-footer .btn:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }
    </style>

    <style>
        .paket-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 12px;
        }

        .paket-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
        }
    </style>

    <!-- Contact Section -->
    <section id="contact" class="py-5" style="background: #f8f9fa;">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="fw-bold" style="color: var(--fullobster-primary);">Hubungi Kami</h2>
                <p class="text-muted">Siap membantu Anda memulai budidaya lobster air tawar</p>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-card text-center p-4 bg-white rounded-3 shadow-sm h-100">
                        <div class="contact-icon mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                fill="var(--fullobster-primary)" viewBox="0 0 16 16">
                                <path
                                    d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                            </svg>
                        </div>
                        <h5 class="fw-bold mb-2">Alamat</h5>
                        <p class="text-muted mb-0">Jl. Bumi Sari Praja No.14<br>Lontar, Sambikerep<br>Surabaya 60216</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="contact-card text-center p-4 bg-white rounded-3 shadow-sm h-100">
                        <div class="contact-icon mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#25D366"
                                viewBox="0 0 16 16">
                                <path
                                    d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                            </svg>
                        </div>
                        <h5 class="fw-bold mb-2">WhatsApp</h5>
                        <p class="text-muted mb-2">085706531027</p>
                        <a href="https://wa.me/6285706531027?text=Halo%20Fullobster,%20saya%20tertarik%20dengan%20produk%20Anda"
                            target="_blank" class="btn btn-success btn-sm">
                            Chat Sekarang
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="contact-card text-center p-4 bg-white rounded-3 shadow-sm h-100">
                        <div class="contact-icon mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                fill="var(--fullobster-primary)" viewBox="0 0 16 16">
                                <path
                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                            </svg>
                        </div>
                        <h5 class="fw-bold mb-2">Email</h5>
                        <p class="text-muted mb-0">info@fullobster.com</p>
                    </div>
                </div>
            </div>

            <!-- Google Maps -->
            <div class="row mt-5" data-aos="fade-up" data-aos-delay="400">
                <div class="col-12">
                    <div class="rounded-3 overflow-hidden shadow-sm">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.6!2d112.6678!3d-7.2756!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fdc47c6b8e8f%3A0x0!2sJl.%20Bumi%20Sari%20Praja%20No.14%2C%20Lontar%2C%20Sambikerep%2C%20Surabaya!5e0!3m2!1sen!2sid!4v1699600000000"
                            width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .contact-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1) !important;
        }
    </style>

    <!-- Call to Action Section -->
    <section class="py-5" style="background: var(--fullobster-primary);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8" data-aos="fade-right">
                    <h2 class="text-white mb-3">Siap Memulai Budidaya Lobster?</h2>
                    <p class="text-white lead mb-0">
                        Hubungi kami sekarang dan dapatkan konsultasi gratis untuk memilih paket yang tepat.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end" data-aos="fade-left">
                    <a href="https://wa.me/6285706531027?text=Halo%20Fullobster,%20saya%20ingin%20konsultasi%20tentang%20budidaya%20lobster"
                        target="_blank" class="btn btn-light btn-lg">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        .hero-fullobster {
            overflow: hidden;
        }

        .hero-accent-shape {
            background-color: var(--fullobster-accent);
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            opacity: 0.1;
            top: -150px;
            right: -150px;
            z-index: 1;
        }

        .service-icon:hover {
            transform: scale(1.1);
            transition: transform 0.3s ease;
        }

        .portfolio-card {
            transition: all 0.3s ease;
        }

        .portfolio-card:hover {
            transform: translateY(-10px);
        }

        /* Ensure proper spacing for fixed navbar */
        body {
            padding-top: 80px;
        }

        /* About Us Section Styling */
        .about-section {
            background-color: #FAFAFA;
            position: relative;
            scroll-margin-top: 80px;
            /* Offset for fixed navbar */
        }

        /* Section Title */
        .section-title {
            color: var(--fullobster-primary);
            font-size: 48px;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        .title-underline {
            width: 100px;
            height: 4px;
            background-color: var(--fullobster-accent);
            margin: 0 auto;
        }

        /* About Content */
        .about-subtitle {
            color: var(--fullobster-primary);
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .about-text {
            color: var(--fullobster-text-primary);
            font-size: 16px;
            line-height: 1.8;
            text-align: justify;
        }

        /* Info Cards */
        .info-card {
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            overflow: hidden;
            border-radius: 8px;
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(229, 57, 53, 0.2);
        }

        .info-card .card-header {
            background-color: var(--fullobster-primary);
            color: white;
            padding: 20px;
            border-bottom: 3px solid var(--fullobster-accent);
        }

        .info-card .card-title {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .info-card .card-body {
            padding: 25px;
            background-color: white;
        }

        /* Mission List */
        .mission-list {
            list-style: none;
            padding-left: 0;
            margin: 0;
        }

        .mission-list li {
            position: relative;
            padding-left: 30px;
            margin-bottom: 15px;
            color: var(--fullobster-text-primary);
            line-height: 1.6;
        }

        .mission-list li::before {
            content: "▸";
            position: absolute;
            left: 0;
            color: var(--fullobster-primary);
            font-size: 20px;
            font-weight: bold;
        }

        /* Philosophy Section */
        .philosophy-section {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-top: 2rem;
        }

        .philosophy-text {
            font-size: 18px;
            color: var(--fullobster-text-secondary);
            font-style: italic;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.8;
        }

        /* Image Styling */
        .about-image img {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .about-image img:hover {
            transform: scale(1.02);
        }

        /* Smooth Scroll Behavior */
        html {
            scroll-behavior: smooth;
        }

        /* Active state for navbar when at about section */
        .navbar .nav-link[href="#about-us"].active {
            color: var(--fullobster-primary) !important;
            font-weight: 600;
        }

        /* Cultivation Flow Section Styling */
        .cultivation-flow {
            background: linear-gradient(135deg, #E53935 0%, #D32F2F 100%);
            padding: 120px 0 100px 0;
            position: relative;
            overflow: hidden;
        }

        /* Wave decoration at top */
        .cultivation-flow::before {
            content: '';
            position: absolute;
            top: -2px;
            left: 0;
            width: 100%;
            height: 120px;
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 120'%3E%3Cpath fill='%23ffffff' d='M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z'%3E%3C/path%3E%3C/svg%3E");
            background-size: cover;
            pointer-events: none;
        }

        /* Wave decoration at bottom */
        .cultivation-flow::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 120px;
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 120'%3E%3Cpath fill='%23ffffff' d='M0,64L80,58.7C160,53,320,43,480,48C640,53,800,75,960,80C1120,85,1280,75,1360,69.3L1440,64L1440,120L1360,120C1280,120,1120,120,960,120C800,120,640,120,480,120C320,120,160,120,80,120L0,120Z'%3E%3C/path%3E%3C/svg%3E");
            background-size: cover;
            pointer-events: none;
        }

        /* Wave separator at bottom */
        .cultivation-flow::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100%;
            height: 40px;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none"><path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" fill="%23ffffff" fill-opacity="0.1"/></svg>');
            background-size: 1200px 40px;
            animation: wave 15s linear infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes wave {
            0% {
                background-position-x: 0;
            }

            100% {
                background-position-x: 1200px;
            }
        }

        .cultivation-title {
            color: #FFFFFF;
            font-size: 48px;
            font-weight: 800;
            text-transform: uppercase;
            margin-bottom: 20px;
            padding: 20px 0;
            letter-spacing: 2px;
            text-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .cultivation-subtitle {
            color: #FFFFFF;
            font-size: 20px;
            font-weight: 400;
            margin-bottom: 60px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            opacity: 0.95;
        }

        .flow-steps {
            max-width: 1000px;
            margin: 0 auto;
            padding: 40px 40px 0 40px;
            position: relative;
        }

        /* Connecting line between steps */
        .flow-steps::before {
            content: '';
            position: absolute;
            left: 25px;
            top: 60px;
            bottom: 60px;
            width: 2px;
            background: rgba(255, 255, 255, 0.3);
        }

        .step-card {
            background: #FFFFFF;
            border: none;
            border-radius: 12px;
            padding: 35px 40px;
            margin-bottom: 30px;
            display: flex;
            align-items: flex-start;
            gap: 28px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
        }

        .step-card::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: #E53935;
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }

        .step-card::after {
            content: '🦞';
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 72px;
            opacity: 0.03;
        }

        .step-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 28px rgba(0, 0, 0, 0.12);
            border-left: 4px solid #E53935;
            padding-left: 36px;
        }

        .step-card:hover .step-title {
            color: #E53935 !important;
        }

        .step-card:hover .step-description {
            color: #1A1A1A !important;
        }

        .step-card:hover::before {
            transform: scaleY(1);
        }

        .step-number {
            width: 50px;
            height: 50px;
            background: #E53935;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #FFFFFF;
            font-weight: 800;
            font-size: 24px;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(229, 57, 53, 0.3);
            transition: all 0.3s ease;
            position: relative;
        }

        .step-number::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            transform: translate(-50%, -50%);
            background: rgba(229, 57, 53, 0.2);
            opacity: 0;
            transition: all 0.6s ease;
        }

        .step-card:hover .step-number {
            transform: scale(1.1);
            box-shadow: 0 6px 16px rgba(229, 57, 53, 0.5);
        }

        .step-card:hover .step-number::after {
            width: 150%;
            height: 150%;
            opacity: 1;
        }

        .step-content {
            flex: 1;
            min-width: 0;
            position: relative;
            padding: 8px 12px;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.3);
        }

        /* Focus states for accessibility */
        .step-card:focus-within {
            outline: 3px solid #E53935;
            outline-offset: 2px;
        }

        .step-title {
            color: #E53935 !important;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 14px;
            line-height: 1.3;
            letter-spacing: -0.3px;
            text-transform: capitalize;
        }

        .step-description {
            color: #1A1A1A !important;
            font-size: 16px;
            line-height: 1.85;
            margin: 0;
            text-align: justify;
            font-weight: 400;
        }

        /* Pulse animation for step numbers */
        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .cultivation-flow {
                padding: 80px 0 60px 0;
            }

            .cultivation-title {
                font-size: 36px;
                letter-spacing: 1px;
            }

            .cultivation-subtitle {
                font-size: 18px;
                padding: 0 20px;
            }

            .flow-steps {
                padding: 30px 20px 0 20px;
            }

            .flow-steps::before {
                left: 25px;
            }

            .step-card {
                padding: 28px 24px;
                margin-bottom: 20px;
                gap: 20px;
                flex-direction: column;
                text-align: center;
            }

            .step-card:hover {
                transform: translateY(-4px);
                border-left: none;
                padding-left: 24px;
            }

            .step-number {
                width: 52px;
                height: 52px;
                font-size: 22px;
                align-self: center;
            }

            .step-title {
                font-size: 22px;
                text-align: center;
                color: #E53935 !important;
            }

            .step-description {
                text-align: center;
                font-size: 16px;
                color: #1A1A1A !important;
            }
        }

        @media (max-width: 480px) {
            .cultivation-title {
                font-size: 32px;
            }

            .cultivation-subtitle {
                font-size: 18px;
            }

            .step-title {
                font-size: 20px;
                color: #E53935 !important;
            }

            .step-description {
                font-size: 15px;
                color: #1A1A1A !important;
            }

            .step-card {
                padding: 20px 16px;
                margin-bottom: 16px;
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .section-title {
                font-size: 36px;
            }

            .about-content {
                text-align: center;
                margin-bottom: 30px;
            }

            .info-card {
                margin-bottom: 20px;
            }

            .about-subtitle {
                font-size: 24px;
            }

            .philosophy-section {
                padding: 30px 20px;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Enhanced animation for cultivation flow cards
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const cardObserver = new IntersectionObserver((entries) => {
                entries.forEach((entry, index) => {
                    if (entry.isIntersecting) {
                        setTimeout(() => {
                            entry.target.style.opacity = '1';
                            entry.target.style.transform = 'translateY(0)';
                        }, index * 150);
                    }
                });
            }, observerOptions);

            // Apply initial state and observe cultivation cards
            const cultivationCards = document.querySelectorAll('.step-card');
            cultivationCards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                cardObserver.observe(card);
            });

            // Add pulse effect to step numbers when cards are hovered
            cultivationCards.forEach(card => {
                const stepNumber = card.querySelector('.step-number');

                card.addEventListener('mouseenter', () => {
                    stepNumber.style.animation = 'pulse 0.6s ease-in-out';
                });

                card.addEventListener('mouseleave', () => {
                    stepNumber.style.animation = '';
                });
            });

            // Add CSS keyframes for pulse animation
            const style = document.createElement('style');
            style.textContent = `
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.15); }
            100% { transform: scale(1.1); }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    `;
            document.head.appendChild(style);
        });
    </script>
@endpush
