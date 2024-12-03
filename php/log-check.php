<?php
include "global/Serverconfiguration.php";  
include "global/dbconnection.php";    
session_start();

if (isset($_POST['login'])) {
    // Capturar datos del formulario
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verificar si el email y la contraseña coinciden en la base de datos (empleados)
    $stmt = $pdo->prepare("SELECT * FROM empleados WHERE Correoelectronico = :correo");
    $stmt->bindParam(':correo', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Depuración: Verifica los valores que se están recibiendo y los datos de la base de datos
    echo 'Correo: ' . $email;
    echo ' Contraseña: ' . $password;
    echo '<br>';
    print_r($user);

    if ($user) {
        // Verificar si la contraseña es correcta (sin cifrado para las contraseñas actuales)
        if ($password === $user['Contrasena']) {
            // Iniciar sesión
            $_SESSION['session_username'] = $user['Nombre'];  
            $_SESSION['session_apellido'] = $user['Apellido'];  
            $_SESSION['session_email'] = $user['Correoelectronico']; 
            $_SESSION['session_role'] = $user['Rol']; 
            echo 'Sesión iniciada correctamente para empleado.';
            header('Location: index.php');
            exit();
        } else {
            echo "<div class='alert alert-danger'>Contraseña incorrecta.</div>";
        }
    } else {
        // Si no se encuentra en empleados, buscar en administradores
        $stmt = $pdo->prepare("SELECT * FROM administrador WHERE AEmail = :correo");
        $stmt->bindParam(':correo', $email);
        $stmt->execute();
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        // Depuración: Verifica los valores de administrador
        echo 'Correo: ' . $email;
        echo ' Contraseña: ' . $password;
        echo '<br>';
        print_r($admin);

        if ($admin) {
            // Verificar si la contraseña es correcta (sin cifrado para las contraseñas actuales)
            if ($password === $admin['Apass']) {
                // Iniciar sesión
                $_SESSION['session_username'] = $admin['AName'] . ' ' . $admin['ALName'];  
                $_SESSION['session_email'] = $admin['AEmail']; 
                $_SESSION['session_role'] = 'administrador'; 
                echo 'Sesión iniciada correctamente para administrador.';
                header('Location: index.html');
                exit();
            } else {
                echo "<div class='alert alert-danger'>Contraseña incorrecta.</div>";
            }
        } else {
            // Usuario no encontrado
            echo "<div class='alert alert-danger'>Usuario no encontrado.</div>";
        }
    }
}
