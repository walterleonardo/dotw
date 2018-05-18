<?php
//namespace First;

//Class ServersCluster is used by class ConnectorTCP
class ServersCluster {
    // Server configuration, 'IP ADDRESS','PORT','ENABLED or DISABLED','Internaly used: quantity of fails request before to DISABLE it'
    //IF only want one server config the first one.
    public static $hostsPort =array(
        array('10.255.5.78', '8003', 'ENABLED', 0),
        array('10.255.5.74', '8003', 'DISABLED', 0),
        array('10.255.5.202', '8003', 'DISABLED', 0),
        array('10.255.5.212', '8003', 'DISABLED', 0),
        array('0.0.0.0', '10006', 'DISABLED', 0)
    );
}

