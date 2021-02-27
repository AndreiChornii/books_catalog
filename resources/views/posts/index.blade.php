<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts of blog') }} - {{ $blog->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul class="list-disc">
                        @foreach($posts as $post)
                            <li>
                                <a href="{{route('posts.show', ['post' => $post->id])}}">{{$post->title}}
                                <form method="post" action="{{ route('posts.edit', ['post' => $post->id]) }}">
                                    <input type="hidden" name="id" value="{{$post->id}}">
                                    <input type="hidden" name="title" value="{{$post->title}}">
                                    <input type="hidden" name="content" value="{{$post->content}}">
                                    @csrf
                                    <div class="flex items-center justify-begin mt-4">

                                        <x-button class="ml-3">
                                            {{ __('update annotation') }}
                                        </x-button>
                                    </div>
                                </form>
                                <form method="post" action="{{ route('post.delete', ['post' => $post->id]) }}">
                                    <input type="hidden" name="id" value="{{$post->id}}">
                                    @csrf
                                    <div class="flex items-center justify-begin mt-4">

                                        <x-button class="ml-3">
                                            {{ __('delete annotation') }}
                                        </x-button>
                                    </div>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <form method="GET" action="{{ route('create.post', ['blog' => $blog->id]) }}">
                    @csrf
                    <div class="flex items-center justify-begin mt-4">

                        <x-button class="ml-3">
                            {{ __('Create annotation') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
