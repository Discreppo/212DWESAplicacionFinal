<?php

/**
 * @author original Carlos García Cachón
 * @author Oscar Pascual Ferrero
 * @version 1.0
 * @since 15/01/2024
 * @copyright Todos los derechos reservados a Carlos García
 * 
 * @Annotation Aplicación Final - REST 
 * 
 */
class REST {

    /**
     * Obtenemos la imagen de la API de la NASA.
     *
     * @param string $fecha La fecha para buscar la imagen (AAAA-MM-DD)
     * 
     * @return array|null En caso de éxito, devuelve toda la información. En caso de error, devuelve null.
     */
    public static function apiNasa($fecha) {
        try {
            // Solicitud a la API
            $resultado = file_get_contents("https://api.nasa.gov/planetary/apod?api_key=0fv7NY8SEpqGLiVim6ZIJbibPvAc4EdS5fHNyFJj&date={$fecha}");

            // Verificamos si la solicitud fue exitosa
            if ($resultado == false) {
                throw new Exception("Error en la conexión con el servidor, vuelva a intentarlo mas tarde"); //Lanzamos una excepcion
            }

            // Decodificamos la respuesta JSON
            return json_decode($resultado, true); //devolvemos un array con los datos de la respuesta
        } catch (Exception $excepcion) {
            $aRespuesta [0] = $excepcion->getMessage(); //Asignamos a un array el mensaje de error de la excepcion
            return $aRespuesta; // devolvemos el array con el mensaje de error
        }
    }

    public static function nasa() {
        try {
            $resultado = file_get_contents("https://api.nasa.gov/planetary/apod?api_key=0fv7NY8SEpqGLiVim6ZIJbibPvAc4EdS5fHNyFJj"); // obtenemos el resultado del servidor del api rest

            if ($resultado == false) { // si no obtenemos el resultado esperado
                throw new Exception("Error en la conexión con el servidor, vuelva a intentarlo mas tarde"); //Lanzamos una excepcion
            }

            $aNasa = json_decode($resultado, true); // Almacenamos el array devuelto por json_decode
            return $aNasa; //devolvemos un array con los datos que queremos devolver
        } catch (Exception $excepcion) {
            $aRespuesta [0] = $excepcion->getMessage(); //Asignamos a un array el mensaje de error de la excepcion
            return $aRespuesta; // devolvemos el array con el mensaje de error
        }
    }

    public static function negocio($param) {
        try{
        $url = 'https://local-business-data.p.rapidapi.com/search';
        $queryData = http_build_query([
            'query' => $param,
            'limit' => '20',
            'zoom' => '13',
            'language' => 'es',
            'region' => 'spa'
        ]);
        $headers = [
            'X-RapidAPI-Key: 716b97ed62mshfc5114b277450a8p118071jsnec01f4eb6ff8',
            'X-RapidAPI-Host: local-business-data.p.rapidapi.com'
        ];
        $context = stream_context_create([
            'http' => [
                'method' => 'GET',
                'header' => implode("\r\n", $headers)
            ]
        ]);
        $response = @file_get_contents($url . '?' . $queryData, false, $context);
        if ($response === false) {
            $error = error_get_last();
            if ($error && strpos($error['message'], 'HTTP/1.1 429') !== false) {
            // Si recibimos el error 429
            $aNegocio['message'] = "Has excedido la cuota MENSUAL de Empresas en tu plan actual, BÁSICO. Contacta con el administrador.</a>"; 
            return $aNegocio;
            }
            throw new Exception("Error en la conexión con el servidor, vuelva a intentarlo mas tarde"); //Lanzamos una excepcion
        } 
        $aNegocio = json_decode($response,true);// Almacenamos el array devuelto por json_decode
        return $aNegocio; //devolvemos un array con los datos que queremos devolver
        }catch(Exception $excepcion) {
            $aRespuesta [0] = $excepcion->getMessage(); //Asignamos a un array el mensaje de error de la excepcion
            return $aRespuesta; // devolvemos el array con el mensaje de error
            
        }
    }
}
