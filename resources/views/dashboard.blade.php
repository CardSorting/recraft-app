<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Image Generation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form id="imageGenerationForm" class="space-y-6">
                        <div>
                            <x-input-label for="prompt" :value="__('Image Prompt')" />
                            <x-text-input id="prompt" name="prompt" type="text" class="mt-1 block w-full" required />
                        </div>

                        <div>
                            <x-input-label for="image_size" :value="__('Image Size')" />
                            <select id="image_size" name="image_size" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                <option value="square_hd">Square HD</option>
                                <option value="square">Square</option>
                                <option value="portrait_4_3">Portrait 4:3</option>
                                <option value="portrait_16_9">Portrait 16:9</option>
                                <option value="landscape_4_3">Landscape 4:3</option>
                                <option value="landscape_16_9">Landscape 16:9</option>
                            </select>
                        </div>

                        <div>
                            <x-input-label for="style" :value="__('Style')" />
                            <select id="style" name="style" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                <option value="realistic_image">Realistic Image</option>
                                <option value="digital_illustration">Digital Illustration</option>
                                <option value="vector_illustration">Vector Illustration</option>
                            </select>
                        </div>

                        <div>
                            <x-primary-button type="submit" class="w-full justify-center">
                                {{ __('Generate Image') }}
                            </x-primary-button>
                        </div>
                    </form>

                    <div id="status" class="mt-6 hidden">
                        <div class="flex items-center justify-center">
                            <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-gray-900"></div>
                            <span class="ml-2">Generating image...</span>
                        </div>
                    </div>

                    <div id="result" class="mt-6 space-y-4">
                        <!-- Generated images will appear here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.getElementById('imageGenerationForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const form = e.target;
            const status = document.getElementById('status');
            const result = document.getElementById('result');
            
            status.classList.remove('hidden');
            result.innerHTML = '';

            try {
                // Generate the image
                const response = await fetch('/api/v1/images/generate', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        prompt: form.prompt.value,
                        image_size: form.image_size.value,
                        style: form.style.value
                    })
                });

                const data = await response.json();

                if (!response.ok) {
                    throw new Error(data.message || 'Failed to generate image');
                }

                // Display the generated images
                data.images.forEach(imageUrl => {
                    const img = document.createElement('img');
                    img.src = imageUrl;
                    img.className = 'w-full rounded-lg shadow-lg';
                    result.appendChild(img);
                });

            } catch (error) {
                result.innerHTML = `
                    <div class="bg-red-50 text-red-500 p-4 rounded-lg">
                        ${error.message}
                    </div>
                `;
            } finally {
                status.classList.add('hidden');
            }
        });
    </script>
    @endpush
</x-app-layout>
