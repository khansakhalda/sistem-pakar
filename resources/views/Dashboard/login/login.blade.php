<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Masuk ke SIDINYAM</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="{{ asset('assets/vendors/images/nyamuk.png') }}" type="image/png">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #007bff, #6ec6ff);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-box {
      background: #ffffff;
      border-radius: 16px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      padding: 40px 30px;
      width: 100%;
      max-width: 380px;
      position: relative;
    }

    .avatar {
      display: flex;
      justify-content: center;
      margin-bottom: 20px;
    }

    .avatar img {
      width: 80px;
      border-radius: 50%;
      border: 3px solid #007bff;
      padding: 4px;
      background-color: #fff;
    }

    h4 {
      text-align: center;
      color: #007bff;
      font-size: 20px;
      margin-bottom: 24px;
    }

    label {
      font-size: 14px;
      margin-bottom: 6px;
      display: block;
      color: #333;
    }

    .input-group {
      position: relative;
      margin-bottom: 18px;
    }

    .input-group input {
      width: 90%;
      padding: 10px 12px 10px 38px;
      border-radius: 10px;
      border: 1px solid #ccc;
      font-size: 14px;
    }

    .input-group input:focus {
  outline: none;
  border: 1.5px solid rgba(0, 123, 255, 0.6); /* biru transparan */
  box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.15); /* efek glow halus */
}

    .input-group i {
      position: absolute;
      top: 50%;
      left: 12px;
      transform: translateY(-50%);
      color: #aaa;
    }

    .form-check {
      display: flex;
      align-items: center;
      font-size: 13px;
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
      color: #007bff;
      text-decoration: none;
    }

    .btn {
      width: 100%;
      border: none;
      padding: 12px;
      font-size: 14px;
      font-weight: bold;
      border-radius: 30px;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.2s;
    }

    .btn-primary {
      background-color: #007bff;
      color: white;
      margin-bottom: 12px;
    }

    .btn-primary:hover {
      background-color: #0056b3;
      transform: scale(1.02);
    }

    .btn-outline {
      background-color: white;
      color: #007bff;
      border: 2px solid #007bff;
    }

    .btn-outline:hover {
      background-color: #007bff;
      color: white;
      transform: scale(1.02);
    }

    .alert {
      font-size: 12px;
      color: red;
      margin-top: -10px;
      margin-bottom: 10px;
    }
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>

<body>
  <form method="POST" action="{{ route('login') }}" class="login-box">
    @csrf

    <div class="avatar">
      <img src="{{ asset('assets/vendors/images/profile.png') }}" alt="Avatar">
    </div>

    <h4>Masuk ke SIDINYAM</h4>

    <label for="email">Alamat Email</label>
    <div class="input-group">
      <i class="fa fa-envelope"></i>
      <input type="email" id="email" name="email" value="{{ old('email') }}" required>
    </div>
    @error('email')
      <div class="alert">{{ $message }}</div>
    @enderror

    <label for="password">Kata Sandi</label>
    <div class="input-group">
      <i class="fa fa-lock"></i>
      <input type="password" id="password" name="password" required>
    </div>
    @error('password')
      <div class="alert">{{ $message }}</div>
    @enderror

    <div class="form-check">
      <input type="checkbox" id="remember" name="remember">
      <label for="remember">Ingat Saya</label>
    </div>

    <div class="forgot-password">
      <a href="{{ route('password.request') }}">Lupa kata sandi?</a>
    </div>

    <button type="submit" class="btn btn-primary">Masuk</button>

    <a href="{{ url('/') }}">
      <button type="button" class="btn btn-outline">Kembali</button>
    </a>
  </form>
</body>
</html>