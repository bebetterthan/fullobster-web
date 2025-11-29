<nav class="navbar navbar-expand-lg navbar-fullobster fixed-top">
    <div class="container">
        <!-- Brand Logo -->
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{ asset('images/fullobster-logo.png') }}" alt="Fullobster Logo" class="navbar-logo">
            <div class="logo ms-2 d-none d-sm-block">
                <div class="brand-name">FULLOBSTER</div>
                <div class="brand-tagline">Lobster Air Tawar Berkualitas</div>
            </div>
        </a>

        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler" type="button" id="navbarToggler" aria-label="Toggle navigation">
            <span class="toggler-bar"></span>
            <span class="toggler-bar"></span>
            <span class="toggler-bar"></span>
        </button>

        <!-- Navigation Menu -->
        <div class="navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about-us">
                        About Us
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#packages">
                        Produk
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">
                        Contact
                    </a>
                </li>
                <li class="nav-item nav-cta-wrapper ms-lg-3 mt-3 mt-lg-0">
                    <a href="https://wa.me/6285706531027?text=Halo%20Fullobster,%20saya%20tertarik%20dengan%20produk%20Anda"
                        target="_blank" class="nav-cta">
                        Hubungi Kami
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    .navbar-fullobster {
        transition: all 0.3s ease;
        padding: 0.8rem 0;
        background-color: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    }

    .navbar-fullobster.scrolled {
        padding: 0.5rem 0;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
    }

    /* Brand Logo */
    .navbar-logo {
        height: 55px;
        width: auto;
        border-radius: 50%;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.12);
        transition: all 0.3s ease;
    }

    .navbar-fullobster.scrolled .navbar-logo {
        height: 42px;
    }

    .navbar-brand:hover .navbar-logo {
        transform: scale(1.05);
    }

    .brand-name {
        color: var(--fullobster-primary);
        font-weight: 700;
        font-size: 1.4rem;
        line-height: 1.2;
    }

    .brand-tagline {
        color: var(--fullobster-text-secondary);
        font-size: 0.7rem;
    }

    .navbar-fullobster.scrolled .brand-name {
        font-size: 1.15rem;
    }

    .navbar-fullobster.scrolled .brand-tagline {
        font-size: 0.6rem;
    }

    /* Nav Links */
    .navbar-fullobster .nav-link {
        color: #333;
        font-weight: 500;
        padding: 0.5rem 1rem;
        transition: color 0.3s ease;
    }

    .navbar-fullobster .nav-link:hover,
    .navbar-fullobster .nav-link.active {
        color: var(--fullobster-primary) !important;
    }

    .navbar-fullobster .nav-link.active {
        font-weight: 600;
    }

    /* CTA Button */
    .nav-cta {
        display: inline-block;
        background: var(--fullobster-primary);
        color: #fff !important;
        padding: 0.6rem 1.5rem;
        border-radius: 25px;
        font-weight: 600;
        font-size: 0.9rem;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .nav-cta:hover {
        background: #c62828;
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(229, 57, 53, 0.3);
    }

    /* Mobile Toggle - Custom Hamburger */
    .navbar-toggler {
        display: none;
        border: none;
        padding: 0.5rem;
        background: transparent;
        cursor: pointer;
        flex-direction: column;
        justify-content: space-between;
        width: 30px;
        height: 24px;
    }

    .navbar-toggler:focus {
        outline: none;
        box-shadow: none;
    }

    .toggler-bar {
        display: block;
        width: 100%;
        height: 3px;
        background-color: var(--fullobster-primary);
        border-radius: 2px;
        transition: all 0.3s ease;
    }

    .navbar-toggler.active .toggler-bar:nth-child(1) {
        transform: rotate(45deg) translate(6px, 6px);
    }

    .navbar-toggler.active .toggler-bar:nth-child(2) {
        opacity: 0;
    }

    .navbar-toggler.active .toggler-bar:nth-child(3) {
        transform: rotate(-45deg) translate(6px, -6px);
    }

    /* Desktop - show menu normally */
    @media (min-width: 992px) {
        .navbar-collapse {
            display: flex !important;
            flex-basis: auto;
        }

        .navbar-nav {
            flex-direction: row;
        }
    }

    /* Mobile Responsive */
    @media (max-width: 991px) {
        .navbar-toggler {
            display: flex;
        }

        .navbar-collapse {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background-color: #fff;
            padding: 1.5rem;
            border-radius: 0 0 12px 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            margin: 0 1rem;
            border: 1px solid #eee;
            border-top: none;
        }

        .navbar-collapse.show {
            display: block;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .navbar-nav {
            flex-direction: column;
        }

        .navbar-nav .nav-item {
            border-bottom: 1px solid #f0f0f0;
        }

        .navbar-nav .nav-item:last-child {
            border-bottom: none;
        }

        .navbar-fullobster .nav-link {
            padding: 1rem 0;
            font-size: 1rem;
        }

        .nav-cta-wrapper {
            padding-top: 0.5rem;
            border-bottom: none !important;
        }

        .nav-cta {
            display: block;
            text-align: center;
            width: 100%;
            padding: 0.8rem 1.5rem;
        }
    }

    @media (max-width: 575px) {
        .navbar-logo {
            height: 45px;
        }

        .navbar-fullobster.scrolled .navbar-logo {
            height: 38px;
        }

        .navbar-collapse {
            margin: 0 0.5rem;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggler = document.getElementById('navbarToggler');
        const navbarCollapse = document.getElementById('navbarNav');
        const navLinks = document.querySelectorAll('.navbar-nav .nav-link');

        // Toggle menu
        toggler.addEventListener('click', function(e) {
            e.stopPropagation();
            this.classList.toggle('active');
            navbarCollapse.classList.toggle('show');
        });

        // Close menu when clicking a link
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                toggler.classList.remove('active');
                navbarCollapse.classList.remove('show');
            });
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(e) {
            if (!toggler.contains(e.target) && !navbarCollapse.contains(e.target)) {
                toggler.classList.remove('active');
                navbarCollapse.classList.remove('show');
            }
        });

        // Smooth scroll functionality for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');
                if (targetId && targetId !== '#') {
                    e.preventDefault();
                    const target = document.querySelector(targetId);
                    if (target) {
                        const navbarHeight = document.querySelector('.navbar-fullobster')
                            .offsetHeight;
                        const targetPosition = target.getBoundingClientRect().top + window
                            .pageYOffset - navbarHeight - 10;

                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                    }
                }
            });
        });
    });

    // Add scrolled class on scroll
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar-fullobster');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // Highlight active nav item based on scroll position
    window.addEventListener('scroll', () => {
        const sections = document.querySelectorAll('section[id]');
        const scrollY = window.pageYOffset;

        sections.forEach(section => {
            const sectionHeight = section.offsetHeight;
            const sectionTop = section.offsetTop - 150;
            const sectionId = section.getAttribute('id');
            const navLink = document.querySelector('.navbar a[href="#' + sectionId + '"]');

            if (navLink) {
                if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
                    document.querySelectorAll('.navbar .nav-link').forEach(link => {
                        link.classList.remove('active');
                    });
                    navLink.classList.add('active');
                }
            }
        });
    });
</script>
