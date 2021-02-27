<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit book') }}
        </h2>
    </x-slot>
    <form method="get" action="{{ route('blog.update', ['blog' => $blog->id]) }}">
        @csrf
        <div>
            <x-label for="title" :value="__('Title')" />

            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="__($blog->name)" required autofocus />
            <input type="hidden" name="id" value="{{$blog->id}}">
        </div>

        <div class="flex items-center justify-end mt-4">

            <x-button class="ml-3">
                {{ __('Edit book') }}
            </x-button>
        </div>
    </form>
</x-app-layout>
