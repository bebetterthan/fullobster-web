<footer class="bg-dark text-white py-5">
    <div class="container">
        <div class="row">
            <!-- Company Info -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="d-flex align-items-center mb-3">
                    <img src="{{ asset('images/fullobster-logo.png') }}" alt="Fullobster Logo"
                        style="height: 60px; width: auto; border-radius: 50%;">
                    <div class="logo ms-2">
                        <div class="top" style="color: #E53935; font-weight: 700; font-size: 1.3rem;">
                            FULLOBSTER
                        </div>
                        <div class="bottom" style="color: #FFD54F; font-size: 0.7rem;">
                            Lobster Air Tawar Berkualitas
                        </div>
                    </div>
                </div>
                <p class="text-light small mb-3">
                    Menyediakan bibit lobster berkualitas, lobster konsumsi segar, dan produk olahan premium sejak 2017.
                </p>

                <!-- Social Media Links -->
                @if (!empty($groupedSosmed))
                    <div class="social-links">
                        @foreach ($groupedSosmed as $platform => $links)
                            @foreach ($links as $link)
                                <a href="{{ $link->url }}" target="_blank" class="text-white me-2">
                                    @switch($platform)
                                        @case('YouTube')
                                            <i class="fab fa-youtube"></i>
                                        @break

                                        @case('Instagram')
                                            <i class="fab fa-instagram"></i>
                                        @break

                                        @case('Facebook')
                                            <i class="fab fa-facebook"></i>
                                        @break

                                        @case('TikTok')
                                            <i class="fab fa-tiktok"></i>
                                        @break
                                    @endswitch
                                </a>
                            @endforeach
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h6 class="text-white mb-3 fw-bold">Quick Links</h6>
                <ul class="list-unstyled small">
                    <li class="mb-2"><a href="{{ route('home') }}" class="text-light text-decoration-none">Home</a>
                    </li>
                    <li class="mb-2"><a href="{{ route('about') }}" class="text-light text-decoration-none">About
                            Us</a></li>
                    <li class="mb-2"><a href="{{ route('services') }}"
                            class="text-light text-decoration-none">Services</a></li>
                    <li class="mb-2"><a href="{{ route('contact') }}"
                            class="text-light text-decoration-none">Contact</a></li>
                </ul>
            </div>

            <!-- Paket -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h6 class="text-white mb-3 fw-bold">Pilihan Paket</h6>
                <ul class="list-unstyled small">
                    <li class="mb-2"><a href="{{ route('services') }}" class="text-light text-decoration-none">Paket
                            Gold</a></li>
                    <li class="mb-2"><a href="{{ route('services') }}" class="text-light text-decoration-none">Paket
                            Silver</a></li>
                    <li class="mb-2"><a href="{{ route('services') }}" class="text-light text-decoration-none">Paket
                            Small</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h6 class="text-white mb-3 fw-bold">Hubungi Kami</h6>
                <ul class="list-unstyled small">
                    <li class="mb-2">
                        <a href="https://wa.me/6285706531027" target="_blank" class="text-light text-decoration-none">
                            085706531027
                        </a>
                    </li>
                    <li class="mb-2">
                        <span class="text-light">Jl. Bumi Sari Praja No.14</span>
                    </li>
                    <li class="mb-2">
                        <span class="text-light">Lontar, Sambikerep</span>
                    </li>
                    <li class="mb-2">
                        <span class="text-light">Surabaya, Jawa Timur</span>
                    </li>
                </ul>
            </div>

            <!-- Map Preview -->
            <div class="col-lg-3 col-md-12 mb-4">
                <h6 class="text-white mb-3 fw-bold">Lokasi</h6>
                <div class="map-container" style="border-radius: 8px; overflow: hidden;">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.6399!2d112.6746178!3d-7.2644668!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7ff306b7e0961%3A0x693e823532cc1571!2sFullobster%20Office%20Farm!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid"
                        width="100%" height="150" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <div class="mt-2">
                    <a href="https://www.google.com/maps/place/Fullobster+Office+Farm/@-7.2644668,112.6746178,17z"
                        target="_blank" class="text-light text-decoration-none small">
                        Lihat di Google Maps
                    </a>
                </div>
            </div>
        </div>

        <hr class="my-4" style="border-color: #444;">

        <!-- Copyright -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="text-light small mb-0">
                    &copy; {{ date('Y') }} FULLOBSTER. All rights reserved.
                </p>
            </div>
            <div class="col-md-6 text-md-end">
                <p class="text-light small mb-0">
                    Surabaya, Indonesia
                </p>
            </div>
        </div>
    </div>
</footer>

<style>
    .social-links a {
        transition: color 0.3s ease;
    }

    .social-links a:hover {
        color: var(--fullobster-primary) !important;
    }

    footer ul li a:hover {
        color: #FFD54F !important;
    }
</style>
