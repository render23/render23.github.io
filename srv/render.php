<?php

require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/../lib/php/devuelveErrorInterno.php";

try {
    // Lista de personas con nombres
    $lista = [
        [
            "nombre" => "Edher"
        ],
        [
            "nombre" => "Sehas"
        ],
        [
            "nombre" => "Enrique"
        ],
        [
            "nombre" => "Roni"
        ],
        [
            "nombre" => "Alexa"
        ],
        [
            "nombre" => "Ana"
        ],
        [
            "nombre" => "Andres"
        ],
        [
            "nombre" => "Edgar"
        ]
    ];

    $chistes = [
        "Edher" => "Camarero, este filete tiene muchos nervios. -Normal, es la primera vez que se lo comen.",
        "Sehas" => "¿Sabes cuál es el café más peligroso del mundo? - El ex-preso",
        "Enrique" => "¿Por qué el tomate no toma café? - Porque toma-te",
        "Roni" => "¿Qué le dice un gusano a otro gusano? -Voy a dar una vuelta a la manzana.",
        "Alexa" => "¿Qué hace una abeja en el gimnasio? - Zum-ba",
        "Ana" => "¿Cómo se depiden los químicos? -Ácido un placer",
        "Andres" => "¿Cómo se dice pañuelo en chino? -Sacamoco",
        "Edgar" => "-Doctor, tengo complejo de feo? - No es un complejo, usted es feo de verdad."
    ];

    // Genera el código HTML de la lista con estilo Material Design.
    $render = "";
    foreach ($lista as $modelo) {
        // Codifica el nombre para evitar inyección de código
        $nombre = htmlentities($modelo["nombre"]);
        
        // Busca el chiste correspondiente al nombre
        $chiste = isset($chistes[$nombre]) ? htmlentities($chistes[$nombre]) : "Chiste no disponible.";
        
        // Crea los elementos HTML con clases MD
        $render .=
        "<li class='md-two-line'>
            <span class='headline'>{$nombre}</span>
            <span class='supporting'>{$chiste}</span>
         </li>";
    }

    // Devuelve el HTML generado en formato JSON
    devuelveJson(["lista" => ["innerHTML" => $render]]);
} catch (Throwable $error) {
    // Manejo de errores
    devuelveErrorInterno($error);
}