<?php
session_start();

// Datos de conexión a la base de datos
$host = "localhost";
$user = "root";
$password = "";
$database = "proyecto";

// Conectar a la base de datos
$conn = new mysqli($host, $user, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Obtener datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Consultar si el usuario existe en la base de datos
$sql = "SELECT * FROM usuarios WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Verificar si el usuario existe
if ($result->num_rows > 0) {
    // Obtener los datos del usuario
    $user = $result->fetch_assoc();

    // Verificar la contraseña
    if (password_verify($password, $user['password'])) {
        // Si las credenciales son correctas, iniciar sesión
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        
        // Redirigir a la página de inicio con mensaje de éxito
        echo "<script>alert('¡Inicio de sesión exitoso!'); window.location.href='inicio.html';</script>";
    } else {
        // Si la contraseña es incorrecta
        echo "<script>alert('Contraseña incorrecta. Intenta de nuevo.'); window.location.href='login.html';</script>";
    }
} else {
    // Si el usuario no existe
    echo "<script>alert('Usuario no encontrado. Intenta de nuevo.'); window.location.href='login.html';</script>";
}

$conn->close();
?>
