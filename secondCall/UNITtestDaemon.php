<?php

/*
 */

$request = array(
    0 => "HOTELDATAREQUEST |14|1|N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N|N,N,N,N \r\n",
    1 => "HOTELDATAREQUEST |34|1|N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N|N,N,N,N \r\n",
    2 => "HOTELDATAREQUEST |44|1|N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N|N,N,N,N \r\n",
    3 => "HOTELDATAREQUEST |54|1|N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N|N,N,N,N \r\n",
    4 => "HOTELDATAREQUEST |64|1|N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N|N,N,N,N \r\n",
    5 => "HOTELDATAREQUEST |74|1|N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N|N,N,N,N \r\n",
    6 => "HOTELDATAREQUEST |84|1|N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N,N|N,N,N,N \r\n",
);
error_reporting(E_ALL);
/* Obtener el puerto para el servicio WWW. */
//$service_port = getservbyname('www', 'tcp');
$service_port = 10003;

/* Obtener la dirección IP para el host objetivo. */
//$address = gethostbyname('www.example.com');
$address = "10.211.55.3";

/* Crear un socket TCP/IP. */
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket === false) {
    echo "socket_create() falló: razón: " . socket_strerror(socket_last_error()) . "\n";
} else {
    echo "OK Socket Create.\n";
}

echo "Intentando conectar a '$address' en el puerto '$service_port'...";
$result = socket_connect($socket, $address, $service_port);
if ($result === false) {
    echo "socket_connect() falló.\nRazón: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
} else {
    echo "\nOK socket connected.\n\r";
}

$out = '';
foreach ($request as $in) {
    echo "Sending to DAEMON :";
    socket_write($socket, $in, strlen($in));
    var_export($in);

    $buf = NULL;
    while (true) {
        if (false == ($buffer = socket_read($socket, 2048000, PHP_BINARY_READ))) {
            break;
        }
        $buf .= $buffer;
        if (strlen($buf) > 2) {
            $string = substr($buf, -2);
            if ($string === "\r\n" or $string === "\n\r") {
                break;
            }
        }
    }
    echo "Answer from DAEMON:";
    var_export($buf);

}
    echo"\r";
echo "Closing socket...";
socket_close($socket);
echo "OK.\n\n";
?>
