<?php

require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/../lib/php/devuelveErrorInterno.php";

try {
    // Lista de personas con nombres
    $lista = [
        [
            "nombre" => "Ramon"
        ],
        [
            "nombre" => "Melanie"
        ],
        [
            "nombre" => "Mariana"
        ],
        [
            "nombre" => "Jaime"
        ],
        [
            "nombre" => "Ana"
        ]
    ];

    $chistes = [
        "Ramon" => "¿Cuál es el colmo de un programador? Tener problemas de 'conexión' social.",
        "Melanie" => "¿Qué hace un pez en un servidor? Nada, pero consume ancho de banda.",
        "Mariana" => "¿Por qué la computadora fue al gimnasio? Para mejorar su 'rendimiento'.",
        "Jaime" => "¿Cómo saludan los programadores? ¡Hola Mundo!",
        "Ana" => "¿Por qué el programador fue al médico? Porque tenía un bucle infinito de dolor de cabeza."
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