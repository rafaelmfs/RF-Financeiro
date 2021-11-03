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
            @include('components.menu-logout')
        </div>
    </nav>

    <!-- sidebar -->
    <input type="checkbox" id="toggle">
    <label class="side-toggle"
    for="toggle"><span class="fas fa-bars"></span>
    </label>

    <div class="sidebar">
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            <div class="sidebar-menu">
                <span class="fas fa-chart-line"></span>
                <p>{{ __('Dashboard') }}</p>
            </div>
        </x-nav-link>
        <x-nav-link :href="route('adicionar')" :active="request()->routeIs('adicionar')">
            <div class="sidebar-menu">
                <span class="fas fa-plus"></span>
                <p>{{ __('Adicionar') }}</p>
            </div>
        </x-nav-link>
        <x-nav-link :href="route('consultar')" :active="request()->routeIs('consultar')">
            <div class="sidebar-menu">
                <span class="fas fa-list-alt"></span>
                <p>{{ __('Consultar') }}</p>
            </div>
        </x-nav-link>
        <x-nav-link {{-- :href="route('dashboard')" :active="request()->routeIs('dashboard')" --}}>
            <div class="sidebar-menu">
                <span class="fas fa-file-alt"></span>
                <p>{{ __('Relatório') }}</p>
            </div>
        </x-nav-link>
    </div>

</nav>

