<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Кинотеатр')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f8f9fa; color: #333; line-height: 1.6; display: flex; flex-direction: column; min-height: 100vh; }
        header { background: #212529; color: #fff; padding: 15px 0; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .header-content { max-width: 1100px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center; padding: 0 20px; }
        .logo { font-size: 24px; font-weight: bold; color: #fff; text-decoration: none; display: flex; align-items: center; gap: 8px; }
        .nav-links { display: flex; align-items: center; gap: 15px; }
        .nav-links a { color: #ccc; text-decoration: none; font-size: 15px; transition: color 0.2s; }
        .nav-links a:hover { color: #fff; }
        .user-info { display: flex; align-items: center; gap: 15px; margin-left: 20px; padding-left: 20px; border-left: 1px solid #444; }
        .user-name { font-size: 14px; color: #fff; }
        .btn-logout { background: #dc3545; color: #fff; border: none; padding: 6px 12px; border-radius: 4px; cursor: pointer; font-size: 14px; transition: background 0.2s; }
        .btn-logout:hover { background: #c82333; }
        .btn-auth { background: #0d6efd; color: #fff; padding: 8px 16px; border-radius: 4px; text-decoration: none; font-size: 14px; transition: background 0.2s; }
        .btn-auth:hover { background: #0b5ed7; }
        .container { max-width: 1100px; margin: 30px auto; padding: 0 20px; flex: 1; width: 100%; }
        .card { background: #fff; padding: 25px; margin-bottom: 25px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border: 1px solid #e9ecef; }
        .card h2 { margin-bottom: 10px; font-size: 22px; color: #212529; }
        .form-group { margin-bottom: 15px; }
        label { font-weight: 600; margin-bottom: 5px; display: block; font-size: 14px; }
        input[type="text"], input[type="password"], input[type="number"], select { width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px; font-size: 15px; }
        input:focus, select:focus { outline: none; border-color: #86b7fe; box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.25); }
        .btn { display: inline-block; padding: 10px 20px; background: #0d6efd; color: #fff; text-decoration: none; border: none; border-radius: 4px; cursor: pointer; font-size: 15px; font-weight: 600; transition: background 0.2s; }
        .btn:hover { background: #0b5ed7; }
        .btn-green { background: #198754; }
        .btn-green:hover { background: #157347; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; background: #fff; }
        th, td { padding: 12px 15px; border-bottom: 1px solid #dee2e6; text-align: left; }
        th { background: #f8f9fa; font-weight: 600; color: #495057; }
        tr:hover { background: #f8f9fa; }
        .success { background: #d1e7dd; color: #0f5132; padding: 15px; border-radius: 4px; margin-bottom: 20px; border: 1px solid #badbcc; }
        .error { background: #f8d7da; color: #842029; padding: 15px; border-radius: 4px; margin-bottom: 20px; border: 1px solid #f5c2c7; }
        footer { background: #212529; color: #adb5bd; text-align: center; padding: 20px; font-size: 14px; }
    </style>
</head>
<body>
    <x-header />
    <div class="container">
        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif
        @yield('content')
    </div>
    <x-footer />
</body>
</html>