<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Document</title>
</head>
<body>
    <!-- Navbar -->
    <header>
        <nav class="navbar">
            <a href="#">Home</a> |
            <a href="{{ route('user.login') }}">Đăng nhập</a> |
            <a href="{{ route('user.register') }}" class="active">Đăng ký</a>
        </nav>
    </header>

    <main class="login-container">
        <div class="login-box">
            <h1>Màn hình đăng ký</h1>
            
            <form method="POST" action="{{ route('user.postUser') }}">
                @csrf
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                    @if ($errors->has('username'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="input-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" id="password" name="password" required>
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <div class="input-group">
                    <label for="password">Nhập lại mật khẩu</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                </div>

                <div class="input-group">
                    <label for="password">Email</label>
                    <input type="email" id="email" name="email" required>
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="actions">
                    <a href="#" class="forgot-password">Đã có tài khoản</a>
                    <button type="submit" class="btn-login">Đăng ký</button>
                </div>
            </form>
        </div>
    </main>

    <footer>
        Lập trình web @01/2024
    </footer>
</body>
</html>