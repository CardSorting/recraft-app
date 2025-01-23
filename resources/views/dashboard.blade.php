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
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <x-input-label for="emojis" :value="__('Select Emojis')" />
                                    <span class="text-sm text-gray-500" id="emojiCount">0/5</span>
                                </div>
                                <button type="button" id="emojiButton" 
                                    class="flex items-center gap-2 px-4 py-2 bg-indigo-50 text-indigo-600 rounded-md hover:bg-indigo-100 transition-colors">
                                    <span>Choose Emoji</span>
                                    <span class="text-xl">+</span>
                                </button>
                            </div>

                            <div class="relative">
                                <div class="p-4 bg-gray-50 border border-gray-200 rounded-lg">
                                    <div id="selectedEmojis" class="flex flex-wrap gap-2 min-h-[3rem]">
                                        <!-- Selected emojis will appear here -->
                                    </div>
                                    <div id="emptyState" class="absolute inset-0 flex items-center justify-center text-gray-400 pointer-events-none">
                                        <p class="text-sm">Click "Choose Emoji" to start building your scene</p>
                                    </div>
                                </div>
                                <div id="emojiSuggestions" class="mt-3 flex flex-wrap gap-2">
                                    <!-- Suggestions will appear here -->
                                </div>
                                <div id="previewTranslation" class="mt-2 text-sm text-gray-600 italic">
                                    <!-- Translation preview will appear here -->
                                </div>
                            </div>

                            <div id="emojiPickerContainer" class="hidden">
                                <div class="fixed inset-0 bg-black bg-opacity-25 z-40"></div>
                                <div class="fixed left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 z-50 bg-white rounded-lg shadow-xl p-4 max-w-lg w-full">
                                    <div class="flex justify-between items-center mb-4">
                                        <h3 class="text-lg font-semibold">Choose Emoji</h3>
                                        <button type="button" class="text-gray-400 hover:text-gray-500" id="closeEmojiPicker">
                                            <span class="sr-only">Close</span>
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div id="emojiCategories" class="mb-4 flex gap-2 overflow-x-auto pb-2">
                                        <!-- Category tabs will appear here -->
                                    </div>
                                    <emoji-picker id="emojiPicker" class="light"></emoji-picker>
                                </div>
                            </div>
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
        const MAX_EMOJIS = 5;
        const selectedEmojis = new Set();
        const selectedEmojisContainer = document.getElementById('selectedEmojis');
        const emptyState = document.getElementById('emptyState');
        const emojiButton = document.getElementById('emojiButton');
        const emojiCount = document.getElementById('emojiCount');
        const emojiPickerContainer = document.getElementById('emojiPickerContainer');
        const emojiPicker = document.getElementById('emojiPicker');
        const emojiSuggestions = document.getElementById('emojiSuggestions');
        const previewTranslation = document.getElementById('previewTranslation');
        const closeEmojiPicker = document.getElementById('closeEmojiPicker');
        
        // CSS styles
        document.head.appendChild(Object.assign(document.createElement('style'), {
            textContent: `
                emoji-picker {
                    width: 100%;
                    height: 350px;
                    --background: white;
                    --category-emoji-padding: 0.5rem;
                    --emoji-padding: 0.25rem;
                    --indicator-color: rgb(79 70 229);
                    --border-radius: 0.5rem;
                    --num-columns: 8;
                }
                @keyframes scaleIn {
                    from { transform: scale(0.95); opacity: 0; }
                    to { transform: scale(1); opacity: 1; }
                }
                .emoji-enter {
                    animation: scaleIn 0.15s ease-out;
                }
                @keyframes slideIn {
                    from { transform: translateY(-10px); opacity: 0; }
                    to { transform: translateY(0); opacity: 1; }
                }
                .suggestion-enter {
                    animation: slideIn 0.2s ease-out;
                }
            `
        }));

        function updateEmptyState() {
            emptyState.style.display = selectedEmojis.size === 0 ? 'flex' : 'none';
        }

        function updateEmojiCount() {
            emojiCount.textContent = `${selectedEmojis.size}/${MAX_EMOJIS}`;
            emojiButton.disabled = selectedEmojis.size >= MAX_EMOJIS;
            if (selectedEmojis.size >= MAX_EMOJIS) {
                emojiButton.classList.remove('bg-indigo-50', 'text-indigo-600', 'hover:bg-indigo-100');
                emojiButton.classList.add('bg-gray-100', 'text-gray-400', 'cursor-not-allowed');
            } else {
                emojiButton.classList.remove('bg-gray-100', 'text-gray-400', 'cursor-not-allowed');
                emojiButton.classList.add('bg-indigo-50', 'text-indigo-600', 'hover:bg-indigo-100');
            }
        }

        function addEmoji(emoji) {
            if (selectedEmojis.size >= MAX_EMOJIS) {
                alert(`You can only select up to ${MAX_EMOJIS} emojis`);
                return;
            }

            if (!selectedEmojis.has(emoji)) {
                selectedEmojis.add(emoji);
                
                const emojiSpan = document.createElement('span');
                emojiSpan.className = 'inline-flex items-center gap-1 px-3 py-2 bg-white border border-gray-200 shadow-sm rounded-full text-lg emoji-enter group';
                emojiSpan.innerHTML = `
                    ${emoji}
                    <button type="button" class="opacity-0 group-hover:opacity-100 text-gray-400 hover:text-red-500 transition-all">
                        ×
                    </button>
                `;
                
                emojiSpan.querySelector('button').onclick = () => {
                    selectedEmojis.delete(emoji);
                    emojiSpan.remove();
                    updateEmojiCount();
                    updateEmptyState();
                    if (selectedEmojis.size === 0) {
                        emojiSuggestions.innerHTML = '';
                        previewTranslation.innerHTML = '';
                    } else {
                        updatePreview();
                    }
                };
                
                selectedEmojisContainer.appendChild(emojiSpan);
                updateEmojiCount();
                updateEmptyState();
                showSuggestions(emoji);
                updatePreview();
            }
            emojiPickerContainer.classList.add('hidden');
        }

        async function showSuggestions(emoji) {
            const suggestions = await getSuggestions(emoji);
            if (suggestions.length > 0) {
                emojiSuggestions.innerHTML = '';
                suggestions.forEach(suggestion => {
                    if (!selectedEmojis.has(suggestion)) {
                        const button = document.createElement('button');
                        button.className = 'px-3 py-1.5 bg-gray-50 text-gray-700 rounded-full hover:bg-gray-100 text-sm suggestion-enter flex items-center gap-1.5 transition-colors';
                        button.innerHTML = `
                            <span>Add</span>
                            <span class="text-base">${suggestion}</span>
                        `;
                        button.onclick = () => addEmoji(suggestion);
                        emojiSuggestions.appendChild(button);
                    }
                });
            }
        }

        async function updatePreview() {
            if (selectedEmojis.size > 0) {
                const preview = await previewTranslation(Array.from(selectedEmojis));
                previewTranslation.textContent = `Will generate: ${preview.final_translation}`;
                previewTranslation.classList.add('suggestion-enter');
            }
        }

        // Event listeners
        emojiButton.addEventListener('click', () => {
            if (!emojiButton.disabled) {
                emojiPickerContainer.classList.remove('hidden');
            }
        });

        closeEmojiPicker.addEventListener('click', () => {
            emojiPickerContainer.classList.add('hidden');
        });

        document.querySelector('#emojiPickerContainer .fixed.inset-0').addEventListener('click', () => {
            emojiPickerContainer.classList.add('hidden');
        });

        document.querySelector('#emojiPickerContainer .fixed.left-1/2').addEventListener('click', e => {
            e.stopPropagation();
        });

        emojiPicker.addEventListener('emoji-click', event => {
            addEmoji(event.detail.unicode);
        });

        // Initialize
        loadEmojiCategories().then(categories => {
            const categoryTabs = document.getElementById('emojiCategories');
            Object.entries(categories).forEach(([name, data]) => {
                const tab = document.createElement('button');
                tab.className = 'flex-shrink-0 px-3 py-1.5 bg-gray-50 rounded-full hover:bg-gray-100 flex items-center gap-1.5 text-sm transition-colors';
                tab.innerHTML = `${data.icon} ${name}`;
                categoryTabs.appendChild(tab);
            });
        });

        updateEmptyState();
        updateEmojiCount();
    </script>
    @endpush
</x-app-layout>
