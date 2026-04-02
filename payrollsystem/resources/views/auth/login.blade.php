<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(45deg, #6b93d6, #1e3c72, #3a559f, #6a8ab2);
            background-size: 300% 300%;
            animation: gradientAnimation 6s ease infinite;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
            position: relative;
        }

        @keyframes gradientAnimation {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .login-container {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            background: rgba(0, 0, 0, 0.7); 
            border-radius: 12px;
            box-shadow: 0 6px 30px rgba(0, 0, 0, 0.3);
            padding: 2rem;
            max-width: 400px;
            width: 100%;
            text-align: center;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .login-box:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 40px rgba(0, 0, 0, 0.5);
        }

        .login-box h1 {
    font-size: 2rem;
    margin-bottom: 1.5rem;
    color: #fff;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    animation: colorZoom 3s ease-out infinite;
}

@keyframes colorZoom {
    0% {
        transform: scale(0.8);
        color: #fff;
        opacity: 0;
    }
    50% {
        transform: scale(1.1);
        color: #f39c12; /* Change color here */
        opacity: 1;
    }
    100% {
        transform: scale(1);
        color: #fff; /* Back to original color */
    }
}


        @keyframes typing {
            from {
                width: 0;
            }

            to {
                width: 100%;
            }
        }

        @keyframes blink {
            50% {
                border-color: transparent;
            }
        }

        .login-box .floating-label {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .login-box input {
            width: 85%;
            padding: 14px 12px 14px 40px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1rem;
            color: #fff;
            background-color: rgba(255, 255, 255, 0.2); /* Transparent background */
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .login-box input:focus {
            border-color: #1e3c72;
            outline: none;
            box-shadow: 0 0 6px rgba(30, 60, 114, 0.5);
        }

        .login-box label {
            position: absolute;
            top: 10px;
            left: 40px;
            font-size: 1rem;
            color: #aaa;
            pointer-events: none;
            transition: top 0.3s ease, font-size 0.3s ease, color 0.3s ease;
        }

        .login-box input:focus + label,
        .login-box input:not(:placeholder-shown) + label {
            top: -10px;
            font-size: 0.85rem;
            color: #1e3c72;
        }

        .input-icon {
            position: absolute;
            top: 50%;
            left: 12px;
            transform: translateY(-50%);
            color: #aaa;
        }

        .password-container {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 12px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #aaa;
        }

        .login-link {
            display: inline-block;
            margin-top: 1rem;
            color: #fff;
            font-weight: 600;
            text-decoration: none;
            font-size: 1rem;
            transition: color 0.3s ease;
        }

        .login-link:hover {
            color: #f39c12;
        }

        .login-btn {
            background-color: #1e3c72;
            color: white;
            border: none;
            padding: 14px 0;
            width: 85%;
            font-size: 1.1rem;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            margin-top: 1.5rem;
        }

        .login-btn:hover {
            background-color: #163a61;
            transform: translateY(-2px);
        }

        .login-btn:focus {
            outline: none;
            box-shadow: 0 0 6px rgba(30, 60, 114, 0.5);
        }

        @media (max-width: 400px) {
            .login-box {
                padding: 1.5rem;
            }

            .login-box h1 {
                font-size: 1.5rem;
            }
        }

        #flash-message {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            padding: 15px 25px;
            border-radius: 4px;
            background-color: #f44336; /* red */
            color: white;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
            opacity: 1;
            transition: opacity 0.5s ease;
        }
    </style>
</head>

<body>
    @if (session('error'))
        <div id="flash-message" class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="login-container">
    <div class="login-box">
        <div style="display: flex; justify-content: center; align-items: center; height: auto; margin-top:0px; margin-bottom:-10px;">
            <div class="logo-wrapper" style="width: 180px; height: 180px; overflow: hidden; border-radius: 10%;">
                <img src="{{ asset('logo/logo.jpg') }}" alt="Logo" style="width: auto; height: 100%; object-fit: contain;" />
            </div>
        </div>




        <h1>Login</h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email input -->
            <div class="floating-label">
                <input type="email" name="email" id="email" required placeholder="Email " />
                <i class="fas fa-envelope input-icon"></i>
            </div>

            <!-- Password input -->
            <div class="floating-label password-container">
                <input type="password" name="password" id="password" required placeholder="Password " />
                <i class="fas fa-lock input-icon"></i>
                <i class="fas fa-eye toggle-password" id="toggle-password"></i>
            </div>

            <!-- Login button -->
            <button class="login-btn">Log In</button>
        </form>
    </div>
</div>


    <script>
        const togglePassword = document.getElementById('toggle-password');
        const passwordField = document.getElementById('password');

        togglePassword.addEventListener('click', function () {
            const type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;

            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>

    <script>
        // Wait for the page to fully load
        window.addEventListener('DOMContentLoaded', (event) => {
            const flash = document.getElementById('flash-message');
            if (flash) {
                // Wait 4 seconds then fade out
                setTimeout(() => {
                    flash.style.opacity = '0';
                    // Remove the element from the DOM after fade-out
                    setTimeout(() => flash.remove(), 500);
                }, 4000);
            }
        });
    </script>

</body>

</html>