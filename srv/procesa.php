<?php

header('Content-Type: application/json'); // Asegúrate de que el tipo de contenido sea JSON

// Manejo de errores en PHP
try {
    if (isset($_POST['nombre'])) {
        $nombre = $_POST['nombre'];

        $chistes = [
            "Ramon" => "¿Cuál es el colmo de un programador? Tener problemas de 'conexión' social.",
            "Melanie" => "¿Qué hace un pez en un servidor? Nada, pero consume ancho de banda.",
            "Mariana" => "¿Por qué la computadora fue al gimnasio? Para mejorar su 'rendimiento'.",
            "Jaime" => "¿Cómo saludan los programadores? ¡Hola Mundo!",
            "Ana" => "¿Por qué el programador fue al médico? Porque tenía un bucle infinito de dolor de cabeza."
        ];

        if (array_key_exists($nombre, $chistes)) {
            $chiste = $chistes[$nombre];
        } else {
            $chiste = "No hay chistes.";
        }

        // Responder con JSON
        echo json_encode(["chiste" => $chiste]);
    } else {
        // Si no se envió el nombre
        echo json_encode(["error" => "No se envió ningún nombre."]);
    }
} catch (Exception $e) {
    // En caso de error, responder con el error en JSON
    echo json_encode(["error" => "Ocurrió un error en el servidor.", "details" => $e->getMessage()]);
}
?>