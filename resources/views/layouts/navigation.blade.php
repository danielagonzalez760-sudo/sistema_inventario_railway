<nav x-data="{ open: false }" style="background:#0c2d6b;border-bottom:1px solid rgba(255,255,255,0.08);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center me-8">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('images/Logo_1.png') }}"
                            alt="Logo"
                            class="h-10 w-auto filter brightness-0 invert" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-1 sm:-my-px sm:flex items-center">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                        style="color:rgba(255,255,255,0.75);font-size:13px;padding:0 14px;height:64px;display:flex;align-items:center;border-bottom:2px solid transparent;transition:color .15s;"
                        x-bind:style="'{{ request()->routeIs('dashboard') ? 'color:#fff;border-bottom-color:#5ba3f5;' : '' }}'">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    @if(Auth::user()->roles->contains('name', 'admin'))
                        <x-nav-link :href="route('reservas.index')" :active="request()->routeIs('reservas.index')"
                            style="color:rgba(255,255,255,0.75);font-size:13px;padding:0 14px;height:64px;display:flex;align-items:center;border-bottom:2px solid transparent;">
                            {{ __('Ver Reservas') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.index')"
                            style="color:rgba(255,255,255,0.75);font-size:13px;padding:0 14px;height:64px;display:flex;align-items:center;border-bottom:2px solid transparent;">
                            {{ __('Users') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.reportes.formulario')" :active="request()->routeIs('admin.reportes.formulario')"
                            style="color:rgba(255,255,255,0.75);font-size:13px;padding:0 14px;height:64px;display:flex;align-items:center;border-bottom:2px solid transparent;">
                            {{ __('Reportes') }}
                        </x-nav-link>
                    @endif

                    @if (!request()->routeIs('dashboard.selector'))
                        @if(session('selected_role') === 'profesor' || (Auth::user()->roles->count() === 1 && Auth::user()->roles->contains('name', 'profesor')))
                            <x-nav-link :href="route('reservas.profesor')" :active="request()->routeIs('reservas.profesor')"
                                style="color:rgba(255,255,255,0.75);font-size:13px;padding:0 14px;height:64px;display:flex;align-items:center;border-bottom:2px solid transparent;">
                                {{ __('Items Disponibles') }}
                            </x-nav-link>
                        @endif
                        @if(session('selected_role') === 'estudiante' || (Auth::user()->roles->count() === 1 && Auth::user()->roles->contains('name', 'estudiante')))
                            <x-nav-link :href="route('reservas.estudiante')" :active="request()->routeIs('reservas.estudiante')"
                                style="color:rgba(255,255,255,0.75);font-size:13px;padding:0 14px;height:64px;display:flex;align-items:center;border-bottom:2px solid transparent;">
                                {{ __('Items Disponibles') }}
                            </x-nav-link>
                        @endif
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button style="display:inline-flex;align-items:center;gap:8px;padding:6px 14px;background:rgba(255,255,255,0.1);border:0.5px solid rgba(255,255,255,0.25);border-radius:6px;color:#fff;font-size:13px;font-weight:500;cursor:pointer;">
                            <span style="width:26px;height:26px;border-radius:50%;background:#5ba3f5;display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:600;color:#0c2d6b;">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </span>
                            {{ Auth::user()->name }}
                            <svg style="width:12px;height:12px;fill:#fff;opacity:.7;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                <svg style="width:15px;height:15px;flex-shrink:0;opacity:.6;" fill="none" stroke="#2d4a7a" viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                {{ __('Mi perfil') }}
                            </x-dropdown-link>

                            <div style="height:0.5px;background:#e8eef6;margin:4px 0;"></div>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();this.closest('form').submit();">
                                    <svg style="width:15px;height:15px;flex-shrink:0;opacity:.6;" fill="none" stroke="#e24b4a" viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                    </svg>
                                    <span style="color:#e24b4a;">{{ __('Cerrar sesión') }}</span>
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" style="color:rgba(255,255,255,0.7);padding:8px;border-radius:6px;">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden" style="background:#0c2d6b;border-top:1px solid rgba(255,255,255,0.1);">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                style="color:rgba(255,255,255,0.85);font-size:14px;">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-4 pb-1 border-t" style="border-color:rgba(255,255,255,0.1);">
            <div class="px-4">
                <div style="font-weight:500;font-size:14px;color:#fff;">{{ Auth::user()->name }}</div>
                <div style="font-size:12px;color:rgba(255,255,255,0.5);">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" style="color:rgba(255,255,255,0.75);">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();this.closest('form').submit();"
                        style="color:rgba(255,255,255,0.75);">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>