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
                <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 2L2 8v10a2 2 0 002 2h4a2 2 0 002-2V12h4v6a2 2 0 002 2h4a2 2 0 002-2V8l-8-6z" clip-rule="evenodd"></path>
                </svg>
                <a href="{{ route('patients.home') }}" class="hover:underline">Home</a>
            </li>
            <li class="py-2 flex items-center hover:bg-blue-700 rounded-lg p-2 transition">
                <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 5v14h18V5H3zm16 12H5V7h14v10zM9 9h6v2H9V9zm0 4h6v2H9v-2z"></path>
                </svg>
                <a href="{{ route('patients.new') }}" class="hover:underline">New Patient</a>
            </li>
            <li class="py-2 flex items-center hover:bg-blue-700 rounded-lg p-2 transition">
                <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 11h6v2H9v-2zm3-9C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15h2v-2h-2v2zm3.707-9.707L12 10.586 9.293 7.293a1 1 0 10-1.414 1.414L12 13.414l4.121-4.121a1 1 0 10-1.414-1.414z"></path>
                </svg>
                <a href="{{ route('referrals.index') }}" class="hover:underline">Referral</a>
            </li>
            <li class="py-2 flex items-center hover:bg-blue-700 rounded-lg p-2 transition">
                <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 2a2 2 0 0 0-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8l-6-6H6zm7 1.5L18.5 9H13V3.5zM6 20V4h6v5h5v11H6z"></path>
                </svg>
                <a href="#" class="hover:underline">Documents</a>
            </li>
            <li class="py-2 flex items-center hover:bg-blue-700 rounded-lg p-2 transition">
                <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 5h18v14H3V5zm16 12V7H5v10h14zM9 9h6v2H9V9zm0 4h6v2H9v-2z"></path>
                </svg>
                <a href="{{ route('appointments.index') }}" class="hover:underline">Schedule</a>
            </li>
            <li class="py-2 flex items-center hover:bg-blue-700 rounded-lg p-2 transition">
                <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M4 4h16v2H4V4zm0 5h16v2H4V9zm0 5h16v2H4v-2z"></path>
                </svg>
                <a href="{{ route('patients.index') }}" class="hover:underline">All Patients</a>
            </li>
            <li class="py-2 flex items-center hover:bg-blue-700 rounded-lg p-2 transition">
                <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9 11h6v2H9v-2zm3-9C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15h2v-2h-2v2zm0-6h2v-4h-2v4z"></path>
                </svg>
                <a href="{{ route('patient_sessions.index') }}" class="hover:underline">Session</a>
            </li>
            <li class="py-2 flex items-center hover:bg-red-700 rounded-lg p-2 transition">
                <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M19 6h-5V4a3 3 0 0 0-6 0v2H5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2zm-7 10a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm5-10H8V4a2 2 0 0 1 4 0v2z"></path>
                </svg>
                <a href="{{ route('admin.login.post') }}" class="hover:underline">Logout</a>
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
