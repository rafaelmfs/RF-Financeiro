<!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->

<x-dropdown align="right" width="48">
    <x-slot name="trigger">
        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
            <img src="{{ asset('imagens/logo.rf.png') }}" some text width=50 height=50 class="mx-2">

            @php
            if(str_contains(Auth::user()->name, " ")){
                $nome = explode(" ", Auth::user()->name, 4);
                foreach($nome as $i => $palavra){
                    $palavra = ucwords(mb_strtolower($palavra, $encoding = mb_internal_encoding()));
                    $nome[$i] = $palavra;
                }
            }
            else{
                $nome = Auth::user()->name;
            }
            @endphp
            @if (is_iterable($nome))
                <div>{{ "$nome[0] $nome[1]"}}</div>
            @else
                <div>{{ "$nome"}}</div>
            @endif

            <div class="ml-1">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </div>
        </button>
    </x-slot>

    <x-slot name="content">
        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-dropdown-link>
        </form>
    </x-slot>
</x-dropdown>

