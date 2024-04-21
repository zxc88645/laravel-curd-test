<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">  

                    <!-- Session Status Toast using Alpine.js -->
                    <div x-data="{ show: false }"
                         x-show="show"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0"
                         x-transition:enter-end="opacity-100"
                         x-transition:leave="transition ease-in duration-300"
                         x-transition:leave-start="opacity-100"
                         x-transition:leave-end="opacity-0"
                         x-init="$nextTick(() => { if('{{ session('success') }}') { show = true; setTimeout(() => show = false, 3000); }})"
                         class="fixed bottom-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow-lg"
                         style="display: none;">
                        {{ session('success') }}
                    </div>

                    <!-- 顯示文章清單 -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-700">
                            <thead class="bg-gray-800">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Id</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Title</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Content</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Created At</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Updated At</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-gray-900 divide-y divide-gray-700">
                                @foreach ($posts as $post)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-300">{{ $post->id }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-300">{{ $post->title }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-300 overflow-hidden text-ellipsis" style="max-width: 250px;">{{ $post->content }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-300">{{ $post->created_at }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-300">{{ $post->updated_at }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('posts.edit', $post->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- 添加分頁鏈接 -->
                    <div class="bg-gray-800 px-6 py-4">
                        {{ $posts->appends(['perPage' => request('perPage')])->links() }}
                    </div>
                    
                    <!-- 顯示每頁顯示數量設定表單 -->
                    <form action="{{ route('posts.index') }}" method="GET" class="mb-4 flex items-center justify-end">
                        <label for="perPage" class="mr-2 text-gray-200">{{ __('Items per page:') }}</label>
                        <select name="perPage" id="perPage" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="5" @if ($posts->perPage() == 5) selected @endif>5</option>
                            <option value="10" @if ($posts->perPage() == 10) selected @endif>10</option>
                            <option value="15" @if ($posts->perPage() == 15) selected @endif>15</option>
                            <option value="20" @if ($posts->perPage() == 20) selected @endif>20</option>
                        </select>
                        <button type="submit" class="border rounded px-3 py-1 bg-gray-500 hover:bg-blue-600 text-white transition-colors">
                            更新
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>