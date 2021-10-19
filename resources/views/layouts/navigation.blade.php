<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">

    <!-- Primary Navigation Menu -->
       <!-- navbar -->
    <nav class="nav-bar">
        <header class="">
            <div>
                {{ $header }}
            </div>
        </header>
        <div class="profile">
            <span class="fas fa-search"></span>
            @include('components.menu-logout')
        </div>
    </nav>

    <!-- sidebar -->
    <input type="checkbox" id="toggle">
    <label class="side-toggle"
    for="toggle"><span class="fas fa-bars"></span>
    </label>

    <div class="sidebar">
        <div class="sidebar-menu">
            <span class="fas
            fa-cog"></span>
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-nav-link>
        </div>
        <div class="sidebar-menu">
            <span class="fas fa-chart-line"></span>
                <x-nav-link :href="route('adicionar')" :active="request()->routeIs('adicionar')">
                    {{ __('Adicionar') }}
                </x-nav-link>
        </div>
        <div class="sidebar-menu">
            <span class="fas fa-list-alt"></span>
            <x-nav-link {{-- :href="route('dashboard')" :active="request()->routeIs('dashboard')" --}}>
                {{ __('Consultar') }}
            </x-nav-link>
        </div>
        <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span>
            <x-nav-link {{-- :href="route('dashboard')" :active="request()->routeIs('dashboard')" --}}>
                {{ __('Relatório') }}
            </x-nav-link>
        </div>
    </div>

</nav>

