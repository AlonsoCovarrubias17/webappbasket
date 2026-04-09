<?php
    require_once ("../../controllers/torneosControllers.php");
    $objTorneosControllers = new torneosControllers();
    //Obtener el id desde el boton que mandara eliminar el registro.
    //lo obtendremos de la pantalla del listado general de torneos.
    $objTorneosControllers->delete($_GET["id"]);

?>