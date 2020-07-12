<?php
    // Recibe la URL como parametro en posición 1, desde la URL
    $ch = curl_init( $argv[1] );

    // Recibimos los datos obtenidos desde el servidor
    curl_setopt(
        $ch,
        CURLOPT_RETURNTRANSFER,
        true
    );

    // Ejecutamos la petición
    $response = curl_exec( $ch );

    // Recibo el codigo de la petición
    $httpCode = curl_getinfo( $ch, CURLINFO_HTTP_CODE );

    // Manejo de respuestas en las peticiones
    switch( $httpCode ) {
        case 200:
            echo "Todo se Ejecuto Correctamente"; 
        break;
        case 400:
            echo "Peticion incorrecta";
        break;
        case 404: 
            echo "Recurso no encontrado";
        break;
        case 500: 
            echo "Error de ejecucion en el servidor";
        break;
    }

?>