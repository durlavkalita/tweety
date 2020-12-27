<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            {{-- <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header ?? '' }}
                </div>
            </header> --}}

            <!-- Page Content -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-2">
                <div class="lg:flex lg:justify-between">
        
                    <div class="lg:w-32">
                        @include('_sidebar-links')
                    </div>
        
                    <div class="flex-1 lg:mx-10" style="max-width: 700px">
                        <main>
                            {{ $slot }}
                        </main>
                    </div>
        
                    <div class="lg:w-1/6 p-2 rounded-lg">
                        @include('_friends-list')
                    </div>
        
                </div>
            </div>
            
        </div>
        <script src="https://unpkg.com/turbolinks"></script>
    </body>
</html>
