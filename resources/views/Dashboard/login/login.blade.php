<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Masuk ke SIDINYAM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/vendors/images/uniska.png') }}" type="image/png">

    <!-- Custom Style -->
    <style>
        body {
            background: linear-gradient(to right, #fff5ec, #ffffff); /* Oranye muda ke putih */
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
        }

        .login-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 95vh;
        }

        .login-box {
            background-color: #ffffff;
            padding: 32px 28px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.05);
            max-width: 370px;
            width: 100%;
        }

        .login-box .avatar {
            display: flex;
            justify-content: center;
            margin-bottom: 10px;
        }

        .login-box .avatar img {
            width: 70px;
            border-radius: 50%;
        }

        .login-box h4 {
            font-size: 16px;
            font-weight: 600;
            text-align: center;
            color: #ff914d; /* Oranye */
            margin-bottom: 20px;
        }

        .login-box label {
            font-size: 13px;
            font-weight: 500;
            color: #333;
            margin-bottom: 4px;
            display: block;
        }

        .login-box input[type="email"],
        .login-box input[type="password"] {
            width: 100%;
            padding: 8px 12px;
            font-size: 13px;
            border-radius: 8px;
            border: 1px solid #ccc;
            margin-bottom: 16px;
        }

        .form-check {
            display: flex;
            align-items: center;
            font-size: 12px;
            margin-bottom: 10px;
        }

        .form-check input {
            margin-right: 6px;
        }

        .forgot-password {
            text-align: right;
            font-size: 12px;
            margin-bottom: 20px;
        }

        .forgot-password a {
            color: #ff914d;
            text-decoration: none;
        }

        .btn {
            width: 100%;
            border: none;
            padding: 10px;
            font-size: 13px;
            font-weight: 600;
            border-radius: 30px;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #ff914d;
            color: white;
            margin-bottom: 10px;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .alert {
            font-size: 12px;
            color: red;
            margin-top: -12px;
            margin-bottom: 10px;
        }

        .btn-outline-orange {
    background-color: #ffffff;
    color: #ff914d;
    border: 2px solid #ff914d;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-outline-orange:hover {
    background-color: #ff914d;
    color: #ffffff;
}

    </style>
</head>

<body>
    <div class="login-wrapper">
        <form method="POST" action="{{ route('login') }}" class="login-box">
            @csrf

            <div class="avatar">
                <img src="{{ asset('assets/vendors/images/profile.png') }}" alt="Avatar">
            </div>

            <h4>Masuk ke SIDINYAM</h4>

            {{-- Email --}}
            <label for="email">Alamat Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div class="alert">{{ $message }}</div>
            @enderror

            {{-- Password --}}
            <label for="password">Kata Sandi</label>
            <input type="password" id="password" name="password" required>
            @error('password')
                <div class="alert">{{ $message }}</div>
            @enderror

            {{-- Remember Me --}}
            <div class="form-check">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Ingat Saya</label>
            </div>

            {{-- Forgot Password --}}
            <div class="forgot-password">
                <a href="{{ route('password.request') }}">Lupa kata sandi?</a>
            </div>

            {{-- Button Masuk --}}
            <button type="submit" class="btn btn-primary">Masuk</button>

            {{-- Button Kembali --}}
            <a href="{{ url('/') }}">
    <button type="button" class="btn btn-outline-orange">Kembali</button>
</a>
        </form>
    </div>
</body>
</html>
