<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth" x-data="{ darkMode: false }" :class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recraft AI - AI-Powered Design Studio</title>
    <meta name="description" content="Transform your creative process with AI-powered design tools">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-white dark:bg-gray-900" x-cloak>
    <x-landing.sticky-nav :transparent="false" />

    <main class="relative">
        <!-- Hero Section -->
<x-landing.hero
    title="Transform Your Ideas"
    subtitle="Create stunning designs with AI-powered tools"
/>

        <!-- Features Section -->
<x-landing.features :features="[
    [
        'title' => 'AI-Powered Design',
        'description' => 'Generate professional designs in seconds using our advanced AI algorithms trained on millions of high-quality designs.',
        'icon' => 'ai-powered-design-icon.html',
        'link' => '#'
    ],
    [
        'title' => 'Smart Templates',
        'description' => 'Access thousands of customizable templates that adapt to your brand style automatically.',
        'icon' => 'smart-templates-icon.html',
        'link' => '#'
    ],
    [
        'title' => 'Real-time Collaboration',
        'description' => 'Work seamlessly with your team in real-time, share designs, and get instant feedback.',
        'icon' => 'real-time-collaboration-icon.html',
        'link' => '#'
    ]
]" />

        <!-- How It Works Section -->
<x-landing.how-it-works :steps="[
    [
        'title' => 'Describe Your Vision',
        'description' => 'Simply describe what you want to create using natural language. Our AI understands your intent.',
        'icon' => 'describe-vision-icon.html',
        'status' => 'Start Here'
    ],
    [
        'title' => 'AI Generation',
        'description' => 'Our AI processes your request and generates multiple design options in seconds.',
        'icon' => 'ai-generation-icon.html',
        'status' => 'Processing'
    ],
    [
        'title' => 'Customize & Export',
        'description' => 'Fine-tune your designs with our intuitive editor and export in any format you need.',
        'icon' => 'customize-export-icon.html',
        'status' => 'Final Step'
    ]
]" />

        <!-- Trust Indicators Section -->
<x-landing.trust-indicators
    :partners="[
        ['name' => 'Acme Corp', 'svg' => 'acme-corp-icon.html'],
        ['name' => 'Static LLC', 'svg' => 'static-llc-icon.html'],
        ['name' => 'Statamic', 'svg' => 'statamic-icon.html'],
        ['name' => 'Tuple', 'svg' => 'tuple-icon.html'],
        ['name' => 'Laravel', 'svg' => 'laravel-icon.html'],
        ['name' => 'Tailwind CSS', 'svg' => 'tailwind-css-icon.html'],
    ]"
    :metrics="[
        ['value' => '99.99%', 'label' => 'Uptime Guarantee'],
        ['value' => '24/7', 'label' => 'Customer Support'],
        ['value' => '300k+', 'label' => 'Designs Created'],
        ['value' => '99.7%', 'label' => 'Customer Satisfaction']
    ]"
    :badges="[
        ['name' => 'ISO 27001 Certified', 'icon' => 'https://placehold.co/48x48/png', 'description' => 'Information Security Management'],
        ['name' => 'SOC 2 Compliant', 'icon' => 'https://placehold.co/48x48/png', 'description' => 'System and Organization Controls 2'],
        ['name' => 'GDPR Compliant', 'icon' => 'https://placehold.co/48x48/png', 'description' => 'General Data Protection Regulation']
    ]"
/>

        <!-- Testimonials Section -->
<x-landing.testimonials :testimonials="[
    [
        'name' => 'Sarah Johnson',
        'title' => 'Creative Director at DesignCo',
        'quote' => 'Recraft has completely transformed how we approach design. The AI-powered features have saved us countless hours.',
        'avatar' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
        'rating' => 5
    ],
    [
        'name' => 'Michael Chen',
        'title' => 'Freelance Designer',
        'quote' => 'The smart templates are a game-changer. I can create professional designs for my clients in a fraction of the time.',
        'avatar' => 'https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
        'rating' => 5
    ],
    [
        'name' => 'Emily Rodriguez',
        'title' => 'Marketing Manager',
        'quote' => 'Our team\'s productivity has increased tenfold since we started using Recraft. The collaboration features are exceptional.',
        'avatar' => 'https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
        'rating' => 5
    ]
]" />

        <!-- CTA Section -->
<x-landing.cta
    title="Ready to transform your creative process?"
    subtitle="Get started today and join thousands of satisfied designers worldwide."
    buttonText="Get started today"
    buttonLink="{{ route('register') }}"
/>
    </main>

    <!-- Footer -->
    <footer class="bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-800">
        <div class="mx-auto max-w-7xl px-6 py-12 md:flex md:items-center md:justify-between lg:px-8">
            <div class="mt-8 md:mt-0">
                <p class="text-center text-xs leading-5 text-gray-500 dark:text-gray-400">
                    &copy; {{ date('Y') }} Recraft AI. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
</body>
</html>
