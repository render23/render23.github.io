<?php

header('Content-Type: application/json'); // Asegúrate de que el tipo de contenido sea JSON

// Manejo de errores en PHP
try {
    if (isset($_POST['nombre'])) {
        $nombre = $_POST['nombre'];

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