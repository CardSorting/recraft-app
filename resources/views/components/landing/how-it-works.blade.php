@props(['steps' => []])

<section id="how-it-works" class="relative bg-white py-24 dark:bg-gray-900 sm:py-32">
    <!-- Decorative background -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute left-[max(50%,25rem)] top-0 h-[64rem] w-[128rem] -translate-x-1/2 stroke-gray-200 [mask-image:radial-gradient(64rem_64rem_at_top,white,transparent)] dark:stroke-gray-700">
            <svg class="absolute inset-0 h-full w-full" aria-hidden="true">
                <defs>
                    <pattern id="grid-pattern" width="48" height="48" patternUnits="userSpaceOnUse">
                        <path d="M0 .5H48M.5 0V48" fill="none"></path>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" strokeWidth="0" fill="url(#grid-pattern)"></rect>
            </svg>
        </div>
    </div>
    
    <div class="relative mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-base font-semibold leading-7 text-indigo-600 dark:text-indigo-400">Streamlined Process</h2>
            <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-4xl">How Recraft Works</p>
            <p class="mt-6 text-lg leading-8 text-gray-600 dark:text-gray-300">
                Create stunning designs in minutes with our intuitive AI-powered platform
            </p>
        </div>

        <div class="mx-auto mt-16 max-w-5xl">
            <div class="grid gap-12 lg:grid-cols-3 relative">
                <!-- Progress line -->
                <div class="hidden lg:block absolute top-32 left-[15%] right-[15%] h-1 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600"></div>
                
                <!-- Step 1: Describe -->
                <div class="relative group">
                    <div class="relative flex flex-col items-center p-8 rounded-2xl bg-white/50 backdrop-blur-sm shadow-xl ring-1 ring-gray-200 transition-all duration-300 hover:bg-white/80 hover:scale-105 dark:bg-gray-800/50 dark:ring-gray-700 dark:hover:bg-gray-800/80">
                        <div class="text-6xl font-black bg-gradient-to-br from-indigo-600 to-purple-600 bg-clip-text text-transparent mb-6">1</div>
                        <div class="text-2xl font-extrabold text-gray-900 dark:text-white text-center mb-4">
                            Describe<br/>
                            <span class="bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">Vision</span>
                        </div>
                        <p class="text-center text-gray-600 dark:text-gray-300 mb-6">Simply describe what you want to create using natural language. Our AI understands your intent.</p>
                        <div class="text-sm font-semibold text-indigo-600 dark:text-indigo-400 group-hover:translate-x-1 transition-transform">
                            Start Here
                        </div>
                    </div>
                </div>

                <!-- Step 2: AI Generation -->
                <div class="relative group">
                    <div class="relative flex flex-col items-center p-8 rounded-2xl bg-white/50 backdrop-blur-sm shadow-xl ring-1 ring-gray-200 transition-all duration-300 hover:bg-white/80 hover:scale-105 dark:bg-gray-800/50 dark:ring-gray-700 dark:hover:bg-gray-800/80">
                        <div class="text-6xl font-black bg-gradient-to-br from-purple-600 to-pink-600 bg-clip-text text-transparent mb-6">2</div>
                        <div class="flex flex-col items-center gap-1 mb-4">
                            <span class="font-mono text-2xl font-bold text-gray-900 dark:text-white">AI</span>
                            <span class="text-xl font-bold tracking-widest text-gray-900 dark:text-white">GENERATION</span>
                        </div>
                        <p class="text-center text-gray-600 dark:text-gray-300 mb-6">Our AI processes your request and generates multiple design options in seconds.</p>
                        <div class="flex items-center gap-2">
                            <div class="animate-spin h-4 w-4 border-2 border-indigo-600 border-t-transparent rounded-full"></div>
                            <span class="text-sm font-semibold text-indigo-600 dark:text-indigo-400">Processing</span>
                        </div>
                    </div>
                </div>

                <!-- Step 3: Customize -->
                <div class="relative group">
                    <div class="relative flex flex-col items-center p-8 rounded-2xl bg-white/50 backdrop-blur-sm shadow-xl ring-1 ring-gray-200 transition-all duration-300 hover:bg-white/80 hover:scale-105 dark:bg-gray-800/50 dark:ring-gray-700 dark:hover:bg-gray-800/80">
                        <div class="text-6xl font-black bg-gradient-to-br from-pink-600 to-rose-600 bg-clip-text text-transparent mb-6">3</div>
                        <div class="text-2xl font-bold text-center mb-4">
                            <span class="font-black">Customize</span>
                            <span class="text-pink-600 dark:text-pink-400">&</span>
                            <span class="font-light">Export</span>
                        </div>
                        <p class="text-center text-gray-600 dark:text-gray-300 mb-6">Fine-tune your designs with our intuitive editor and export in any format you need.</p>
                        <div class="text-sm font-semibold text-indigo-600 dark:text-indigo-400 group-hover:translate-x-1 transition-transform">
                            Final Step
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to action -->
        <div class="mt-16 flex justify-center">
            <a href="{{ route('register') }}" class="rounded-full bg-indigo-600 px-8 py-3.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition duration-300 ease-in-out transform hover:scale-105">
                Start Creating Now
                <span aria-hidden="true" class="ml-2">→</span>
            </a>
        </div>
    </div>
</section>
