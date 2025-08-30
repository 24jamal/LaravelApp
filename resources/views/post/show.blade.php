<x-app-layout>
    <div class="py-4">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h1 class="text-2xl font-bold mb-6">{{ $post->title }}</h1>

                {{-- User Info --}}
                <div class="flex items-center gap-4 mb-6">
                    {{-- Avatar --}}
                    <x-user-avatar :user="$post->user" />


                    {{-- Name and Follow --}}
                    <div class="flex flex-col">

                        <x-follow-ctr :user="$post->user" class="flex items-center gap-2">
                            <a href="{{ route('profile.show', $post->user) }}"
                                class="hover-underline">{{ $post->user->name }}</a>
                            <button x-text="following ? 'Unfollow' : 'Follow'"
                                :class="following ? 'text-red-500 text-sm' : 'text-emerald-500 text-sm' "
                                @click="follow()"></button>
                        </x-follow-ctr>
                        <div class="text-gray-500 text-sm flex gap-2">
                            <span>{{ $post->readTime() }} min read</span>
                            <span>{{ $post->created_at->format('M d, Y') }}</span>
                        </div>
                    </div>
                </div>


                <x-clap-button :post="$post"></x-clap-button>

                {{-- Post Image --}}
                @if ($post->imageUrl())
                    <img src="{{ $post->imageUrl() }}" alt="{{ $post->title }}" class="w-full mb-6 rounded-lg">
                @endif



                {{-- Post Content --}}
                <div class="text-gray-800 leading-relaxed">
                    {!! nl2br(e($post->content)) !!}
                </div>

                <div class="mt-8 ">
                    <span class="px-4 py-2 bg-gray-300 rounded-xl">{{ $post->category->name }}</span>
                </div>
                <x-clap-button :post="$post"></x-clap-button>
                {{-- Clap Section (if needed) --}}
                <div class="mt-6">
                    {{-- Add your clap/like buttons here --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>