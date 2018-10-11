<?php
//namespace First;

//Class ServersCluster is used by class ConnectorTCP
class ServersCluster {
    // Server configuration, 'IP ADDRESS','PORT','ENABLED or DISABLED','Internaly used: quantity of fails request before to DISABLE it'
    //IF only want one server config the first one.
    public static $hostsPort =array(
        array('10.255.0.202', '10003', 'ENABLED', 0),
        array('10.255.0.11', '10003', 'DISABLED', 0),
    );
}

