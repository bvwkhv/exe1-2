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
            <a href="#" class="active">Đăng nhập</a> |
            <a href="{{ route('user.register') }}">Đăng ký</a>
        </nav>
    </header>

    <main class="login-container">
        <div class="login-box">
            <h1>Màn hình đăng nhập</h1>
            
            <form method="POST" action="{{ route('user.authUser') }}">
                @csrf
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="name" name="name">
                </div>

                <div class="input-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" id="password" name="password">
                </div>

                <div class="options">
                    <label class="checkbox-container">
                        <input type="checkbox" checked>
                        <span class="checkmark"></span>
                        Ghi nhớ đăng nhập
                    </label>
                </div>

                <div class="actions">
                    <a href="#" class="forgot-password">Quên mật khẩu</a>
                    <button type="submit" class="btn-login">Đăng nhập</button>
                </div>
            </form>
        </div>
    </main>

    <footer>
        Lập trình web @01/2024
    </footer>
</body>
</html>