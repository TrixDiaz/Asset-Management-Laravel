<div>
    <form wire:submit="store" method="POST" class="relative space-y-3 rounded-md bg-white p-6 shadow-xl lg:p-10 border border-gray-100 m-10">
        @csrf
        @method('POST')
        <h1 class="text-xl font-semibold lg:text-2xl dark:text-gray-700">Store User</h1>
        <p class="pb-4 text-gray-500">Store user information</p>
        @if (session('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
            <span class="font-medium">{{ session('success') }}</span>
        </div>
        @endif
        <div>
            <label class="dark:text-gray-700"> First Name </label>
            <input type="text" wire:model="firstName" placeholder="First Name" class="mt-2 h-12 w-full dark:text-gray-700 rounded-md bg-gray-100 px-3 outline-none focus:ring" />
        </div>
        <div class="">
            <label class="dark:text-gray-700"> Last Name </label>
            <input type="text" wire:model="lastName" placeholder="Last Name" class="mt-2 h-12 w-full dark:text-gray-700 rounded-md bg-gray-100 px-3 outline-none focus:ring" />
        </div>

        <div>
            <button type="submit" class="mt-5 w-full rounded-md bg-blue-600 p-2 text-center font-semibold text-white outline-none focus:ring">Submit</button>
        </div>
    </form>
</div>