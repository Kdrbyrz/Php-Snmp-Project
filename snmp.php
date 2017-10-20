<?php
$session = new SNMP(SNMP::VERSION_1, "127.0.0.1", "public");
$sysDesc = $session->get("1.3.6.1.2.1.1.1.0"); //getting system description
echo "$sysDesc\n";

$sysLocation = $session->get("1.3.6.1.2.1.1.6.0"); //getting system location
echo "$sysLocation\n";

//sending logs
//--------------------------
$host    = "URL or IP";
$port    = PORT;

$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
$result = socket_connect($socket, $host, $port) or die ("Could not connect to server\n");
socket_write($socket, $sysDesc, strlen($sysDesc)) or die("Could not send data to server\n");
socket_write($socket, $sysLocation, strlen($sysLocation)) or die("Could not send data to server\n");
echo "Done\n";
socket_close($socket);
