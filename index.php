<?php
require 'Connection.php';
$connection = new Connection();
$time_logged = $connection->getTimeLogged();
if ($time_logged)
    $time_logged = $time_logged['time_logged'];
else
    $time_logged = '0';

?>
<html>
    <head>
        <title>Tempo Logado</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
<body>
    <h1 class="text-center">Tempo ativo no sistema hoje.</h1>
    <div class="text-center" style="font-size: 30px;" id="logged"><?=(isset($time_logged)) ?$time_logged : 0?> minutos</div>
</body>

<script>
    localStorage.time_logged = parseInt(<?=(isset($time_logged)) ?$time_logged : 0?>);
</script>
<script type="text/javascript" src="script.js"></script>
</html>






