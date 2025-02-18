<!-- Botón para abrir el menú (☰) -->
<button id="menu-btn"
    class="md:hidden fixed top-4 right-4 bg-gray-800 text-white p-2 rounded-lg z-50 transition">
    ☰
</button>

<!-- Sidebar -->
<aside id="sidebar"
    class="fixed top-0 left-0 h-full w-64 bg-gray-900 text-white transform -translate-x-full md:translate-x-0 transition-transform duration-300 z-40">
    <div class="p-6 relative">
        <!-- Botón de cierre (✕) -->
        <button id="close-btn" class="absolute top-4 right-4 text-white text-2xl md:hidden">
            ✕
        </button>

        <h2 class="text-xl font-bold mb-4 text-center">
            <span class="text-sm">Documento: {{ Auth::user()->documento }}
            </span>
        </h2>
        <ul class="space-y-2">
            <li>
                <a href="{{ route('dashboard') }}"
                    class="block px-4 py-2 rounded-lg hover:bg-gray-700 transition">Inicio</a>
            </li>
            <li>
                <a href="{{ route('employee') }}" class="block px-4 py-2 rounded-lg hover:bg-gray-700 transition">Pacientes</a>
            </li>
        </ul>
    </div>
</aside>

<!-- Script para manejar el menú -->
<script>
    const menuBtn = document.getElementById('menu-btn');
    const closeBtn = document.getElementById('close-btn');
    const sidebar = document.getElementById('sidebar');

    menuBtn.addEventListener('click', function () {
        sidebar.classList.remove('-translate-x-full'); // Mostrar menú
        menuBtn.classList.add('hidden'); // Ocultar ☰
    });

    closeBtn.addEventListener('click', function () {
        sidebar.classList.add('-translate-x-full'); // Ocultar menú
        menuBtn.classList.remove('hidden'); // Mostrar ☰
    });
</script>
