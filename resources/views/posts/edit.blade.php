<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit annotation') }}
        </h2>
    </x-slot>
    <form method="post" action="{{ route('post.update', ['post' => $post->id]) }}">
        @csrf
        <div>
{{--            <x-label for="title" :value="__('Title')" />--}}
{{--            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="__($post->title)" required autofocus />--}}

            <x-label for="content" :value="__('Annotation')" />
            <x-input id="content" class="block mt-1 w-full" type="text" name="content" :value="__($post->content)" required autofocus />

            <input type="hidden" name="id" value="{{$post->id}}">
        </div>

{{--        <div class="mt-4">--}}


{{--            <x-textarea id="content" class="block mt-1 w-full"--}}
{{--                        name="content"--}}
{{--                        :value="__($post->content)"--}}
{{--                        required--}}
{{--                        autocomplete="current-password" />--}}
{{--        </div>--}}

        <div class="flex items-center justify-end mt-4">

            <x-button class="ml-3">
                {{ __('Edit annotation') }}
            </x-button>
        </div>
    </form>
</x-app-layout>
