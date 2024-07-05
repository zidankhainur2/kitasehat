<style>
    @media (max-width: 768px) {
        .sidebar {
            transform: translateX(-100%);
        }
        .sidebar.open {
            transform: translateX(0);
        }
    }
</style>

<!-- Sidebar -->
<aside class="sidebar w-64 bg-rose-800 text-white min-h-screen fixed lg:relative z-10 transition-transform duration-300 lg:translate-x-0">
    <div class="p-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold">Admin Panel</h1>
        <button id="close-btn" class="text-white lg:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>
    <nav>
        <ul>
            <li><a href="admin_dashboard.php" class="block p-4 hover:bg-rose-900">Dashboard</a></li>
            <li><a href="akun.php" class="block p-4 hover:bg-rose-900">Akun</a></li>
            <li><a href="upload_artikel.php" class="block p-4 hover:bg-rose-900">Upload Artikel</a></li>
            <li><a href="manage_artikel.php" class="block p-4 hover:bg-rose-900">Manage Artikel</a></li>
            <li><a href="register.php" class="block p-4 hover:bg-rose-900">Register</a></li>
            <li><a href="logout.php" class="block p-4 hover:bg-rose-900">Logout</a></li>
        </ul>
    </nav>
</aside>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuBtn = document.getElementById('menu-btn');
        const closeBtn = document.getElementById('close-btn');
        const sidebar = document.querySelector('.sidebar');

        if (menuBtn) {
            menuBtn.addEventListener('click', () => {
                sidebar.classList.toggle('open');
            });
        }

        if (closeBtn) {
            closeBtn.addEventListener('click', () => {
                sidebar.classList.remove('open');
            });
        }
    });
</script>
