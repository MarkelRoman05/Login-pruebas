<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "bkirolak";

    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

   

    $sql = "INSERT INTO usuarios VALUES ('$username', '$password', '')";

    if ($conn->query($sql) === TRUE) {
        echo "<p class='success-message'>REGISTRADO.</p>";
    } else {
        echo "<p class='error-message'>Error al REGISTRARSE: " . $conn->error . "</p>";
    }

    $conn->close();
}
?>
