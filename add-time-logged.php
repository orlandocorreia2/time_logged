<?php
require 'Connection.php';
$connection = new Connection();
$time_logged = (isset($_GET['time_logged']) && !empty($_GET['time_logged'])) ? $_GET['time_logged'] : false ;
$connection->setTimeLogged($time_logged);
