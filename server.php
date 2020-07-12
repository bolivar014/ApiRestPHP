<?php 
    // Definimos los recursos disponibles
    $allowedResourceTypes = [
        'books',
        'authors',
        'genres',
    ];


    // Validamos que el recurso no este disponible, para finalizar el API
    $resourceType = $_GET['resource_type'];

    if(!in_array($resourceType, $allowedResourceTypes)) {
        die;
    }

    // Defino los recursos
    $books = [
        1 => [
            'titulo' => 'Lo que el viento se llevo',
            'id_autor' => 2,
            'id_genero' => 2,
        ],
        2 => [
            'titulo' => 'La iliada',
            'id_autor' => 1,
            'id_genero' => 1,
        ],
        3 => [
            'titulo' => 'La odisea',
            'id_autor' => 3,
            'id_genero' => 3,
        ],
    ];

    // Indicamos al servidor que vamos a estar retornando archivos tipo JSON
    header('Content-Type: application/json');

    // Caso para determinar el tipo de Respuesta del metodo "GET - POST - PUTH - DELETE"
    switch(strtoupper($_SERVER['REQUEST_METHOD'])) {
        case 'GET': 
            echo json_encode($books);
        break;
        case 'POST': 
        break;
        case 'PUT':
        break;
        case 'DELETE':
        break;
    }


?>