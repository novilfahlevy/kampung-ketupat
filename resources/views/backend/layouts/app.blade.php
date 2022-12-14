<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="ckeditor-image-upload-url" content="{{ route('image-upload') }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <x-favicon />

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!--// Font Awesome //-->
        <link rel="stylesheet" href="{{ asset('storage/fonts/font_awesome/css/all.css') }}">

        <!-- Scripts -->
        @vite(['resources/css/backend/app.scss'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('backend.layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @isset($beforeScript)
        {{ $beforeScript }}
        @endisset
        
        @vite(['resources/js/backend/app.js'])

        @isset($afterScript)
        {{ $afterScript }}
        @endisset
    </body>
</html>
