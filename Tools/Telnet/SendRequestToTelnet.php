<?php
ini_set('memory_limit', '-1');
//require_once "telnet.php";

//$telnet = new PHPTelnet();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$timeout = 3000;
set_time_limit(0); //TIMEOUT into receive
ini_set("default_socket_timeout", "3"); //TIMEOUT into send
$debug = true;

$host = "10.211.55.3";
$server = "10.211.55.3";
$port = 10003;
$message = "PSFILTER |1389355|prod|2|Y|18674|||500,1001,1002,1003,1004,1005,1006,1007,1008,1009,1010,1011,1012,1013,1014,1015,1016,1017,1018,1019,1020,1021,1022,1023,1024,1025,1026,1027,1029,1030,1101,1201,1301,1401,1409,1501,1519,1529,1539,1549,1579,1599,1619,1629,1639,1649,1659,1669,1679,1689,1699,1709,1719,1729,1739,1740,1741,1742,1744,1745,1746,1747,1748,1749,1750,1751,1752,1753,1754,1755,1756,1757,1758,1759,1760,1761,1762,1775,1776,1777,1778,1779,1780,1781,1782,1783,1784,1785,1786,1787,1788,1789,1790,1791,1792,1793,1794,1795,1796,1797,1798,1799,1800,1801,1802,1803,1804,1805,1806,1807,1808,1810,1811,1812,1813,1814,1815,1816,1817,1818,1819,1820,1821,1822,1823,1824,1825,1826,1827,1828,1829|1011,1003,1529,1017,1005,1004,1022,1027,1689,1797,1519,1808,1746,1821,1006,1818,1819,1801,1828,1749,1669,1825,1014,1823,1025,1599,1741|2~~N~N||,,,,|1544832000,1544832000,1543876463||N\n";

echo "Starting \n\r";



if (!($socket = @socket_create(AF_INET, SOCK_STREAM, SOL_TCP)))
        {
            $this->errorCode = socket_last_error($socket);
            $this->errorMessage = socket_strerror($this->errorCode);
            self::$arrayError = [$this->errorCode, $this->errorMessage, $server, $port];
            return false;
        }

        if ($debug)
        {
            echo "Socket created \n";
        }
        //Connect socket to remote server
        socket_set_option($socket, SOL_SOCKET, SO_SNDTIMEO, array('sec' => 3, 'usec' => 0));
        socket_set_option($socket, SOL_SOCKET, SO_RCVTIMEO, array('sec' => 3, 'usec' => 0));

//socket_set_nonblock($socket);
        $error = NULL;
        $attempts = 0;
        while (!($connected = @socket_connect($socket, $server, $port)) && ($attempts < $timeout))
        {
            $error = socket_last_error($socket);
            if ($error != SOCKET_EINPROGRESS && $error != SOCKET_EALREADY)
            {
                $this->errorCode = socket_last_error();
                $this->errorMessage = socket_strerror($error);
                socket_close($socket);
                self::$arrayError = [$this->errorCode, $this->errorMessage, $server, $port];
                return false;
            }
            usleep(100);
            $attempts++;
        }
//        if (!socket_connect($socket, $server, $port)) {
//            if ($debug) {
//                $this->errorCode = socket_last_error();
//                $this->errorMessage = socket_strerror($this->errorCode);
//            }
//            return false;
//        }
//        if ($debug) {
//            echo "Connection established \n";
//        }
        //Send the message to the server
        if (!@socket_send($socket, $message, strlen($message), 0))
        {
            $this->errorCode = socket_last_error();
            $this->errorMessage = socket_strerror($this->errorCode);
            self::$arrayError = [$this->errorCode, $this->errorMessage, $server, $port];
            return false;
        } else
        {
            if ($debug)
            {
                echo "Message send successfully \n";
            }
        }

//        while ($buf = socket_read($socket, 2048000, PHP_NORMAL_READ)) {
//            if ($debug) {
//                echo "Answer from server: $buffer";
//            }
//            break;
//        }
        //Connect socket to remote server PHP_BINARY_READ
        $buf = NULL;

while (true)
        {
    echo "Listen...";
            if (false == ($buffer = @socket_read($socket, 20480000, PHP_NORMAL_READ)))
            {
                break;
            }
            $buf .= $buffer;
            if (strlen($buf) > 2)
            {
                $string = substr($buf, -2);
                if ($string === "\r\n" or $string === "\n\r")
                {
                    break;
                }
            }
            if ($debug)
            {
                echo "Answer from server: $buf";
            }
        }
//
//while(true)
//    {
//    echo "In loop \n\r";
//    sleep(1);
//    $fp = fsockopen($host, 10003, $errno, $errstr, 3);
//        if (!$fp) {
//            echo "$errstr ($errno)<br />\n";
//        } else {
//            fwrite($fp, $string);
//            while (fgets($fp, 128)) {
//                echo fgets($fp, 128); // If you expect an answer
//            }
//            fclose($fp); // To close the connection
//        }
//    }
//    
    
 