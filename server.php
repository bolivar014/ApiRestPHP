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

    // Verificamos que el ID del recurso buscado, exista. Sino, Retorna vacio
    $resourceId = array_key_exists('resource_id', $_GET) ? $_GET['resource_id'] : '';


    // Caso para determinar el tipo de Respuesta del metodo "GET - POST - PUTH - DELETE"
    switch(strtoupper($_SERVER['REQUEST_METHOD'])) {
        case 'GET': 
            // Verificamos el ID a procesar
            if(empty($resourceId)) {
                // Sino tiene ID, muestra todo
                echo json_encode($books);
                
            } else {
                // En caso que el ID exista, muestra los datos de ese ID
                if(array_key_exists( $resourceId, $books )) {
                    // Imprimo los datos del array
                    echo json_encode( $books[$resourceId] );
                }
            }
        break;
        case 'POST': 
            // 
            $json = file_get_contents('php://input');
            
            // Ejecutamos los cambios en el POST
            $books[] = json_decode($json, true );

            // Contamos el ultimo ID procesado
            echo array_keys($books)[ count( $books - 1 )];

        break;
        case 'PUT':
            // Modificar datos
            // Validamos que el recurso buscado, exista
            if((!empty($resourceId)) && (array_key_exists( $resourceId, $books ))) {
                // tomamos la entrada cruda
                $json = file_get_contents('php://input');   
            
                // Transformamos el JSON recibido, en el nuevo JSON
                $books[ $resourceId ] = json_decode($json, true);

                // Retornamos el array en Formato JSON
                echo json_encode( $books );
            
            }

        break;
        case 'DELETE':
        break;
    }


?>