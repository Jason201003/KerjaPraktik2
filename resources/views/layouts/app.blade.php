<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Hotel Amira') }}</title>

    <!-- Fonts & Bootstrap -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #0F172B;
            color: #dbe4ff;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            animation: fadeIn 1s ease-in forwards;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .login-container {
            background: rgba(255, 255, 255, 0.1);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            max-width: 100%;
            width: 100%;
            max-width: 400px;
        }

        h1 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #FEA116;
            font-weight: 600;
        }

        .btn-primary {
            background-color: #FEA116;
            border: none;
        }

        .btn-primary:hover {
            background-color: #FEA116;
            color: #0F172B;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.15);
            color: #dbe4ff;
            border: 1px solid rgba(255, 255, 255, 0.25);
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.25);
            border-color: #1d4ed8;
            box-shadow: none;
        }

        .form-label, .form-check-label, a {
            color: #FEA116;
        }

        a:hover {
            color: #a5b4fc;
        }

        .back-button-container {
            text-align: center;
            margin-bottom: 1rem;
            margin-top: 1rem;
        }

        .back-button {
            background-color: #FEA116;
            color: #dbe4ff;
        }

        .back-button:hover {
            background-color: #FEA116;
            color: #0F172B;
        }

    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="login-container">
            <h1>Welcome to Hotel Amira</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Remember Me</label>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
                <div class="text-center mt-3">
                    <a href="{{ route('password.request') }}">Forgot Your Password?</a>
                </div>
                <div class="back-button-container">
                    <button onclick="window.history.back()" class="btn back-button">
                        <i class="bi bi-arrow-left"></i> Back
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
