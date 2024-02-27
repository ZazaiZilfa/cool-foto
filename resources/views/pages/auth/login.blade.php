<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Cool Foto</title>
    <link rel="stylesheet" href="{{ asset('user/css/login.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>

        body {
          background-image: url('user/images/gege.png');
          background-position: center;

        }

        header {
          background: rgba(255,255,225, 0.5);
        }
      </style>
</head>

<body>


    <div class="wrapper">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" name="email" placeholder="Email" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>

            <div class="register-link">
                <p>Don't have an account? <a href="">Register</a></p>
            </div>
        </form>
    </div>
</body>
