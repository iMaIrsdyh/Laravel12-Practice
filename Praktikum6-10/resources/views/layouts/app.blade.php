<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') | Toko Laravel</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background: #f5f5f5; }
        h1, h2 { color: #333; }
        table { width: 100%; border-collapse: collapse; background: white; }
        th, td { padding: 10px 14px; border: 1px solid #ddd; text-align: left; }
        th { background: #4CAF50; color: white; }
        tr:hover { background: #f1f1f1; }
        a.btn, button.btn {
            padding: 7px 14px; border-radius: 4px; border: none;
            cursor: pointer; text-decoration: none; font-size: 14px;
        }
        .btn-green { background: #4CAF50; color: white; }
        .btn-blue  { background: #2196F3; color: white; }
        .btn-red   { background: #f44336; color: white; }
        .alert { padding: 10px; background: #dff0d8; border: 1px solid #3c763d;
                 color: #3c763d; margin-bottom: 15px; border-radius: 4px; }
        input, textarea { width: 100%; padding: 8px; margin-top: 5px;
                          margin-bottom: 12px; border: 1px solid #ccc;
                          border-radius: 4px; box-sizing: border-box; }
        .error { color: red; font-size: 13px; }
    </style>
</head>
<body>
    <h1>🛒 Aplikasi Data Produk</h1>
    <hr>
    @yield('content')
</body>
</html>