<x-dropdown>
    <x-slot name="trigger">
        <button class="">
            {{$name}}
        </button>
    </x-slot>

    <x-slot name="content">
        <x-dropdown-link :href="route('logout')">
            {{ __('Link 1') }}
            {{ __('Link 2') }}
            {{ __('Link 3') }}
        </x-dropdown-link>
    </x-slot>
</x-dropdown>
