<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Show') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <!-- Display Post Details -->
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-200">Title:</label>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $post->title }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-200">Content:</label>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $post->content }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-200">Created At:</label>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $post->created_at->format('M d, Y H:i') }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-200">Updated At:</label>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $post->updated_at->format('M d, Y H:i') }}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>