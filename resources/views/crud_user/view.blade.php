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
            <a href="#" class="active">Đăng xuất</a>
        </nav>
    </header>

    <main class="login-container">
        <div class="login-box">
            <h1>Màn hình chi tiết</h1>

            <div class="info-group">
                <label>Username:</label>
                <span>{{ $user->name }}</span>
            </div>

            <div class="info-group">
                <label>Email:</label>
                <span>{{ $user->email }}</span>
            </div>

            <div class="info-group">
                <label>Thích:</label>
                <span>{{ $user->likes }}</span>
            </div>

            <div class="info-group">
                <label>Ghét:</label>
                <span>{{ $user->dislikes }}</span>
            </div>

            <div class="actions">
                <a href="{{ route('user.update', ['id' => $user->id]) }}" class="btn-login">Chỉnh sửa</a>
            </div>
        </div>
    </main>

    <footer>
        Lập trình web @01/2024
    </footer>
</body>

</html>
