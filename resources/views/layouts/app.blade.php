<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Find Developer') }} - @yield('title', 'Find Your Perfect Developer')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        
        <!-- Scripts -->
        @vite(['resources/js/app.js', 'resources/css/filament/admin/theme.css'])

        <!-- Custom CSS -->
        <link href="{{ asset('css/developer-search.css') }}" rel="stylesheet">

        <!-- Filament Styles -->
        @filamentStyles

        @livewireStyles
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar">
            <div class="navbar-container">
                <a href="{{ url('/') }}" class="navbar-brand">
                    FindDeveloper
                </a>
                        <div class="navbar-menu">
                            <a href="{{ route('pricing') }}" class="navbar-link">
                                Pricing
                            </a>
                            <a href="{{ route('about') }}" class="navbar-link">
                                About Us
                            </a>
                            <a href="{{ route('register') }}" class="navbar-link">
                                Register as Developer
                            </a>
                        </div>
            </div>
        </nav>

        <!-- Info Banner -->
        <div class="info-banner">
            <div class="info-banner-container">
                <div class="info-banner-content">
                    <svg class="info-banner-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="info-banner-text">
                        After the registration as a developer, the admin will view your profile and accept. So stay toon!
                    </p>
                </div>
            </div>
        </div>

        <!-- Page Content -->
        <main class="main-content">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="footer">
            <div class="footer-container">
                <p class="footer-text">
                    &copy; {{ date('Y') }} FindDeveloper. All rights reserved.
                </p>
            </div>
        </footer>

        @livewireScripts
        @filamentScripts
    </body>
</html>
