<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/frontend/css/login.css">
    <title>LOGIN</title>
</head>
<form method="POST" action="{{ route('login') }}">
    @csrf

    <div>
        <label for="username">Username</label>

        <div>
            <input id="username" type="username" name="username" value="{{ old('email') }}" required autofocus>
        </div>
    </div>

    <div>
        <label for="password">Mật khẩu</label>

        <div>
            <input id="password" type="password" name="password" required>
        </div>
    </div>


    <div>
        <div>
            <button type="submit">
                Đăng nhập
            </button>


        </div>
    </div>
</form>
</html>
