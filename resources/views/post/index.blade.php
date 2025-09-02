<x-app-layout>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-8 text-gray-900">
                <div class="p-4">

                    @forelse ($posts as $post)


                        <x-post-item :post="$post" />



                    @empty
                        <div class="text-center text-gray-400 py-16">No Posts Found</div>

                    @endforelse




                    <ul
                        class="flex flex-wrap text-sm font-medium text-center text-gray-500 dark:text-gray-400 justify-center">
                        <li class="me-2">
                            <a href="/" class="{{ request('category')
    ? 'inline-block px-4 py-3 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white'
    : 'inline-block px-4 py-3 text-white bg-blue-600 rounded-lg active' }}" aria-current="page">
                                All
                            </a>
                        </li>

                        @foreach ($categories as $category)

                                            <li class=" me-2">
                                                <a href="{{ route('post.byCategory', $category) }}"
                                                    class="{{ Route::currentRouteNamed('post.byCategory') && request()->route('category')->id == $category->id
                            ? 'inline-block px-4 py-3 text-white bg-blue-600 rounded-lg active'
                            : 'inline-block px-4 py-3 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white' }}">
                                                    {{ $category->name }}
                                                </a>

                                            </li>
                        @endforeach

                        <li class=" me-2">
                            <a href="#"
                                class="inline-block px-4 py-3 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white">
                                @foreach ($posts as $post)

                                @endforeach
                            </a>
                        </li>


                    </ul>



                </div>
            </div>
            {{ $posts->onEachSide(1)->links() }}

        </div>
    </div>
</x-app-layout>