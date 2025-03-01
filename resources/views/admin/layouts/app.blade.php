<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/images/logo.png" />
    <title>Admin Dashboard - Yayasan Ainul Yaqin</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <div class="min-h-screen">
        <!-- Mobile menu button -->
        <button id="menuButton" type="button"
            class="fixed top-4 left-4 p-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-300 md:hidden">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>
        </button>

        <!-- Sidebar -->
        <nav id="sidebar"
            class="fixed top-0 left-0 z-40 w-64 h-screen bg-gray-800 transition-transform -translate-x-full md:translate-x-0">
            <div class="h-full px-3 py-4 overflow-y-auto">
                <div class="flex items-center justify-between mb-8 pl-2.5">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center">
                        <span class="self-center text-xl font-semibold text-white">Ainul Yaqin Admin</span>
                    </a>
                    <!-- Mobile close button -->
                    <button id="closeButton"
                        class="p-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-700 md:hidden">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                            class="flex items-center p-2 text-white rounded-lg hover:bg-gray-700 group">
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-white" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                            <span class="ml-3">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.schedules.index') }}"
                            class="flex items-center p-2 text-white rounded-lg hover:bg-gray-700 group">
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-white" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span class="ml-3">Schedules</span>
                        </a>
                    </li>
                </ul>
                <div class="pt-4 mt-4 border-t border-gray-700">
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="flex items-center p-2 w-full text-white rounded-lg hover:bg-gray-700 group">
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-white" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg>
                            <span class="ml-3">Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>

        <!-- Main content -->
        <div class="p-4 sm:ml-64">
            <div class="mt-14">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- JavaScript for mobile menu -->
    <script>
        const menuButton = document.getElementById('menuButton');
        const closeButton = document.getElementById('closeButton');
        const sidebar = document.getElementById('sidebar');

        menuButton.addEventListener('click', (e) => {
            e.stopPropagation(); // Prevent event from bubbling up
            sidebar.classList.remove('-translate-x-full');
        });

        closeButton.addEventListener('click', (e) => {
            e.stopPropagation(); // Prevent event from bubbling up
            sidebar.classList.add('-translate-x-full');
        });

        // Close sidebar when clicking outside
        document.addEventListener('click', (e) => {
            const isClickInsideSidebar = sidebar.contains(e.target);
            const isClickOnMenuButton = menuButton.contains(e.target);

            if (!isClickInsideSidebar && !isClickOnMenuButton) {
                sidebar.classList.add('-translate-x-full');
            }
        });

        // Prevent clicks inside sidebar from closing it
        sidebar.addEventListener('click', (e) => {
            e.stopPropagation();
        });
    </script>
</body>

</html>
