<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%;
        }
        body {
            margin: 0;
            font-family: 'Nunito', sans-serif;
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            height: 100vh; /* Full viewport height */
            background-color: #f7fafc; /* Adjust as needed */
        }
        .content {
            text-align: center;
        }
        .links > a {
            color: #636b6f;
            padding: 0 15px;
            font-size: 18px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        .links > a:hover {
            color: #1a202c; /* Hover color */
        }
    </style>
</head>
<body class="antialiased">
    <div class="content">
        @if (Route::has('login'))
            <div class="links">
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                   
                @endif
            </div>
        @endif
    </div>
</body>
</html>
