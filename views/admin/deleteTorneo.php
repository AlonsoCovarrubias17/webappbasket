<!--Alumno: Covarrubias Lopez Jesus Alonso-->
<!--Grupo: LISIV-3-->
<!-- Materia: DESARROLLO WEB AVANZADO-->
<!--Profesor: Dr. Aguilar Calderon Jose Alfonso-->
<?php
    require_once ("../../controllers/torneosControllers.php");
    $objTorneosControllers = new torneosControllers();
    //Obtener el id desde el boton que mandara eliminar el registro.
    //lo obtendremos de la pantalla del listado general de torneos.
    $objTorneosControllers->delete($_GET["id"]);

?>