<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title') | My App</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
            background: #f3f7f2;
            color: #1f2937;
        }

        .topnav {
            background: #4CAF50;
            color: #fff;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .topnav .brand {
            font-weight: 700;
            font-size: 1.15rem;
        }

        .topnav .menu {
            display: flex;
            gap: 12px;
        }

        .topnav .menu a {
            color: #ffffff;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 8px;
            transition: background 0.15s;
        }

        .topnav .menu a:hover {
            background: rgba(255, 255, 255, 0.08);
        }

        .topnav .menu a.active {
            background: rgba(255, 255, 255, 0.14);
            font-weight: 600;
        }

        .app-shell {
            display: flex;
            min-height: calc(100vh - 56px);
        }

        .sidebar {
            width: 220px;
            background: #ffffff;
            border-right: 1px solid #e5e7eb;
            display: flex;
            flex-direction: column;
        }

        .sidebar-header {
            padding: 18px 20px;
            font-weight: 700;
            font-size: 1rem;
            color: #111827;
        }

        .nav-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .nav-item {
            margin: 0;
        }

        .nav-link {
            display: block;
            padding: 12px 18px;
            color: #334155;
            text-decoration: none;
            transition: background 0.2s ease, color 0.2s ease;
        }

        .nav-link:hover {
            background: #ecfdf5;
            color: #166534;
        }

        .nav-link.active {
            background: #bbf7d0;
            color: #166534;
            font-weight: 600;
        }

        .main-content {
            flex: 1;
            padding: 24px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            margin-bottom: 24px;
        }

        .page-header h1 {
            margin: 0;
            font-size: 1.5rem;
        }

        .alert {
            background: #d1fae5;
            color: #166534;
            border: 1px solid #a7f3d0;
            border-radius: 12px;
            padding: 12px;
            margin-bottom: 16px;
        }

        .card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.06);
            padding: 18px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 12px;
        }

        th,
        td {
            padding: 12px 14px;
            border: 1px solid #e5e7eb;
            text-align: left;
        }

        th {
            background: #f8fafc;
            color: #0f172a;
            font-weight: 700;
        }

        tr:hover {
            background: #f8fafc;
        }

        label {
            display: block;
            font-weight: 600;
            margin-top: 12px;
            margin-bottom: 8px;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background: #f8fafc;
            color: #0f172a;
            font-size: 0.95rem;
        }

        textarea {
            resize: vertical;
        }

        .error {
            margin-top: 6px;
            color: #b91c1c;
            font-size: 0.9rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 9px 14px;
            border-radius: 8px;
            border: 1px solid transparent;
            color: #ffffff;
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-green {
            background: #16a34a;
        }

        .btn-blue {
            background: #2563eb;
        }

        .btn-red {
            background: #dc2626;
        }

        .form-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 12px;
        }

        .small-muted {
            color: #475569;
            margin-top: 8px;
        }
    </style>
    @stack('styles')
</head>

<body>
    <header class="topnav">
        <div class="brand">My App</div>
        <nav class="menu">
            <a href="{{ route('products.index') }}"
                class="{{ request()->routeIs('products.*') ? 'active' : '' }}">Product</a>
            <a href="{{ route('customers.index') }}"
                class="{{ request()->routeIs('customers.*') ? 'active' : '' }}">Customer</a>
        </nav>
    </header>
    <div class="app-shell">
        <aside class="sidebar">
            <div class="sidebar-header">Menu</div>
            <nav>
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="{{ route('products.index') }}"
                            class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}">Product</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('customers.index') }}"
                            class="nav-link {{ request()->routeIs('customers.*') ? 'active' : '' }}">Customer</a>
                    </li>
                </ul>
            </nav>
        </aside>
        <main class="main-content">
            <header class="page-header">
                <h1>@yield('page-title')</h1>
                @yield('page-actions')
            </header>
            @if(session('success'))
                <div class="alert">{{ session('success') }}</div>
            @endif
            @yield('content')
        </main>
    </div>
    @stack('scripts')
</body>

</html>