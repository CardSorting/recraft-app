import './bootstrap';
import 'emoji-picker-element';

// Add emoji picker styles
const style = document.createElement('style');
style.textContent = `
    emoji-picker {
        width: 100%;
        max-width: 400px;
        height: 400px;
        --background: white;
        --border-radius: 0.5rem;
        --category-emoji-padding: 0.5rem;
        --emoji-padding: 0.25rem;
        --indicator-color: #4f46e5;
        --input-border-color: #e5e7eb;
        --input-font-color: #374151;
        --input-placeholder-color: #9ca3af;
        --num-columns: 8;
        --outline-color: #4f46e5;
    }
`;
document.head.appendChild(style);
