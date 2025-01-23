@props(['transparent' => false])

<nav x-data="{ isScrolled: false, mobileMenuOpen: false }"
    @scroll.window="isScrolled = window.scrollY > 20"
    :class="{ 'bg-white/80 backdrop-blur-lg shadow-md dark:bg-gray-900/80': isScrolled || !{{ json_encode($transparent) }}, 'bg-transparent': !isScrolled && {{ json_encode($transparent) }} }"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="flex items-center space-x-3">
                    <span class="bg-gradient-to-r from-indigo-500 to-purple-600 bg-clip-text text-2xl font-bold text-transparent">Recraft</span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:block">
                <div class="ml-10 flex items-center space-x-8">
                    <a href="#features" class="text-sm font-medium text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-white">Features</a>
                    <a href="#how-it-works" class="text-sm font-medium text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-white">How it Works</a>
                    <a href="#testimonials" class="text-sm font-medium text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-white">Testimonials</a>
                    
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm font-medium text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-white">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-white">Sign in</a>
                        @if (Route::has('register'))
<a href="{{ route('register') }}"
    class="rounded-full bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-all duration-300 ease-in-out hover:scale-105">
                                Get Started
                            </a>
                        @endif
                    @endauth
                </div>
            </div>

            <!-- Mobile menu button -->
            <div class="flex md:hidden">
<button @click="mobileMenuOpen = !mobileMenuOpen" type="button"
    class="inline-flex items-center justify-center rounded-md p-2 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-white">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" x-show="!mobileMenuOpen" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg class="h-6 w-6" x-show="mobileMenuOpen" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
<div x-show="mobileMenuOpen"
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 -translate-y-1"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 -translate-y-1"
    class="md:hidden"
    style="display: none;">
        <div class="space-y-1 px-4 pb-3 pt-2 bg-white/80 backdrop-blur-lg dark:bg-gray-900/80">
            <a href="#features" class="block rounded-md px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-50 hover:text-indigo-600 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-white">Features</a>
            <a href="#how-it-works" class="block rounded-md px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-50 hover:text-indigo-600 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-white">How it Works</a>
            <a href="#testimonials" class="block rounded-md px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-50 hover:text-indigo-600 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-white">Testimonials</a>
            
            @auth
                <a href="{{ url('/dashboard') }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-50 hover:text-indigo-600 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-white">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-50 hover:text-indigo-600 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-white">Sign in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="block rounded-md px-3 py-2 text-base font-medium text-indigo-600 hover:bg-indigo-50 dark:text-indigo-400 dark:hover:bg-gray-800">Get Started</a>
                @endif
            @endauth
        </div>
    </div>

    <!-- Progress bar -->
<div x-data="{ scrollProgress: 0 }"
    @scroll.window="scrollProgress = (window.scrollY / (document.documentElement.scrollHeight - window.innerHeight)) * 100"
    class="h-0.5 bg-gray-200 dark:bg-gray-800">
        <div class="h-0.5 bg-indigo-600 transition-all duration-150" :style="{ width: scrollProgress + '%' }"></div>
    </div>
</nav>
