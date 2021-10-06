<nav x-data="{ open: false }" class="bg-blue-900 text-gray-300 border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto px-4">
        <div class="flex justify-between h-10">
            <div class="flex">
                <!-- Logo -->
                <a href="{{ route('dashboard') }}" class="flex-shrink-0 flex items-center">
                    <x-application-logo class="block h-8 w-auto fill-current" />
                    <div class="ml-2 text-lg">Consulto</div>
                </a>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:px-3 sm:ml-5 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:flex">
                    <x-nav-link :href="route('lead.index')" :active="request()->routeIs('lead.*')">
                        {{ __('Lead') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:flex">
                    <x-nav-link :href="route('follow-up.index')" :active="request()->routeIs('follow-up.*')">
                        {{ __('Follow Up') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:flex">
                    <x-nav-link :href="route('appointment.index')" :active="request()->routeIs('appointment.*')">
                        {{ __('Appointment') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:flex">
                    <x-nav-link :href="route('file-open.index')" :active="request()->routeIs('file-open.*')">
                        {{ __('File Open') }}
                    </x-nav-link>
                </div>
                @can('access payment')
                <div class="hidden space-x-8 sm:-my-px sm:flex">
                    <x-nav-link :href="route('payment.index')" :active="request()->routeIs('payment.*')">
                        {{ __('Payment') }}
                    </x-nav-link>
                </div>
                @endcan
                <div class="hidden space-x-8 sm:-my-px sm:flex">
                    <x-nav-link :href="route('processing.index')" :active="request()->routeIs('processing.*')">
                        {{ __('Processing') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:flex">
                    <x-nav-link :href="route('archive.index')" :active="request()->routeIs('archive.*')">
                        {{ __('Archive') }}
                    </x-nav-link>
                </div>
                @can('access report')
                <div class="hidden space-x-8 sm:-my-px sm:flex">
                    <x-nav-link :href="route('report.index')" :active="request()->routeIs('report.*')">
                        {{ __('Report') }}
                    </x-nav-link>
                </div>
                @endcan
                @can('access admin')
                <div class="hidden space-x-8 sm:-my-px sm:flex">
                    <x-nav-link :href="route('user.index')" :active="request()->is('admin/*')">
                        {{ __('Admin') }}
                    </x-nav-link>
                </div>
                @endcan
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex items-center text-sm font-medium hover:text-white hover:border-gray-300 focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('lead.index')" :active="request()->routeIs('lead.*')">
                {{ __('Lead') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('follow-up.index')" :active="request()->routeIs('follow-up.*')">
                {{ __('Follow Up') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('appointment.index')" :active="request()->routeIs('appointment.*')">
                {{ __('Appointment') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('file-open.index')" :active="request()->routeIs('file-open.*')">
                {{ __('File Open') }}
            </x-responsive-nav-link>
            @can('access payment')
            <x-responsive-nav-link :href="route('payment.index')" :active="request()->routeIs('payment.*')">
                {{ __('payment') }}
            </x-responsive-nav-link>
            @endcan
            <x-responsive-nav-link :href="route('processing.index')" :active="request()->routeIs('processing.*')">
                {{ __('processing') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('archive.index')" :active="request()->routeIs('archive.*')">
                {{ __('Archive') }}
            </x-responsive-nav-link>
            @can('access report')
            <x-responsive-nav-link :href="route('report.index')" :active="request()->routeIs('report.*')">
                {{ __('Report') }}
            </x-responsive-nav-link>
            @endcan
            @can('access admin')
            <x-responsive-nav-link :href="route('user.index')" :active="request()->is('admin/*')">
                {{ __('Admin') }}
            </x-responsive-nav-link>
            @endcan
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-800">
            <div class="px-4">
                <div class="font-medium text-base text-gray-100">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-300">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>