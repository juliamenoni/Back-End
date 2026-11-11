
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Produtos</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #0f172a;
            color: #f8fafc;
            padding: 30px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }

        h1, h2 {
            margin-bottom: 20px;
        }

        .card {
            background: #1e293b;
            border: 1px solid #334155;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 20px;
        }

        a, button {
            cursor: pointer;
            text-decoration: none;
        }

        .btn {
            display: inline-block;
            background: #0284c7;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 6px;
            margin: 5px 3px;
        }

        .btn:hover {
            background: #0369a1;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px;
            border-radius: 5px;
            border: 1px solid #334155;
        }

        label {
            display: block;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #334155;
            text-align: left;
        }

        .success {
            background: #166534;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 15px;
        }

        .error {
            color: #f87171;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">

        @if(session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')

    </div>
</body>
</html>
