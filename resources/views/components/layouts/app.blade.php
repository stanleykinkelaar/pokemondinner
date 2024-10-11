<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
    <script src="https://unpkg.com/easymde/dist/easymde.min.js"></script>

    <title>{{ $title ?? 'Page Title' }}</title>
</head>
<body class="bg-slate-700 flex items-center justify-center @if(request()->is('/')) h-screen @endif">
<x-mary-toast />
{{ $slot }}
</body>
</html>
