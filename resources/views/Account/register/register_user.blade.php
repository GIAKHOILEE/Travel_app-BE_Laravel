<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body class="antialiased">
        <form action="{{URL::to('/register/user/store')}}"   method="post">
            @csrf
            @if(session('messageUsername'))
            <span class="form-message" >{{session('messageUsername')}}</span><br>
            @endif
            @if(session('messagePassword'))
            <span class="form-message" >{{session('messagePassword')}}</span><br>
            @endif
            <label for="username">Họ tên:</label>
            <input type="text" id="name" name="username" value="" required placeholder="Username"><br>

            <label for="email">Email:</label>
            <input type="text" id="name" name="email" value="" required placeholder="Email"><br>

            <label for="password">mat khau</label>
            <input type="text" id="name" name="password" value="" required placeholder="Password"><br>

            <label for="repassword">nhap lai mat khau</label>
            <input type="text" id="name" name="repassword" value="" required placeholder="Retype Password"><br>


            <button id="register-btn" name="submit">
                Đăng ký
            </button>



        </form>

    </body>
</html>
