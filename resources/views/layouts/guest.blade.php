<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Dark Mode -->
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>

<body class="font-sans text-gray-900 antialiased">
    <!-- Button to toggle dark mode -->
    <div class="fixed top-0 right-0 bg-gray-100 dark:bg-gray-900 p-4">
        <!-- Light mode button -->
        <button id="theme-toggle-light" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
            <x-icons.moon-icon />
        </button>
        <!-- Dark mode button -->
        <button id="theme-toggle-dark" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
            <x-icons.sun-icon />
        </button>
        <!-- System mode button -->
        <button id="theme-toggle-system" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
            <x-icons.computer-icon />
        </button>
    </div>

    <div class="min-h-screen flex flex-col sm:justify-center items-center bg-gray-100 dark:bg-gray-900">
        <div class="w-full sm:max-w-md px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <!-- Script to toggle dark mode -->
    <script>
        // Function to update active state of buttons
        function updateActiveButton(theme) {
            const buttons = {
                'light': document.getElementById('theme-toggle-light'),
                'dark': document.getElementById('theme-toggle-dark'),
                'system': document.getElementById('theme-toggle-system')
            };

            // Remove active state from all buttons
            Object.values(buttons).forEach(button => {
                button.classList.remove('bg-gray-200', 'dark:bg-gray-700');
            });

            // Add active state to selected button
            if (buttons[theme]) {
                buttons[theme].classList.add('bg-gray-200', 'dark:bg-gray-700');
            }
        }

        // Set initial state
        const currentTheme = localStorage.getItem('color-theme') || 'system';
        updateActiveButton(currentTheme);

        // Light mode button
        document.getElementById('theme-toggle-light').addEventListener('click', function() {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
            updateActiveButton('light');
        });

        // Dark mode button
        document.getElementById('theme-toggle-dark').addEventListener('click', function() {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
            updateActiveButton('dark');
        });

        // System mode button
        document.getElementById('theme-toggle-system').addEventListener('click', function() {
            localStorage.removeItem('color-theme');
            if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
            updateActiveButton('system');
        });

        // Listen for system theme changes when in system mode
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
            if (!localStorage.getItem('color-theme')) {
                if (e.matches) {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }
            }
        });
    </script>
</body>

</html>