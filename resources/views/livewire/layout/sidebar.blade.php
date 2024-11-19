<div>
    @vite(['resources/css/sidebar.css'])
    <nav id="sidebar" class="h-screen w-60 p-1 px-4 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 sticky top-0 self-start transition-all duration-300 ease-in-out overflow-hidden whitespace-nowrap group-[.close]:w-[60px] group-[.close]:p-1">
        <ul>
            <li class="flex justify-end mb-4">
                <span class="font-semibold p-3 rounded-lg text-gray-900 dark:text-white">Logo</span>
                <button onclick=toggleSidebar() id="toggle-btn" class="ml-auto p-4 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer transition-transform duration-150 ease">
                    <x-icons.chevron-double-left-icon />
                </button>
            </li>
            <li class="active">
                <a href="#" class="rounded-lg p-3 flex items-center gap-4 text-blue-600 dark:text-blue-500 hover:bg-gray-100 dark:hover:bg-gray-700 no-underline">
                    <x-icons.home-icon />
                    <span class="text-gray-900 dark:text-gray-100">Home</span>
                </a>
            </li>
            <li>
                <a href="#" class="rounded-lg p-3 flex items-center gap-4 text-gray-900 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-700 no-underline">
                    <x-icons.dashboard-icon />
                    <span class="text-gray-900 dark:text-gray-100">Dashboard</span>
                </a>
            </li>
            <li>
                <button onclick=toggleSubMenu(this) class="dropdown-btn w-full text-left rounded-lg p-3 flex items-center gap-4 text-gray-900 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer bg-transparent border-0">
                    <x-icons.folder-icon />
                    <span class="text-gray-900 dark:text-gray-100">Create</span>
                    <x-icons.down-arrow-icon />
                </button>
                <ul class="sub-menu bg-gray-50 dark:bg-gray-900 grid transition-[grid-template-rows] duration-300 ease-in-out group-[.show]:grid-rows-[1fr] grid-rows-[0fr]">
                    <div class="overflow-hidden dark:text-gray-100">
                        <li><a href="#"">Folder</a></li>
                        <li><a href="#"">Document</a></li>
                        <li><a href="#"">Project</a></li>
                    </div>
                </ul>
            </li>
            <li>
                <button onclick=toggleSubMenu(this) class="dropdown-btn w-full text-left rounded-lg p-3 flex items-center gap-4 text-gray-900 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer bg-transparent border-0">
                    <x-icons.todo-list-icon />
                    <span class="text-gray-900 dark:text-gray-100">Todo-Lists</span>
                    <x-icons.down-arrow-icon />
                </button>
                <ul class="sub-menu bg-gray-50 dark:bg-gray-900 grid transition-[grid-template-rows] duration-300 ease-in-out group-[.show]:grid-rows-[1fr] grid-rows-[0fr]">
                    <div class="overflow-hidden dark:text-gray-100">
                        <li><a href="#"">Work</a></li>
                        <li><a href="#"">Private</a></li>
                        <li><a href="#"">Coding</a></li>
                        <li><a href="#"">Gardening</a></li>
                        <li><a href="#"">School</a></li>
                    </div>
                </ul>
            </li>
            <li>
                <a href="calendar.html" class="rounded-lg p-3 flex items-center gap-4 text-gray-900 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-700 no-underline">
                    <x-icons.calendar-icon />
                    <span class="text-gray-900 dark:text-gray-100">Calendar</span>
                </a>
            </li>
        </ul>
    </nav>

    <script>
        const toggleButton = document.getElementById('toggle-btn')
        const sidebar = document.getElementById('sidebar')

        function toggleSidebar() {
            sidebar.classList.toggle('close')
            toggleButton.classList.toggle('rotate')

            closeAllSubMenus()
        }

        function toggleSubMenu(button) {

            if (!button.nextElementSibling.classList.contains('show')) {
                closeAllSubMenus()
            }

            button.nextElementSibling.classList.toggle('show')
            button.classList.toggle('rotate')

            if (sidebar.classList.contains('close')) {
                sidebar.classList.toggle('close')
                toggleButton.classList.toggle('rotate')
            }
        }

        function closeAllSubMenus() {
            Array.from(sidebar.getElementsByClassName('show')).forEach(ul => {
                ul.classList.remove('show')
                ul.previousElementSibling.classList.remove('rotate')
            })
        }
    </script>
</div>