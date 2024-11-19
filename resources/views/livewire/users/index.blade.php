<div>
    <div class="mx-auto max-w-7xl my-8">
        <!-- Breadcrumb -->
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('users') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        Users
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <x-icons.arrow-right-icon />
                        <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">List</a>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="flex flex-row justify-between items-center">
            <h1 class="text-3xl font-bold my-4 dark:text-white">Users</h1>
            <x-primary-button>
                Add User
            </x-primary-button>
        </div>
    </div>
</div>