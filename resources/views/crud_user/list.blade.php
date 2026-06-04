<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Document</title>
</head>
<body>
    <header class="container-border">
        <nav>
            <a href="#">Home</a> | 
            <a href="{{ route('user.login') }}"><b>Đăng xuất</b></a>
        </nav>
    </header>

    <main class="content-container">
        <h1>Danh sách user</h1>

        <table class="user-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse($list as $l)
                <tr>
                    <td>{{ $l->id }}</td>
                    <td>{{ $l->name }}</td>
                    <td>{{ $l->email }}</td>
                    <td class="actions-cell"><a href="{{ route('user.update', ['id' => $l->id]) }}">Edit</a> | View | Delete</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">Chưa có dữ liệu</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="pagination">
            <button class="page-link">Previous</button>
            <button class="page-link active">1</button>
            <button class="page-link">2</button>
            <button class="page-link">3</button>
            <button class="page-link">Next</button>
        </div>
    </main>

    <footer class="container-border">
        Lập trình web @01/2024
    </footer>
</body>
</html>