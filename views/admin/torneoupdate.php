// Alumno: Covarrubias Lopez Jesus Alonso
// Grupo: LISIV-3
// Materia: DESARROLLO WEB AVANZADO
// Profesor: Dr. Aguilar Calderon Jose Alfonso
<?php
    require_once(__DIR__ . "/../../controllers/torneosControllers.php");

    
require_once(__DIR__ . "/../../controllers/torneosControllers.php");

    // Obtener datos primero
        $id = $_POST["txtId"] ?? null;
        $nombreTorneo = $_POST["txtNombreTorneo"] ?? "";
        $organizador = $_POST["txtOrganizador"] ?? "";
        $patrocinadores = $_POST["txtPatrocinador"] ?? "";
        $sede = $_POST["txtSede"] ?? "";
        $categoria = $_POST["txtCategoria"] ?? "";
        $premio1 = $_POST["txtPremio1"] ?? "";
        $premio2 = $_POST["txtPremio2"] ?? "";
        $premio3 = $_POST["txtPremio3"] ?? "";
        $otroPremio = $_POST["txtOtroPremio"] ?? "";

    // Validar ID
    if (!$id) {
        die("Error: ID no recibido en update");
    }

    // Instanciar controlador
    $objController = new TorneosControllers();

    // Ejecutar update
    $objController->updateTorneos(
        $id, 
        $nombreTorneo, 
        $organizador, 
        $patrocinadores, 
        $sede, 
        $categoria,
        $premio1, 
        $premio2, 
        $premio3,
        $otroPremio
);
?>