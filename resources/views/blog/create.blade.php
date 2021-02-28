@if (isset(Auth::user()->name))
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create book') }}
            </h2>
        </x-slot>
        <form method="POST" action="{{ route('blogs.store') }}" enctype="multipart/form-data">
            @csrf
            <div>
                <x-label for="title" :value="__('Title')" />

                <x-input id="title" class="block mt-1 w-full" type="text" name="title" required autofocus />
            </div>

            <div>
                <x-label for="author" :value="__('Author')" />

                <x-input id="author" class="block mt-1 w-full" type="text" name="author" required autofocus />
            </div>

            <div>
                <x-label for="genre" :value="__('Genre')" />

                <x-input id="genre" class="block mt-1 w-full" type="text" name="genre" required autofocus />
            </div>
            
            <!-- file -->
            <div>
                <x-label for="file" :value="__('Books_picture')" />

                <x-input id="file" class="block mt-1 w-full" type="file" name="file" required autofocus />
            </div>

                <x-button class="ml-3">
                    {{ __('Create book') }}
                </x-button>
            </div>
        </form>
    </x-app-layout>
@else
    <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
        {{ __('You should login') }}
    </x-nav-link>
@endif
