<!-- Sidebar Wrapper -->
<div class="flex">
    <!-- Sidebar -->
    <div id="sidebar" class="w-64 bg-gradient-to-b from-teal-700 to-green-500 text-white p-5 fixed h-full transition-transform transform -translate-x-full md:translate-x-0 shadow-lg">
        <!-- Logo and Title -->
        <h2 class="text-xl font-bold flex items-center">
            <img src="{{ asset('asset/melogo.jpg') }}" alt="ASP Logo" class="h-16 w-auto mr-3">
            ASP System
        </h2>

        <!-- Navigation Links -->
        <ul class="mt-5 space-y-2">
            <li class="py-2 flex items-center hover:bg-blue-700 rounded-lg p-2 transition">
                <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 3h18v18H3V3zm16 16V5H5v14h14zM7 7h10v2H7V7zm0 4h10v2H7v-2zm0 4h10v2H7v-2z"></path>
                </svg>
                <a href="#" class="hover:underline">Dashboard</a>
            </li>
           
            <li class="py-2 flex items-center hover:bg-blue-700 rounded-lg p-2 transition">
                <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2zM6 5h12v5H6V5zm12 14H6v-7h12v7z"></path>
                </svg>
                <a href="#" class="hover:underline">Therapy Sessions</a>
            </li>
            <li class="py-2 flex items-center hover:bg-blue-700 rounded-lg p-2 transition">
                <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 4h16v2H4V4zm0 5h16v2H4V9zm0 5h16v2H4v-2z"></path>
                </svg>
                <a href="#" class="hover:underline">Appointments</a>
            </li>
            <li class="py-2 flex items-center hover:bg-blue-700 rounded-lg p-2 transition">
                <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 3h18v18H3V3zm2 2v14h14V5H5zm7 12h-2v-6h2v6zm0-8h-2V7h2v2z"></path>
                </svg>
                <a href="#" class="hover:underline">Reminders</a>
            </li>
            <li class="py-2 flex items-center hover:bg-blue-700 rounded-lg p-2 transition">
                <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 14h4v2h-4v-2zm0-4h4v2h-4v-2zm0-4h4v2h-4V8z"></path>
                </svg>
                <a href="#" class="hover:underline">Progress Reports</a>
            </li>
            <li class="py-2 flex items-center hover:bg-blue-700 rounded-lg p-2 transition">
                <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 3h18v18H3V3zm16 16V5H5v14h14zM7 7h10v2H7V7zm0 4h10v2H7v-2zm0 4h10v2H7v-2z"></path>
                </svg>
                <a href="#" class="hover:underline">Secure Messaging</a>
            </li>
             <li class="py-2 flex items-center hover:bg-blue-700 rounded-lg p-2 transition">
                <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-2h2v2zm0-4h-2V7h2v8z"></path>
                </svg>
                <a href="{{ route('patient_profiles.index') }}" class="hover:underline">Account</a>
            </li>
            <li class="py-2 flex items-center hover:bg-red-700 rounded-lg p-2 transition">
                <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M19 6h-5V4a3 3 0 0 0-6 0v2H5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2zm-7 10a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm5-10H8V4a2 2 0 0 1 4 0v2z"></path>
                </svg>
                <a href="{{ url('/') }}" class="hover:underline">Logout</a>
            </li>
        </ul>
    </div>
    
    <!-- Content -->
    <div class="flex-1 p-5 md:ml-64">
        <button id="sidebarToggle" class="md:hidden bg-blue-900 text-white p-2 rounded">
            ☰ Menu
        </button>
    </div>
</div>

<!-- JavaScript for Sidebar Toggle -->
<script>
    const sidebar = document.getElementById("sidebar");
    const toggleButton = document.getElementById("sidebarToggle");

    toggleButton.addEventListener("click", () => {
        sidebar.classList.toggle("-translate-x-full");
    });
</script>
