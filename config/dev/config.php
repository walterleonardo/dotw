<?php
//namespace First;

//Class ServersCluster is used by class ConnectorTCP
class ServersCluster {
    // Server configuration, 'IP ADDRESS','PORT','ENABLED or DISABLED','Internaly used: quantity of fails request before to DISABLE it'
    //IF only want one server config the first one.
    public static $hostsPort =array(
        //array('192.168.0.182', '10003', 'ENABLED', 0),
        array('10.211.55.3', '10003', 'ENABLED', 0),
        array('10.211.55.4', '10003', 'DISABLED', 0),
        array('10.211.55.5', '10003', 'DISABLED', 0),
        array('10.211.55.6', '10003', 'DISABLED', 0),
    );
}



