<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        :root {
            --primary-color: #0d6efd;
            --secondary-color: #6c757d;
            --background-color: #f8f9fa;
            --text-color: #212529;
            --menu-bg: #ffffff;
            --menu-border: #dee2e6;
            --menu-width: 250px;
            --transition-speed: 0.3s;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            display: flex;
            min-height: 100vh;
        }

        /* Right Sidebar */
        .sidebar {
            width: var(--menu-width);
            background-color: var(--menu-bg);
            border-left: 1px solid var(--menu-border);
            position: fixed;
            right: 0;
            top: 0;
            bottom: 0;
            padding: 1rem;
            display: flex;
            flex-direction: column;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar .menu-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .sidebar .menu-item {
            display: flex;
            align-items: center;
            padding: 10px 15px;
            color: var(--text-color);
            text-decoration: none;
            border-radius: 8px;
            transition: background-color var(--transition-speed), color var(--transition-speed);
            margin-bottom: 0.5rem;
        }

        .sidebar .menu-item:hover {
            background-color: var(--primary-color);
            color: #ffffff;
        }

        .sidebar .menu-item i {
            font-size: 1.25rem;
            margin-right: 10px;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 2rem;
            margin-right: var(--menu-width);
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 1rem;
            margin-top: 2rem;
            color: var(--secondary-color);
            font-size: 0.9rem;
        }

        .footer a {
            color: var(--primary-color);
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <!-- Main Content -->
    <main class="main-content">
        @if (isset($header))
        <div class="mb-4">
            <h1 class="display-6">{{ $header }}</h1>
        </div>
        @endif

        <div class="row">
            <div class="col">
                @yield('content')
            </div>
        </div>

        <!-- Footer -->
        <!-- <footer class="footer">
            &copy; 2024 MyApp. <a href="/terms">Terms</a> | <a href="/privacy">Privacy</a>
        </footer> -->
    </main>

    <!-- Sidebar -->
    <nav class="sidebar">
        <div class="menu-title">Menu</div>
        <a href="/dashboard" class="menu-item">
            <i class="bi bi-house-door"></i> Dashboard
        </a>

        <a href="/logs/candidates" class="menu-item">
            <i class="bi bi-file-earmark-text"></i> Logs de Candidato
        </a>
        <a href="/candidates" class="menu-item">
            <i class="bi bi-file-earmark-text"></i> Candidatos
        </a>

        <a href="/settings" class="menu-item">
            <i class="bi bi-gear"></i> Settings
        </a>

        <hr>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="user-menu-item w-100 text-start border-0 bg-transparent">
                <i class="bi bi-box-arrow-right"></i>
                Logout
            </button>
        </form>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>