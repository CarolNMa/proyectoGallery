<?php
// Incluir esta línea al principio de tu archivo PHP para iniciar la sesión
session_start();

// Tu código para cerrar sesión aquí, por ejemplo:
 unset($_SESSION['nomUsuario']);
 session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cerrar Sesión</title>
</head>
<body>

<!-- Mostrar el mensaje de confirmación -->
<script>
function confirmarcierresesion() {
    if (confirm('¿Estás seguro de que quieres cerrar la sesión?')) {
        window.location = 'index.php'; 
    }
}
</script>

<button onclick="confirmarcierresesion()">Cerrar Sesión</button>

</body>
</html>

    


















