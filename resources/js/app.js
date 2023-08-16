// Workaround for bug `wire:navigate` scroll
document.addEventListener('livewire:navigated', () => window.scrollTo(0, 0));