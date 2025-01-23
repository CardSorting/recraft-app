@props([
    'title' => 'Ready to transform your creative process?',
    'subtitle' => 'Get started today and join thousands of satisfied designers worldwide.',
    'buttonText' => 'Get started today',
    'buttonLink' => '#'
])

<div class="relative isolate overflow-hidden py-24 sm:py-32">
    <!-- Dynamic background -->
    <div class="absolute inset-0 -z-10">
        <!-- Gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-950 via-purple-900 to-pink-950"></div>
        
        <!-- Animated particles -->
        <div class="absolute inset-0 bg-grid-white/[0.02] bg-[size:60px_60px]">
            <div class="absolute inset-0 bg-gradient-to-t from-transparent via-indigo-500/10 to-transparent animate-pulse"></div>
        </div>
        
        <!-- Glow effect -->
        <div class="absolute inset-x-0 top-28 -z-10 transform-gpu overflow-hidden blur-3xl">
            <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-20"></div>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-6 lg:px-8 relative">
        <div class="mx-auto max-w-2xl">
            <!-- Enhanced heading with layered typography -->
            <div class="relative text-center">
                <span class="absolute -top-10 left-1/2 -translate-x-1/2 text-9xl font-black text-indigo-900/5 dark:text-indigo-100/5 select-none blur-sm">
                    TRANSFORM
                </span>
                <h2 class="relative">
                    <span aria-hidden="true" class="absolute -top-1 left-1/2 -translate-x-1/2 w-20 h-20 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-full blur-2xl opacity-20"></span>
                    <span class="relative block text-5xl sm:text-6xl font-black tracking-tight bg-gradient-to-br from-white via-indigo-100 to-white bg-clip-text text-transparent pb-2 drop-shadow-sm">
                        Ready to transform
                    </span>
                    <span class="block mt-2 text-3xl sm:text-4xl font-extralight tracking-wide text-white/90">
                        your creative process<span class="text-indigo-400">?</span>
                    </span>
                </h2>
            </div>

            <!-- Enhanced subtitle with animated gradient -->
            <p class="relative mt-8 text-lg sm:text-xl leading-8 text-center">
                <span class="relative">
                    <span class="relative z-10 font-medium bg-gradient-to-r from-gray-200 via-white to-gray-200 bg-clip-text text-transparent">
                        Get started today and join thousands of satisfied designers worldwide
                    </span>
                    <span class="absolute -bottom-1 left-0 w-full h-px animate-gradient bg-gradient-to-r from-transparent via-indigo-500 to-transparent opacity-50"></span>
                </span>
            </p>

            <!-- Enhanced testimonial with dynamic styling -->
            <figure class="relative mt-14 pt-8">
                <!-- Decorative elements -->
                <div class="absolute -top-4 left-0 w-full h-24 bg-gradient-to-r from-indigo-600/5 via-purple-600/5 to-pink-600/5 blur-xl"></div>
                <div class="absolute -top-2 -left-2 text-8xl text-indigo-600/10 font-serif rotate-12">"</div>
                
                <!-- Quote content -->
                <blockquote class="relative mx-auto max-w-2xl">
                    <p class="text-xl sm:text-2xl italic text-gray-300 text-center font-serif">
                        This platform has revolutionized our design process. What used to take days now takes hours.
                    </p>
                </blockquote>
                
                <!-- Author info with creative typography -->
                <figcaption class="mt-8 flex flex-col items-center">
                    <div class="text-center">
                        <div class="font-mono text-lg bg-gradient-to-r from-indigo-400 to-purple-400 bg-clip-text text-transparent">
                            Sarah Chen
                        </div>
                        <div class="mt-1 text-sm tracking-widest uppercase text-gray-500 font-medium">
                            Lead Designer at 
                            <span class="text-indigo-400">Acme Corp</span>
                        </div>
                    </div>
                </figcaption>
            </figure>

            <!-- Enhanced CTA buttons -->
            <div class="mt-14 flex flex-col sm:flex-row items-center justify-center gap-8">
                <a href="{{ $buttonLink }}" 
                   class="group relative isolate rounded-full px-8 py-4 transition-all duration-300">
                    <!-- Button background -->
                    <div class="absolute inset-0 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-full blur-md opacity-75 group-hover:opacity-100 transition-opacity"></div>
                    <div class="absolute inset-0.5 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-full"></div>
                    <!-- Button content -->
                    <span class="relative z-10 text-base font-semibold text-white flex items-center gap-2">
                        Get started today
                        <span class="group-hover:translate-x-1 transition-transform duration-300" aria-hidden="true">→</span>
                    </span>
                </a>

                <a href="#demo" 
                   class="group flex items-center gap-2">
                    <span class="text-base font-medium bg-gradient-to-r from-gray-200 to-white bg-clip-text text-transparent">
                        Try demo version
                    </span>
                    <span class="text-lg text-indigo-400 transition-transform group-hover:translate-x-1">→</span>
                </a>
            </div>
        </div>
    </div>
</div>
