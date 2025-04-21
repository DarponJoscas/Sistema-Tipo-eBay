<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Detalle Puro</title>
    @livewireStyles
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        #sidebar {
            position: fixed;
            top: 0;
            left: -250px;
            width: 250px;
            height: 100vh;
            background-color: #B68929;
            color: white;
            padding: 20px;
            transition: left 0.3s ease;
            z-index: 1030;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5);
            overflow: hidden;
        }

        #sidebar.active {
            left: 0;
        }

        .navbar-content {
            padding-bottom: 10px;
            transition: margin-left 0.3s ease;
            position: relative;
            z-index: 1;
            margin-left: 0;
        }

        .main-content.sidebar-open {
            margin-left: 250px;
        }

        #navbar {
            display: flex;
            background-color: #B68929;
            justify-content: space-between;
            align-items: center;
            padding: 2px 10px;
        }

        #hamburger {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        #hamburger:hover {
            color: #adb5bd;
        }

        #usarioLogin {
            margin: 0;
        }

        #hamburger:focus {
            outline: none;
        }

        #closeSidebar {
            position: absolute;
            top: 10px;
            right: 10px;
            background: transparent;
            border: none;
            color: white;
            font-size: 30px;
            cursor: pointer;
        }

        .nav-link {
            color: white;
        }

        .nav-link:hover {
            color: #adb5bd;
        }

        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: 1029;
        }
    </style>
</head>

<body>

    @if (!in_array(request()->path(), ['/', 'register']))
        <div id="navbar-content" class="navbar-content">

            <nav id="navbar" class="navbar navbar-expand-lg">

                <button id="hamburger" aria-label="Menú"><i class="bi bi-list text-white"></i></button>

                <p id="usarioLogin" style="color: white;">Bienvenido, Dario </p>
            </nav>

            <div class="sidebar-overlay" id="sidebar-overlay"></div>

            <nav id="sidebar">
                <button id="closeSidebar" aria-label="Cerrar menú"><i class="bi bi-x"></i></button>
                <h4>Menú</h4>
                <ul class="nav flex-column">

                    @if (!in_array(request()->path(), ['historial-compras']))
                        <li class="nav-item">
                            <form action="{{ route('historial-compras') }}" method="GET">
                                <button type="submit" class="nav-link btn btn-link"
                                    style="color: white; text-decoration: none;">Historial Compras</button>
                            </form>
                        </li>
                    @endif

                    @if (!in_array(request()->path(), ['historial-ventas']))
                    <li class="nav-item">
                        <form action="{{ route('historial-ventas') }}" method="GET">
                            <button type="submit" class="nav-link btn btn-link"
                                style="color: white; text-decoration: none;">Historial Ventas</button>
                        </form>
                    </li>
                    @endif

                    @if (!in_array(request()->path(), ['perfil']))
                    <li class="nav-item">
                        <form action="{{ route('perfil') }}" method="GET">
                            <button type="submit" class="nav-link btn btn-link"
                                style="color: white; text-decoration: none;">Perfil</button>
                        </form>
                    </li>
                    @endif

                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link"
                                style="color: white; text-decoration: none;">Cerrar sesión</button>
                        </form>
                    </li>
                </ul>

            </nav>
        </div>
    @endif

    @yield('content')

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.0/dist/js/tom-select.complete.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>

    @stack('scripts')

    <script>
        const hamburger = document.getElementById("hamburger");
        const closeSidebar = document.getElementById("closeSidebar");
        const sidebar = document.getElementById("sidebar");
        const mainContent = document.getElementById("main-content");
        const overlay = document.getElementById("sidebar-overlay");

        function openSidebar() {
            sidebar.classList.add("active");
            if (mainContent) {
                mainContent.classList.add("sidebar-open");
            }
            overlay.style.display = "block";
        }

        function closeSidebarFunc() {
            sidebar.classList.remove("active");
            if (mainContent) {
                mainContent.classList.remove("sidebar-open");
            }
            overlay.style.display = "none";
        }

        if (hamburger) {
            hamburger.addEventListener("click", openSidebar);
        }
        if (closeSidebar) {
            closeSidebar.addEventListener("click", closeSidebarFunc);
        }
        if (overlay) {
            overlay.addEventListener("click", closeSidebarFunc);
        }
    </script>
</body>

</html>
