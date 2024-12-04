<!-- Layout archive for nav and footer, with tailwind -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Stitch Network</title>
    <!-- Tailwind CSS -->
    @vite('resources/css/app.css')
    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-[#F8F3E6] text-[#544343] flex flex-col min-h-screen">
    <!-- Navbar -->
    @include('components.nav')

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('components.footer')

    <!-- Scripts -->
    @vite('resources/js/app.js')
    @stack('scripts')
</body>
</html>
