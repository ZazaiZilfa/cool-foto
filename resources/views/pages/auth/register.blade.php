<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Cool Foto</title>
    <link rel="stylesheet" href="{{ asset('user/css/register.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>

        body {
          background-image: url('user/images/gege.png');
          background-position:center;

        }

        header {
          background: rgba(255,255,225, 0.5);
        }
      </style>
</head>

<body>


    <div class="wrapper">
        <form id="registerForm" method="POST" action="{{ route('register') }}">
            @csrf
            <h1>Register</h1>
            <div class="input-box">
                <input type="text" placeholder="Username" name="name" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="email" placeholder="Email" name="email" required>
                <i class='bx bxs-envelope' ></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" name="password" required>
                <i class='bx bxs-lock-alt' ></i>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Password Confirmation" required>
                <i class='bx bxs-lock-alt' ></i>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
            <br><br>
            <center><div class="register-link">
                <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
            </div></center>

    </div>
</body>
