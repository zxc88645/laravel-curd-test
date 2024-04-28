
@props(['message'])

<div x-data="{ show: false }"
     x-show="show"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-300"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     x-init="$nextTick(() => { if('{{ $message }}') { show = true; setTimeout(() => show = false, 3000); }})"
     class="fixed bottom-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow-lg"
     style="display: none;">
    {{ $message }}
</div>