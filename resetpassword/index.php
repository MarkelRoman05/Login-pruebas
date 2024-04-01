<?php
// Configura la conexión a la base de datos. Reemplaza con tus propios detalles de conexión.
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bkirolak";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si el correo electrónico existe en la base de datos
    $email = $_POST["email"];
    $sql = "SELECT user_id FROM usuarios WHERE username = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // El usuario existe, permite elegir una nueva contraseña
        $newPassword = $_POST["new_password"];

        // Actualiza la contraseña en la base de datos
        $updateSql = "UPDATE usuarios SET password = '$newPassword' WHERE username = '$email'";
        if ($conn->query($updateSql) === TRUE) {
            echo "<p class='success-message'>Contraseña actualizada exitosamente.</p>";
        } else {
            echo "<p class='success-message'>Error al actualizar la contraseña: " . $conn->error + "</p>";
        }
    } else {
        echo "<p class='success-message'>El usuario no está registrado.</p>";
    }
}

// Cierra la conexión a la base de datos
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contraseña</title>
    <style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url("../images/MARKEL05 - BANNER.jpg");
            background-size: 100% 100%;
            background-repeat: no-repeat;
        }

        .login-container {
            background: rgba(255, 255, 255);
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

        .success-message {
            color: #57b846;
            font-size: 1.2em;
            font-weight: bold;
            margin-top: 20px;
            border: 2px solid #57b846;
            padding: 10px;
            border-radius: 5px;
            background-color: #f2fff0;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Recuperar Contraseña</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="email">Usuario:</label>
            <input type="text" name="email" required>
            <label for="new_password">Nueva contraseña:</label>
            <input type="password" name="new_password" required>
            <a href="../index.php">Volver al login...</a>
            <button type="submit">Recuperar Contraseña</button>
        </form>
    </div>
</body>

</html>