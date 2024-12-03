<?php
ob_start();
include "global/Serverconfiguration.php";  
include "global/dbconnection.php";
session_start();
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #000000; /* Fondo blanco para mayor contraste */
            padding: 1rem 2rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Sombra sutil */
        }
        .navbar-brand {
            display: flex;
            align-items: center;
            color: #fffb00;
        }
        .navbar-brand img {
            height: 40px;
            margin-right: 15px;
        }
        .navbar-brand h1 {
            color: #fffb00; /* Rojo de McDonald's */
            font-weight: 700;
            font-size: 1.5rem;
            margin: 0;
        }
        .navbar-nav {
            margin-left: auto;
            display: flex;
            align-items: center;
        }
        .nav-item {
            display: flex;
            align-items: center;
            margin-left: 20px;
        }
        .nav-link {
            color: #fbff00; /* Color de texto oscuro para contraste */
            display: flex;
            align-items: center;
            font-weight: 600;
            text-decoration: none;
        }
        .nav-link img {
            border-radius: 50%;
            height: 45px;
            width: 45px;
            border: 2px solid #da291c; /* Borde rojo para la foto del usuario */
            margin-right: 15px;
        }
        .nav-link span {
            font-size: 1rem;
            font-weight: 500;
            color: #fbff00;
        }
        .nav-link:hover {
            color: #da291c; /* Rojo de McDonald's en hover */
        }

        .dropdown-menu {
            min-width: 200px;
            padding: 1rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff; /* Fondo blanco para el dropdown */
        }
        .user-info {
            text-align: center;
            margin-bottom: 1rem;
        }
        .user-info img {
            border-radius: 50%;
            height: 60px;
            width: 60px;
            border: 2px solid #da291c;
        }
        .user-info h5 {
            margin: 0.5rem 0;
            font-size: 1.2rem;
            font-weight: 600;
            color: #333;
        }
        .user-info p {
            margin: 0;
            font-size: 0.7rem;
            color: #000000;
        }
        .dropdown-item {
            font-size: 0.9rem;
            padding: 0.75rem 1.25rem;
        }
        .dropdown-item:hover {
            background-color: #f8f9fa; /* Fondo claro en hover */
        }

        .container {
            padding: 2rem;
        }
        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra sutil */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .card-img-top {
            height: 200px; /* Altura fija para las imágenes */
            object-fit: cover;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        .card-header {
            background-color: #da291c; /* Rojo de McDonald's */
            color: #fff;
            font-weight: bold;
            text-align: center;
            padding: 1rem;
            border-bottom: 1px solid #d9534f;
        }
        .card-body {
            padding: 1.5rem;
            text-align: center;
        }
        .card-title {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }
        .card-text {
            font-size: 1rem;
            color: #555;
            margin-bottom: 1rem;
        }
        .card-footer {
            background-color: #f8f9fa;
            text-align: center;
            padding: 0.5rem;
        }
        .card-footer a {
            color: #da291c;
            text-decoration: none;
            font-weight: 600;
        }
        .card-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">
            <img src="Mcdonaldslogo-removebg-preview.png" alt="McDonald's Logo">
            McDonald's
        </a>
        <div class="navbar-nav">
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="Perfil.png" alt="Foto de Usuario">
                    <span><?php echo $_SESSION["session_username"] . ' ' . $_SESSION["session_apellido"]; ?></span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="userDropdown">
                    <div class="user-info">
                        <img src="Perfil.png" alt="Foto de Usuario">
                        <h5><?php echo $_SESSION["session_username"] . ' ' . $_SESSION["session_apellido"]; ?></h5>
                        <p><?php echo $_SESSION["session_role"]; ?></p>
                    </div>
                    <li><a class="dropdown-item" href="#">Configuración</a></li>
                    <li><a class="dropdown-item" href="#">Salir</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <!-- Tarjeta para Entrenador -->
            <div class="col-md-4 mb-4">
                <a href="Entrenador-secciones.html" class="card text-decoration-none">
                    <img src="Entrenador.jfif" class="card-img-top" alt="Entrenador">
                    <div class="card-header">
                        Entrenador
                    </div>
                    <div class="card-body">
                        <p class="card-text">Accede a los cuestionarios y recursos para entrenadores. Asegúrate de estar al día con las últimas prácticas.</p>
                    </div>
                    <div class="card-footer">
                        <a href="Entrenador-secciones.html">Ir al Cuestionario</a>
                    </div>
                </a>
            </div>
            <!-- Tarjeta para Gerente -->
            <div class="col-md-4 mb-4">
                <a href="cuestionario-gerente.html" class="card text-decoration-none">
                    <img src="Gerente.jpg" class="card-img-top" alt="Gerente">
                    <div class="card-header">
                        Gerente
                    </div>
                    <div class="card-body">
                        <p class="card-text">Accede a los cuestionarios y recursos para gerentes. Administra tus tareas y responsabilidades con eficiencia.</p>
                    </div>
                    <div class="card-footer">
                        <a href="cuestionario-gerente.html">Ir al Cuestionario</a>
                    </div>
                </a>
            </div>
            <!-- Tarjeta para Líder de Experiencia al Cliente -->
            <div class="col-md-4 mb-4">
                <a href="cuestionario-lider.html" class="card text-decoration-none">
                    <img src="LEC.jpg" class="card-img-top" alt="Líder de Experiencia al Cliente">
                    <div class="card-header">
                        Líder de Experiencia al Cliente
                    </div>
                    <div class="card-body">
                        <p class="card-text">Accede a los cuestionarios y recursos para líderes de experiencia al cliente. Mejora la satisfacción del cliente.</p>
                    </div>
                    <div class="card-footer">
                        <a href="cuestionario-lider.html">Ir al Cuestionario</a>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script></body>
</body>
</html>
