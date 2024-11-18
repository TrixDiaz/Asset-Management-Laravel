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



    <div class="relative overflow-x-auto">
        <div class="mx-auto mt-5 w-screen max-w-screen-md py-20 leading-6">
            <form class="relative mx-auto flex w-full max-w-2xl items-center justify-between rounded-md border shadow-lg">
                <svg class="absolute left-2 block h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8" class=""></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65" class=""></line>
                </svg>
                <input wire:model.live="search" type="name" name="search" class="h-14 w-full dark:text-gray-700 rounded-md bg-gray-100 px-3 outline-none focus:ring" placeholder="City, Address, Zip :" />
                <button type="submit" class="absolute right-0 mr-1 inline-flex h-12 items-center justify-center rounded-lg bg-gray-900 px-10 font-medium text-white focus:ring-4 hover:bg-gray-700">Search</button>
            </form>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        First Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Last Name
                    </th>
                </tr>
            </thead>

            @foreach ($filteredDatas as $data)
            <tbody>
                <tr wire:key="{{ $data->id }}" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $data->first_name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $data->last_name }}
                    </td>
                    <td>
                        <button></button>
                        <button wire:click="delete({{ $data->id }})" class="text-red-500">Delete</button>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>

</div>