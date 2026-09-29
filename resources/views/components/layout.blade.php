<!doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Presto.it</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <x-navbar />

    <main class="min-vh-100">
        {{ $slot }}
    </main>

    <x-footer />

</body>
</html>