@props(['testimonials' => []])

<div class="relative isolate bg-white py-24 sm:py-32 dark:bg-gray-900">
    <!-- Gradient background -->
    <div class="absolute inset-0 -z-10 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-50 via-white to-pink-50 dark:from-indigo-950 dark:via-gray-900 dark:to-pink-950 opacity-50"></div>
        <div class="absolute inset-y-0 right-1/2 -z-10 mr-16 w-[200%] origin-bottom-left skew-x-[-30deg] bg-white dark:bg-gray-900 shadow-xl shadow-indigo-600/10 ring-1 ring-indigo-50 dark:ring-indigo-900"></div>
    </div>

    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-xl text-center">
            <h2 class="text-lg font-semibold leading-8 tracking-tight text-indigo-600 dark:text-indigo-400">Testimonials</h2>
            <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl dark:text-white">Loved by designers worldwide</p>
        </div>

        <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 grid-rows-1 gap-8 text-sm leading-6 text-gray-900 sm:mt-20 sm:grid-cols-2 xl:mx-0 xl:max-w-none xl:grid-cols-3">
            <!-- Sarah Johnson -->
            <div class="group relative rounded-2xl bg-white/50 p-8 hover:bg-white/80 transition-colors duration-300 backdrop-blur-sm dark:bg-gray-800/50 dark:hover:bg-gray-800/80">
                <div class="flex flex-col gap-4">
                    <div class="relative">
                        <blockquote class="font-serif text-lg italic text-gray-900 dark:text-white">
                            "Recraft has completely transformed how we approach design. The AI-powered features have saved us countless hours."
                        </blockquote>
                        <div class="absolute -left-4 -top-4 text-6xl text-indigo-200 dark:text-indigo-800 font-serif">"</div>
                    </div>
                    <div>
                        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent text-xl font-bold">
                            Sarah Johnson
                        </div>
                        <div class="text-sm text-gray-600 dark:text-gray-400 font-medium tracking-wide uppercase mt-1">
                            Creative Director at DesignCo
                        </div>
                    </div>
                </div>
            </div>

            <!-- Michael Chen -->
            <div class="group relative rounded-2xl bg-white/50 p-8 hover:bg-white/80 transition-colors duration-300 backdrop-blur-sm dark:bg-gray-800/50 dark:hover:bg-gray-800/80">
                <div class="flex flex-col gap-4">
                    <div class="relative">
                        <blockquote class="font-serif text-lg italic text-gray-900 dark:text-white">
                            "The smart templates are a game-changer. I can create professional designs for my clients in a fraction of the time."
                        </blockquote>
                        <div class="absolute -left-4 -top-4 text-6xl text-indigo-200 dark:text-indigo-800 font-serif">"</div>
                    </div>
                    <div>
                        <div class="text-xl font-black tracking-tight text-gray-900 dark:text-white group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">
                            MICHAEL CHEN
                        </div>
                        <div class="text-sm text-gray-600 dark:text-gray-400 font-medium tracking-wide uppercase mt-1">
                            Freelance Designer
                        </div>
                    </div>
                </div>
            </div>

            <!-- Emily Rodriguez -->
            <div class="group relative rounded-2xl bg-white/50 p-8 hover:bg-white/80 transition-colors duration-300 backdrop-blur-sm dark:bg-gray-800/50 dark:hover:bg-gray-800/80">
                <div class="flex flex-col gap-4">
                    <div class="relative">
                        <blockquote class="font-serif text-lg italic text-gray-900 dark:text-white">
                            "Our team's productivity has increased tenfold since we started using Recraft. The collaboration features are exceptional."
                        </blockquote>
                        <div class="absolute -left-4 -top-4 text-6xl text-indigo-200 dark:text-indigo-800 font-serif">"</div>
                    </div>
                    <div>
                        <div class="font-mono text-xl font-bold text-gray-900 dark:text-white">
                            Emily<span class="text-indigo-600 dark:text-indigo-400">.Rodriguez</span>
                        </div>
                        <div class="text-sm text-gray-600 dark:text-gray-400 font-medium tracking-wide uppercase mt-1">
                            Marketing Manager
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
