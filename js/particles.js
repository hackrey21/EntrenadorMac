particlesJS('particles-js', 
    {
        "particles": {
            "number": {
                "value": 40,  // Ajusta la cantidad según necesidad
                "density": {
                    "enable": true,
                    "value_area": 800
                }
            },
            "shape": {
                "type": "image",  // Cambiamos de "circle" a "image"
                "image": {
                    "src": "https://cdn-icons-png.flaticon.com/512/1046/1046784.png", // Ícono SVG o PNG
                    "width": 100,
                    "height": 100
                }
            },
            "size": {
                "value": 20,  // Tamaño de la hamburguesa
                "random": true
            },
            "opacity": {
                "value": 0.8,
                "random": false
            },
            "line_linked": {
                "enable": false  // Desactivamos las líneas
            },
            "move": {
                "enable": true,
                "speed": 2,
                "direction": "none",
                "random": false,
                "straight": false,
                "out_mode": "out"
            }
        },
        "interactivity": {
            "events": {
                "onhover": {
                    "enable": true,
                    "mode": "repulse"
                },
                "onclick": {
                    "enable": true,
                    "mode": "push"
                }
            }
        },
        "retina_detect": true
    }
);
