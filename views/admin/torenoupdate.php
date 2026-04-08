<?php
    require_once(__DIR__ . "/../../controllers/torneosControllers.php");

    // Instanciamos nuestro Controlador.
    $objController = new TorneosControllers();
    //Obtener valores del formulario con POST !!! . Hay que traer el Id.

    $id = $_POST["txtId"];
    $nombreTorneo = $_POST["txtNombreTorneo"];
    $organizador = $_POST["txtOrganizador"];
    $patrocinadores = $_POST["txtPatrocinador"];
    $sede = $_POST["txtSede"];
    $categoria = $_POST["txtCategoria"];
    $premio1 = $_POST["txtPremio1"];
    $premio2 = $_POST["txtPremio2"];
    $premio3 = $_POST["txtPremio3"];
    $otroPremio = $_POST["txtOtroPremio"];
   


    $objController->updateTorneos($id, $nombreTorneo, $organizador, $patrocinadores, $sede, $categoria,
    $premio1, $premio2, $premio3,$otroPremio);
    
    
    
?>