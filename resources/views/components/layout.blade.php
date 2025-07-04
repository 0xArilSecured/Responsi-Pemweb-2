@props(['titleHeader' => null])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $titleHeader }}</title>
    
    <!-- Animate On Scroll Library -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    
    <!-- Import Tailwind CSS -->
    @vite('resources/css/app.css')

    <!-- Alpine JS -->
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="h-dvh w-dvw font-inter text-sm text-gray-800 flex justify-center items-center">
    {{ $slot }}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
</body>
</html>