<?php

declare(strict_types=1);

namespace Protobuffer\Dotwproto;

class Server
{
	public function run(): void
	{
		$method = ltrim(rawurldecode($_SERVER['REQUEST_URI']), '/');
                error_log("RAW");
                error_log(rawurldecode($_SERVER['REQUEST_URI']));
                error_log("METODO? ");
                error_log($method);

		switch ($method) {
			case 'psfilter':
				$request = new PsfilterRequest();
                                $data = file_get_contents('php://input');
                                error_log("Mensaje? ");
                                error_log($data);
//                                $info = explode("|", $data);
//                                error_log($info[0]);
//                                error_log($info[1]);
				$request->mergeFromString(file_get_contents('php://input'));
				$reply = (new Service())->psfilter($request);
                                error_log("Reply? ");
                                
                                
				echo $reply->serializeToString();
				break;
			default:
				http_response_code(404);
		}
	}
        
        public function runTCP(): void
	{
        $max_clients = 5;
        $preguntas = 0;
        $respuestas = 0;
        $limpieza = 0;
        $address = "localhost";
        $portServer = 10003;

        if (!($sock = socket_create(AF_INET, SOCK_STREAM, 0))) {
            $errorcode = socket_last_error();
            $errormsg = socket_strerror($errorcode);
            die("Couldn't create socket: [$errorcode] $errormsg \n");
        }
        echo "Socket created \n";
//Say to system that need to use the same socket. remove error in BIND
        socket_set_option($sock, SOL_SOCKET, SO_REUSEADDR, 1);
// Bind the source address
        if (!socket_bind($sock, $address, $portServer)) {
            $errorcode = socket_last_error();
            $errormsg = socket_strerror($errorcode);

            die("Could not bind socket : [$errorcode] $errormsg \n");
        }
        echo "Socket bind OK \n";
        if (!socket_listen($sock, 10)) {
            $errorcode = socket_last_error();
            $errormsg = socket_strerror($errorcode);
            die("Could not listen on socket : [$errorcode] $errormsg \n");
        }
        echo "Socket listen in port $portServer OK \n";
        echo "Waiting for incoming connections... \n";
//array of client sockets
        $client_socks = array();
//array of sockets to read
        $read = array();
//start loop to listen for incoming connections and process existing connections
        while (true) {
            //prepare array of readable client sockets
            $read = array();
            //first socket is the master socket
            $read[0] = $sock;
            //now add the existing client sockets
            for ($i = 0; $i < $max_clients; $i++) {
                if (isset($client_socks[$i]) && $client_socks[$i] != null) {
                    $read[$i + 1] = $client_socks[$i];
                }
            }
            //now call select - blocking call
            if (socket_select($read, $write, $except, null) === false) {
                $errorcode = socket_last_error();
                $errormsg = socket_strerror($errorcode);
                die("Could not listen on socket : [$errorcode] $errormsg \n");
            }
            //if ready contains the master socket, then a new connection has come in
            if (in_array($sock, $read)) {
                for ($i = 0; $i < $max_clients; $i++) {
                    if (!isset($client_socks[$i]) || $client_socks[$i] == null) {
                        $client_socks[$i] = socket_accept($sock);
                        //display information about the client who is connected
                        if (socket_getpeername($client_socks[$i], $address, $port)) {
                            echo "Client $address : $port is now connected to us. \n";
                        }
                        break;
                    }
                }
            }
            //check each client if they send any data
            for ($i = 0; $i < $max_clients; $i++) {
                if (isset($client_socks[$i])) {
                    if (in_array($client_socks[$i], $read)) {
                        $input = socket_read($client_socks[$i], 2048);
                            
                            
                        echo "Received in $portServer from client $i <-- $input";
                        $start = microtime(true);
                        if ($input == "shutdown\r\n" || $input == "QUIT\r\n") {
                            unset($client_socks[$i]);
                            if (isset($client_socks[$i])) {
                                socket_close($client_socks[$i]);
                            }
                            echo "CLOSE SESSION OF $i ";
                            $input = "CLOSE";
                            //break 2;
                        }
                        if ($input == null) {
                            //zero length string meaning disconnected, remove and close the socket
                            unset($client_socks[$i]);
                            echo "CLOSE session $i \n";
                            $input = "CLOSE";
                        } else {
                            $preguntas++;
                            //$start = microtime(true);
                            $str = str_replace ("\r\n", "", $input);
                            $n = trim($input); //Remove Spaces
                            echo "RECIBIDO dentro: ";
                            echo $n;
                            $arrayReceived = explode(" ", $n);
                             echo "RECIBIDO dentro array 0: ";
                            echo $arrayReceived[0];
                            
                            if (preg_match('/PSFPROTO/', $arrayReceived[0])) {
                                if (!isset($arrayReceived[1])) {
                                    $output = "ERR \"Error Description\"\r\n";
                                } else {
                                    
                                    $request = new PSFRequest();
                                    error_log("Mensaje? ");
                                    error_log($str);
                                   $request->mergeFromString($str);
                                    error_log("Merge protobuf? ");
                                    error_log($str);
                                    $reply = (new Service())->psfilter($request);
                                   
                                    $output = $reply->serializeToString();
                                    $output = "$output\r\n";
                                    error_log("Salida? ");
                                    error_log($output);
                                    
                                    //$output = "OK |||0,1005,16564,44,44,1000|||0,1007,16564,64,54,CAL132100,1001|||1,1007,16564,44,2414345,CAL341000,3|||1,1007,16564,44,2413875,CAL341000,3|||1,1007,16564,64,2415005,CAL132100,3|||0,1000,17144,1519588,14275908,1519588,|||0,1000,17144,1519588,14275888,1519588,|||0,1000,17144,1519588,14275978,1519588,\r";
                                }
                            } elseif (preg_match('/HOTELDATAREQUEST/', $arrayReceived[0])) {
                                if (!isset($arrayReceived[1])) {
                                    $output = "ERR \"Error Description\"\r\n";
                                } else {
                                    $output = "OK |description1,description2,geopoints,ratingDescription,direct,2~2~2~2,Preferred,BuiltYear,renovationYear,floors,noOfRooms,luxury,hotelname,address,zipCode,location,locationID,location1,location2,location3,cityName,cityCode,stateName,stateCode,countryName,countryCode,regionName,regionCode,2~2~2~2,2~2~2~2,2~2~2~2,hotelPhone,hotelCheckIn,hotelCheckOut,minAge,rating,fireSafety,chain,lastUpdated,thumb#alt#category#url~thumb#alt#category#url~thumb#alt#category#url,twin#2{2{2#name#2{2{2{2{2{2{2~twin#2{2{2#name#2{2{2{2{2{2{2~twin#2{2{2#name#2{2{2{2{2{2{2,name~dist~distanceUnit~distTime~directions|description1,description2,geopoints,ratingDescription,direct,2~2~2~2,Preferred,BuiltYear,renovationYear,floors,noOfRooms,luxury,hotelname,address,zipCode,location,locationID,location1,location2,location3,cityName,cityCode,stateName,stateCode,countryName,countryCode,regionName,regionCode,2~2~2~2,2~2~2~2,2~2~2~2,hotelPhone,hotelCheckIn,hotelCheckOut,minAge,rating,fireSafety,chain,lastUpdated,thumb#alt#category#url~thumb#alt#category#url~thumb#alt#category#url,twin#2{2{2#name#2{2{2{2{2{2{2~twin#2{2{2#name#2{2{2{2{2{2{2~twin#2{2{2#name#2{2{2{2{2{2{2,name~dist~distanceUnit~distTime~directions\r\n";
                                }
                            } else {
                                $output = "ERR \"Error Description\"\r\n";
                            }
                            if (isset($client_socks[$i])) {
                                socket_write($client_socks[$i], $output);
                            }
                            $respuestas++;
                            echo "Sending from $portServer to client $i --> $output \n";
                            $elapsedlong = microtime(true) - $start;
                            $elapsed = round($elapsedlong, 10, PHP_ROUND_HALF_UP) * 1000;
                            echo "took $elapsed seconds\r\n";
                        }

                        echo "Received 	$preguntas \n";
                        echo "Reply     $respuestas \n";
                        $limpieza = 0;
                        //echo "took $elapsed seconds\r\n";
                    }
                }
            }

            if ($limpieza > 100) {
                $respuestas = 0;
                $preguntas = 0;
            }
            $limpieza++;
        }

//		switch ($method) {
//			case 'psfilter':
//				$request = new PsfilterRequest();
//                                $data = file_get_contents('php://input');
//                                error_log("Mensaje? ");
//                                error_log($data);
////                                $info = explode("|", $data);
////                                error_log($info[0]);
////                                error_log($info[1]);
//				$request->mergeFromString(file_get_contents('php://input'));
//				$reply = (new Service())->psfilter($request);
//				echo $reply->serializeToString();
//				break;
//			default:
//				http_response_code(404);
//		}
	}
}