@props(['title' => 'Transform Your Ideas', 'subtitle' => 'Create stunning designs with AI-powered tools'])

<div class="relative overflow-hidden bg-gradient-to-br from-indigo-900 via-purple-900 to-pink-700">
    <!-- Animated background effect -->
    <div class="absolute inset-0 bg-grid-white/[0.05] bg-[size:60px_60px]" style="mask-image: linear-gradient(to bottom, transparent, black); -webkit-mask-image: linear-gradient(to bottom, transparent, black);"></div>
    
    <div class="relative">
        <div class="mx-auto max-w-7xl px-6 py-24 sm:py-32 lg:flex lg:items-center lg:gap-x-10 lg:px-8 lg:py-40">
            <div class="mx-auto max-w-2xl lg:mx-0 lg:flex-auto">
                <div class="flex">
                    <div class="relative flex items-center gap-x-4 rounded-full px-4 py-1 text-sm leading-6 text-gray-200 ring-1 ring-gray-100/50">
                        <span class="font-semibold text-indigo-400">New</span>
                        <span class="h-4 w-px bg-gray-100/50"></span>
                        <a href="#features" class="flex items-center gap-x-1 text-gray-100">
                            Explore latest features
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="relative">
                    <h1 class="mt-10 max-w-lg">
                        <span class="block text-5xl sm:text-7xl font-black tracking-tight bg-gradient-to-r from-white via-indigo-100 to-white bg-clip-text text-transparent pb-2">
                            Transform
                        </span>
                        <span class="block text-4xl sm:text-6xl font-light tracking-tight text-white/90">
                            Your Ideas
                        </span>
                    </h1>
                    <div class="absolute -right-4 top-0 text-8xl font-black text-indigo-600/10 select-none rotate-12">
                        AI
                    </div>
                </div>

                <p class="mt-8 text-xl leading-8 text-gray-300 font-light">
                    Create <span class="font-semibold text-white">stunning designs</span> with 
                    <span class="relative inline-block">
                        <span class="relative z-10 font-semibold text-white">AI-powered tools</span>
                        <span class="absolute inset-x-0 bottom-0 h-3 bg-indigo-600/20 -rotate-2"></span>
                    </span>
                </p>

                <div class="mt-8 flex items-center gap-x-6 text-sm">
                    <div class="flex items-center gap-x-2 px-4 py-2 rounded-full bg-white/5 backdrop-blur-sm border border-white/10">
                        <div class="flex -space-x-1">
                            <div class="h-6 w-6 rounded-full bg-gradient-to-br from-indigo-500 to-purple-500 ring-2 ring-black"></div>
                            <div class="h-6 w-6 rounded-full bg-gradient-to-br from-purple-500 to-pink-500 ring-2 ring-black"></div>
                            <div class="h-6 w-6 rounded-full bg-gradient-to-br from-pink-500 to-red-500 ring-2 ring-black"></div>
                        </div>
                        <span class="text-gray-300 font-medium">Trusted by 10,000+ designers</span>
                    </div>
                    <div class="flex items-center gap-x-1 text-yellow-400 font-medium">
                        <span>4.9</span>
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>

                <div class="mt-10 flex items-center gap-x-6">
                    <a href="{{ route('register') }}" 
                       class="group relative rounded-full bg-white/10 px-6 py-3 text-base font-semibold text-white transition-all duration-300 hover:bg-white/20 hover:scale-105">
                        <span class="relative z-10">Get started</span>
                        <div class="absolute inset-0 -z-10 rounded-full bg-gradient-to-r from-indigo-600/50 to-purple-600/50 opacity-0 blur-md transition-opacity group-hover:opacity-100"></div>
                    </a>
                    <a href="#learn-more" class="group text-base font-medium text-white/80 hover:text-white flex items-center gap-1">
                        Learn more
                        <span class="text-lg transition-transform group-hover:translate-x-1" aria-hidden="true">→</span>
                    </a>
                </div>
            </div>
            <div class="mt-16 sm:mt-24 lg:mt-0 lg:flex-shrink-0 lg:flex-grow">
                <div class="relative mx-auto w-full max-w-xl lg:max-w-2xl">
                    <!-- Animated Gradient Border -->
                    <div class="absolute inset-0 -z-10 rounded-2xl bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 opacity-30 blur-2xl"></div>
                    
                    <!-- Preview Window -->
                    <div class="overflow-hidden rounded-2xl bg-gray-900/70 backdrop-blur-sm ring-1 ring-white/10">
                        <div class="flex items-center gap-x-4 border-b border-gray-800 bg-gray-800/40 px-4 py-3">
                            <div class="flex gap-x-2">
                                <div class="h-3 w-3 rounded-full bg-red-500"></div>
                                <div class="h-3 w-3 rounded-full bg-yellow-500"></div>
                                <div class="h-3 w-3 rounded-full bg-green-500"></div>
                            </div>
                        </div>
                        <div class="p-6 space-y-6">
                            <!-- Design Preview -->
                            <div class="relative">
                                <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/20 to-purple-500/20 rounded-lg"></div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="aspect-square rounded-lg bg-gradient-to-br from-pink-500 to-purple-600"></div>
                                    <div class="aspect-square rounded-lg bg-gradient-to-br from-blue-500 to-indigo-600"></div>
                                    <div class="aspect-square rounded-lg bg-gradient-to-br from-indigo-500 to-purple-600"></div>
                                    <div class="aspect-square rounded-lg bg-gradient-to-br from-purple-500 to-pink-600"></div>
                                </div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 shadow-xl ring-1 ring-white/20">
                                        <p class="text-sm text-white">Generating designs...</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Design Controls -->
                            <div class="flex items-center gap-3">
                                <div class="flex-1 h-2 bg-gray-700 rounded-full overflow-hidden">
                                    <div class="h-full w-2/3 bg-gradient-to-r from-indigo-500 to-purple-500"></div>
                                </div>
                                <span class="text-xs text-gray-400">67%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
