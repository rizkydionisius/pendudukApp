<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <style>
        *, ::after, ::before {
            box-sizing: border-box;
            border-width: 0;
            border-style: solid;
            border-color: #e5e7eb;
        }
        ::after, ::before {
            --tw-content: '';
        }
        html {
            line-height: 1.5;
            -webkit-text-size-adjust: 100%;
            -moz-tab-size: 4;
            tab-size: 4;
            font-family: Figtree, sans-serif;
            font-feature-settings: normal;
        }
        body {
            margin: 0;
            line-height: inherit;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            background-color: #f3f4f6;
        }
        h1 {
            font-size: 2rem;
            font-weight: 600;
            color: #333;
            text-align: center;
        }
        .button-container {
            margin-top: 20px;
            display: flex;
            gap: 10px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: 600;
            color: white;
            background-color: #4a90e2;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #357ab7;
        }
    </style>
</head>
<body>
    <h1>Aplikasi Penduduk</h1>
    <div class="button-container">
        <a href="{{ route('kabupaten.index') }}" class="button">Kabupaten</a>
        <a href="{{ route('provinsi.index') }}" class="button">Provinsi</a>
    </div>
</body>
</html>
