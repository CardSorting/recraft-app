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
                        <div class="space-y-4">
                            <x-input-label for="emojis" :value="__('Select Emojis')" />
                            <div class="mt-2 flex flex-wrap gap-2 min-h-[3rem] p-2 border border-gray-300 rounded-md" id="selectedEmojis">
                                <!-- Selected emojis will appear here -->
                            </div>
                            <button type="button" id="emojiButton" class="mt-2 px-4 py-2 bg-gray-100 rounded-md hover:bg-gray-200">
                                Add Emoji 😊
                            </button>
                            <emoji-picker id="emojiPicker" class="hidden" style="position: absolute; z-index: 50;"></emoji-picker>
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
    <script type="module">
        import 'emoji-picker-element';
        
        const selectedEmojis = new Set();
        const selectedEmojisContainer = document.getElementById('selectedEmojis');
        const emojiButton = document.getElementById('emojiButton');
        const emojiPicker = document.getElementById('emojiPicker');
        
        // Load emoji categories from API
        async function loadEmojiCategories() {
            const response = await fetch('/api/v1/emoji/categories');
            const data = await response.json();
            return data.categories;
        }

        // Get suggestions for the selected emoji
        async function getSuggestions(emoji) {
            const response = await fetch('/api/v1/emoji/suggestions', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ emoji })
            });
            const data = await response.json();
            return data.suggestions;
        }

        // Preview the translation
        async function previewTranslation(emojis) {
            const response = await fetch('/api/v1/emoji/preview', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ emojis: Array.from(emojis) })
            });
            const data = await response.json();
            return data;
        }

        // Initialize categorized emojis
        loadEmojiCategories().then(categories => {
            const categoryTabs = document.createElement('div');
            categoryTabs.className = 'emoji-categories flex gap-2 mb-4';
            Object.entries(categories).forEach(([name, data]) => {
                const tab = document.createElement('button');
                tab.className = 'px-3 py-1 rounded-full bg-gray-100 hover:bg-gray-200 flex items-center gap-1';
                tab.innerHTML = `${data.icon} ${name}`;
                categoryTabs.appendChild(tab);
            });
            emojiPicker.insertAdjacentElement('beforebegin', categoryTabs);
        });

        // Toggle emoji picker
        emojiButton.addEventListener('click', () => {
            emojiPicker.classList.toggle('hidden');
            // Position the picker below the button
            const rect = emojiButton.getBoundingClientRect();
            emojiPicker.style.top = `${rect.bottom + window.scrollY}px`;
            emojiPicker.style.left = `${rect.left}px`;
        });

        // Show emoji suggestions
        async function showSuggestions(emoji) {
            const suggestions = await getSuggestions(emoji);
            if (suggestions.length > 0) {
                const suggestionContainer = document.createElement('div');
                suggestionContainer.className = 'mt-2 flex gap-2';
                suggestions.forEach(suggestion => {
                    const suggestionButton = document.createElement('button');
                    suggestionButton.className = 'px-2 py-1 bg-blue-50 text-blue-600 rounded-full hover:bg-blue-100 text-sm';
                    suggestionButton.textContent = `Add ${suggestion}`;
                    suggestionButton.onclick = () => addEmoji(suggestion);
                    suggestionContainer.appendChild(suggestionButton);
                });
                selectedEmojisContainer.appendChild(suggestionContainer);
            }
        }

        // Handle emoji selection
        emojiPicker.addEventListener('emoji-click', event => {
            const emoji = event.detail.unicode;
            if (!selectedEmojis.has(emoji)) {
                selectedEmojis.add(emoji);
                const emojiSpan = document.createElement('span');
                emojiSpan.className = 'inline-flex items-center gap-1 px-2 py-1 bg-gray-100 rounded-full text-lg';
                emojiSpan.innerHTML = `${emoji}<button type="button" class="text-gray-500 hover:text-gray-700">×</button>`;
                emojiSpan.querySelector('button').onclick = () => {
                    selectedEmojis.delete(emoji);
                    emojiSpan.remove();
                };
                selectedEmojisContainer.appendChild(emojiSpan);
            }
            emojiPicker.classList.add('hidden');
        });

        // Close picker when clicking outside
        document.addEventListener('click', event => {
            if (!emojiPicker.contains(event.target) && !emojiButton.contains(event.target)) {
                emojiPicker.classList.add('hidden');
            }
        });

        // Handle form submission
        document.getElementById('imageGenerationForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            if (selectedEmojis.size === 0) {
                alert('Please select at least one emoji');
                return;
            }

            const form = e.target;
            const status = document.getElementById('status');
            const result = document.getElementById('result');
            
            status.classList.remove('hidden');
            result.innerHTML = '';

            try {
                const response = await fetch('/api/v1/images/generate', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        emojis: Array.from(selectedEmojis),
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
