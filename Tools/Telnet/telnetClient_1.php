<?php
error_reporting(E_ALL);

/* Obtener el puerto para el servicio WWW. */
$service_port = 10003;//getservbyname('telnet', 'tcp');

/* Obtener la dirección IP para el host objetivo. */
$address = "10.211.55.3";// gethostbyname('10.211.55.3');

/* Crear un socket TCP/IP. */
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket === false) {
    echo "socket_create() falló: razón: " . socket_strerror(socket_last_error()) . "\n";
} else {
    echo "OK.\n";
}

echo "Intentando conectar a '$address' en el puerto '$service_port'...";
$result = socket_connect($socket, $address, $service_port);
if ($result === false) {
    echo "socket_connect() falló.\nRazón: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
} else {
    echo "OK.\n";
}

$in = "PSFILTER |1389355|prod|2|Y|18674|||500,1001,1002,1003,1004,1005,1006,1007,1008,1009,1010,1011,1012,1013,1014,1015,1016,1017,1018,1019,1020,1021,1022,1023,1024,1025,1026,1027,1029,1030,1101,1201,1301,1401,1409,1501,1519,1529,1539,1549,1579,1599,1619,1629,1639,1649,1659,1669,1679,1689,1699,1709,1719,1729,1739,1740,1741,1742,1744,1745,1746,1747,1748,1749,1750,1751,1752,1753,1754,1755,1756,1757,1758,1759,1760,1761,1762,1775,1776,1777,1778,1779,1780,1781,1782,1783,1784,1785,1786,1787,1788,1789,1790,1791,1792,1793,1794,1795,1796,1797,1798,1799,1800,1801,1802,1803,1804,1805,1806,1807,1808,1810,1811,1812,1813,1814,1815,1816,1817,1818,1819,1820,1821,1822,1823,1824,1825,1826,1827,1828,1829|1011,1003,1529,1017,1005,1004,1022,1027,1689,1797,1519,1808,1746,1821,1006,1818,1819,1801,1828,1749,1669,1825,1014,1823,1025,1599,1741|2~~N~N||,,,,|1544832000,1544832000,1543876463||N";
//$in = "HEAD / HTTP/1.1\r\n";
//$in .= "Host: www.example.com\r\n";
//$in .= "Connection: Close\r\n\r\n";
$out = '';

echo "Enviando petición ...";
socket_write($socket, $in, strlen($in));
echo "OK.\n";

echo "Leyendo respuesta:\n\n";
while ($out = socket_read($socket, 2048, PHP_BINARY_READ)) {
    echo $out;
}

echo "Cerrando socket...";
socket_close($socket);
echo "OK.\n\n";
?>
