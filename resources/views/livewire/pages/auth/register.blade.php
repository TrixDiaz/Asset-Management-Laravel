<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $first_name = '';
    public string $last_name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'first_name' => ['required', 'string', 'lowercase', 'max:255'],
            'last_name' => ['required', 'string', 'lowercase', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', 'min:8',  Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
    <form wire:submit="register">
        <!-- First Name -->
        <div x-data="{ value: '' }" class="relative">
            <x-input-label for="name" :value="__('First Name')" />
            <x-text-input 
                wire:model="first_name" 
                id="first_name" 
                x-model="value"
                @input="$el.value = $el.value.replace(/[^a-zA-Z\s]/g, '')"
                class="block mt-1 w-full uppercase" 
                type="text" 
                name="first_name" 
                required 
                autofocus 
                autocomplete="first_name" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div x-data="{ value: '' }" class="relative mt-4">
            <x-input-label for="last_name" :value="__('Last Name')" />
            <x-text-input 
                wire:model="last_name" 
                id="last_name" 
                x-model="value"
                @input="$el.value = $el.value.replace(/[^a-zA-Z\s]/g, '')"
                class="block mt-1 w-full uppercase" 
                type="text" 
                name="last_name" 
                required 
                autocomplete="last_name" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full uppercase" type="email" name="email" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <div class="flex items-center">
                <x-input-label for="password" :value="__('Password')" />
                <x-icons.question-mark-circle-icon data-tooltip-target="tooltip-right-1" data-tooltip-placement="right" class="w-4 h-4 text-gray-500 cursor-pointer ml-0.5 dark:text-white" />
            </div>

            <div class="relative" x-data="{ showPassword: false }">
                <x-text-input wire:model="password" id="password" class="block mt-1 w-full pr-10"
                    x-bind:type="showPassword ? 'text' : 'password'"
                    name="password"
                    required autocomplete="new-password"
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                    title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" />
                <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center" @click="showPassword = !showPassword">
                    <x-icons.eye-open-icon x-show="!showPassword" class="h-5 w-5 text-gray-500" />
                    <x-icons.eye-close-icon x-show="showPassword" class="h-5 w-5 text-gray-500" />
                </button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />

            <!-- Tooltip -->
            <div id="tooltip-right-1" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                <ul class="list-disc list-inside">
                    <li>1 Uppercase letter</li>
                    <li>1 Lowercase letter</li>
                    <li>1 Number</li>
                    <li>8 Characters minimum</li>
                </ul>
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <div class="flex items-center">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-icons.question-mark-circle-icon data-tooltip-target="tooltip-right-2" data-tooltip-placement="right" class="w-4 h-4 text-gray-500 cursor-pointer ml-0.5 dark:text-white" />
            </div>
            <div class="relative" x-data="{ showPassword: false }">
                <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full pr-10"
                    x-bind:type="showPassword ? 'text' : 'password'"
                    name="password_confirmation" required autocomplete="new-password"
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                    title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" />
                <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center" @click="showPassword = !showPassword">
                    <x-icons.eye-open-icon x-show="!showPassword" class="h-5 w-5 text-gray-500" />
                    <x-icons.eye-close-icon x-show="showPassword" class="h-5 w-5 text-gray-500" />
                </button>
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

            <!-- Tooltip -->
            <div id="tooltip-right-2" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                <ul class="list-disc list-inside">
                    <li>1 Uppercase letter</li>
                    <li>1 Lowercase letter</li>
                    <li>1 Number</li>
                    <li>8 Characters minimum</li>
                </ul>
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="hover:underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}" wire:navigate>
                {{ __('Already have an account?') }}
            </a>
        </div>

        <div class="mt-2">
            <x-primary-button class="w-full">
                {{ __('Register') }}
            </x-primary-button>
        </div>

    </form>
</div>