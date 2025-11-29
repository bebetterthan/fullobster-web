<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'FULLOBSTER - Innovative Solutions for Your Business')</title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="@yield('description', 'FULLOBSTER provides innovative business solutions and consulting services to help your company grow and succeed.')">
    <meta name="keywords" content="@yield('keywords', 'business solutions, consulting, innovation, FULLOBSTER')">
    <meta name="author" content="FULLOBSTER">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="@yield('title', 'FULLOBSTER - Innovative Solutions')">
    <meta property="og:description" content="@yield('description', 'Professional business solutions and consulting services.')">
    <meta property="og:image" content="{{ asset('images/fullobster-og-image.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon-v2.png') }}" type="image/png">
    
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/landingpage.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    
    @stack('styles')
</head>
<body>
    @include('fullobster.partials.navbar')
    
    <main>
        @yield('content')
    </main>
    
    @include('fullobster.partials.footer')
    
    <!-- Scripts -->
    <script src="{{ asset('js/landingpage.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    
    @stack('scripts')
</body>
</html>