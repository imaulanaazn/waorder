<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <title>Layanan Surat Desa Gambarsari</title>
    @livewireStyles
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/97e48f7299.js" crossorigin="anonymous"></script> <!-- Nucleo Icons -->
    <link href="{{asset('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    @vite(['public/assets/css/argon-dashboard-tailwind.css?v=1.0.1'])
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="antialiased bg-body text-body font-body">
    {{ $slot }}

    @livewireScripts

    <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/argon-dashboard-tailwind.js?v=1.0.1') }}" defer></script>

    @stack('scripts')
</body>

</html>