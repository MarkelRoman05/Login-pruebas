<!DOCTYPE html>
<html>

<head>
    <title>Iniciar Sesión</title>
    <meta charset="utf-8" />
    <style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url("images/MARKEL05 - BANNER.jpg");
            background-size: 100% 100%;
            background-repeat: no-repeat;
        }

        .login-container {
            background: #f8f8f8;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            padding: 60px;
            width: 400px;
            text-align: center;
            animation: slide-up 0.6s ease;
        }

        @keyframes slide-up {
            from {
                opacity: 0;
                transform: translateY(50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-container h2 {
            color: #333;
            margin-bottom: 30px;
        }

        .login-container input {
            width: calc(100% - 20px);
            padding: 15px;
            margin: 15px 0;
            border: 2px solid #ccc;
            border-radius: 10px;
            transition: all 0.3s ease;
            outline: none;
        }

        .login-container input:focus {
            border-color: #57b846;
            box-shadow: 0 0 10px rgba(87, 184, 70, 0.3);
        }

        .login-container button {
            width: calc(100% - 20px);
            padding: 15px;
            margin: 25px 0;
            border: none;
            background: #57b846;
            color: white;
            cursor: pointer;
            border-radius: 10px;
            transition: background 0.3s;
        }

        .login-container button:hover {
            background: #449c3f;
        }

        .login-container .message {
            color: #57b846;
            display: none;
            margin-top: 25px;
            font-size: 1.1em;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <img src="images/MARKEL05-logo.jpg" height="85" width="85" />
        <h2>Iniciar sesión</h2>
        <form action="/markel/login/" method="post">
            ¿Eres nuevo? Regístrate <a href="/markel/registro/">aquí</a>.
            <input type="text" name="username" id="username" placeholder="Usuario" />
            <input type="password" name="password" id="password" placeholder="Contraseña" />
            <a href="/markel/resetpassword/">He olvidado la contraseña...</a>
            <button type="submit">Iniciar sesión</button>
            <p class="message" id="message"></p>
        </form>
    </div>

    <script>
        function login() {
            // Simular inicio de sesión (se puede integrar con un backend real)
            const username = document.querySelector('input[type="text"]').value;
            const password = document.querySelector('input[type="password"]').value;

            // Validación simple
            if (username == "markel" && password == "markel") {
                document.querySelector(".message").style.display = "block";
            }
        }
    </script>
</body>

</html>