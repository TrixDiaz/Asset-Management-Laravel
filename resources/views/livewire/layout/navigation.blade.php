<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" wire:navigate>
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex uppercase">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('Home') }}
                    </x-nav-link>
                </div>


            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <div class="flex items-center relative mx-2">
                    <div class="absolute w-4 h-4 bg-red-500 border-1 border-white rounded-full top-0 right-0 transform translate-x-1/2 -translate-y-1/2 dark:border-gray-900 flex justify-center items-center text-white text-xs">
                        <span style="font-size: 10px;" class="text-white flex justify-center items-center">11</span>
                    </div>
                    <x-icons.bell-icon class="h-5 w-5 text-gray-500 dark:text-gray-400 cursor-pointer"
                        type="button" data-drawer-target="drawer-right-notification" data-drawer-show="drawer-right-notification" data-drawer-placement="right" aria-controls="drawer-right-notification" />
                </div>

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150 uppercase">
                            <div x-data="{{ json_encode(['name' => auth()->user()->first_name . ' ' . auth()->user()->last_name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link class="hover:bg-white dark:hover:bg-transparent dark:focus:bg-transparent">
                            <!-- Button to toggle dark mode -->
                            <div class="flex items-center justify-center space-x-4">
                                <!-- Light mode button -->
                                <button id="theme-toggle-light" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 rounded-lg text-sm p-2.5">
                                    <x-icons.moon-icon />
                                </button>
                                <!-- Dark mode button -->
                                <button id="theme-toggle-dark" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 rounded-lg text-sm p-2.5">
                                    <x-icons.sun-icon />
                                </button>
                                <!-- System mode button -->
                                <button id="theme-toggle-system" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 rounded-lg text-sm p-2.5">
                                    <x-icons.computer-icon />
                                </button>
                            </div>
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('profile')" wire:navigate>
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <button wire:click="logout" class="w-full text-start">
                            <x-dropdown-link>
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </button>
                    </x-slot>
                </x-dropdown>
            </div>


            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <div class="flex items-center relative mx-2">
                    <div class="absolute w-4 h-4 bg-red-500 border-1 border-white rounded-full top-0 right-0 transform translate-x-1/2 -translate-y-1/2 dark:border-gray-900 flex justify-center items-center text-white text-xs">
                        <span style="font-size: 10px;" class="text-white flex justify-center items-center">11</span>
                    </div>
                    <x-icons.bell-icon class="h-5 w-5 text-gray-500 dark:text-gray-400 cursor-pointer"
                        type="button" data-drawer-target="drawer-right-notification" data-drawer-show="drawer-right-notification" data-drawer-placement="right" aria-controls="drawer-right-notification" />
                </div>
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out uppercase">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden uppercase">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                {{ __('Home') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200" x-data="{{ json_encode(['name' => auth()->user()->first_name . ' ' . auth()->user()->last_name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                <div class="font-medium text-sm text-gray-500">{{ auth()->user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile')" wire:navigate>
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <button wire:click="logout" class="w-full text-start">
                    <x-responsive-nav-link>
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </button>
            </div>
        </div>
    </div>

    <!-- Drawer Notification component -->
    <div id="drawer-right-notification" class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-80 md:w-1/4 dark:bg-gray-800 ease-in-out duration-300" tabindex="-1" aria-labelledby="drawer-right-label">
        <h5 id="drawer-right-label" class="inline-flex items-center mb-4 text-base font-semibold dark:text-white">
            Notifications <span class="text-red-500 dark:text-white dark:bg-red-500 border dark:border-gray-900 rounded-full px-1 mx-1 text-xs text-center">11</span>
        </h5>
        <button type="button" data-drawer-hide="drawer-right-notification" aria-controls="drawer-right-notification" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
            <x-icons.x-icon />
            <span class="sr-only">Close menu</span>
        </button>
        <div class="flex justify-start items-center space-x-4 mb-2">
            <h2 class="text-sm font-medium text-gray-500 dark:text-yellow-400 cursor-pointer">Mark as All Read</h2>
            <h2 class="text-sm font-medium text-gray-500 dark:text-red-400 cursor-pointer">Clear All</h2>
        </div>
        <hr class="w-full border-gray-200 dark:border-gray-700">
    </div>
</nav>