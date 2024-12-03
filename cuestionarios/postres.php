<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/postres.css">
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
                    <span>Jesus Guerra</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="userDropdown">
                    <div class="user-info">
                        <img src="Perfil.png" alt="Foto de Usuario">
                        <h5>Jesus Guerra</h5>
                        <p>Crew</p>
                    </div>
                    <li><a class="dropdown-item" href="#">Configuración</a></li>
                    <li><a class="dropdown-item" href="#">Salir</a></li>
                </ul>
            </div>
        </div>
    </nav>
   

    <div class="welcome-message" id="welcomeMessage">
        <h2>¡Hola, <span id="userName"></span>! ¿Estás listo para comenzar el cuestionario de postres?</h2>
        <p>¡Tu aventura de sabores comienza aquí!</p>
        <button class="btn btn-primary mt-3" id="startBtn">Comenzar</button>
        <p class="mcd-motto">"¡Me encanta cuando me pides algo delicioso!"</p>
    </div>
    <div class="container my-5" id="quizContainer">
        <div class="contadorBoton">
            <button id="exitBtn" class="btn btn-danger mt-3">
                <i class="bi bi-arrow-left"></i> Salir
            </button>
            <div id="questionCounter">
                <span id="currentQuestion">Pregunta 1 de 10</span>
            </div>
        </div>
        
        
        <div id="timer">
            <div id="circle">
                <span id="timeLeft">20</span> 
            </div>
        </div>
        <div class="card custom-card">
            <div class="card-header text-center">
                <h5 class="card-title mb-0">¿A qué bebida se refiere?</h5>
            </div>
            <div class="card-body">
                <p class="card-text text-muted">
                    Se refiere a una bebida de color blanca que se sirve en un vaso transparente, tiene sabor a vainilla dulce y deliciosa con una base de leche cremosa y dulce.
                </p>
                <form>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="question1" id="option1" value="option1">
                        <label class="form-check-label" for="option1">Malteada de vainilla</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="question1" id="option2" value="option2">
                        <label class="form-check-label" for="option2">Frappé de vainilla</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="question1" id="option3" value="option3">
                        <label class="form-check-label" for="option3">Mcflurry</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="question1" id="option4" value="option4">
                        <label class="form-check-label" for="option4">Cafe con nieve</label>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <script>
        const userName = 'Juan'; 
        document.getElementById('userName').textContent = userName;
    
        document.getElementById('startBtn').addEventListener('click', function() {
            document.getElementById('welcomeMessage').style.display = 'none'; // Oculta el mensaje de bienvenida
            document.getElementById('quizContainer').style.display = 'block';  // Muestra el cuestionario
            let timeLeft = 20;
            const timerElement = document.getElementById('timeLeft');
            const circleElement = document.getElementById('circle');
            
            const countdown = setInterval(function() {
                timeLeft--;
                timerElement.textContent = timeLeft;
                if (timeLeft <= 5) {
                    circleElement.classList.add("low-time");
                }
    
                if (timeLeft <= 0) {
                    clearInterval(countdown);
                    alert('¡El tiempo ha terminado!'); // Alerta cuando el tiempo se acabe
                }
            }, 1000);
        });
    </script>
    
</body>
</html>
