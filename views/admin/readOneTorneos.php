<!--Alumno: Covarrubias Lopez Jesus Alonso-->
<!--Grupo: LISIV-3-->
<!-- Materia: DESARROLLO WEB AVANZADO-->
<!--Profesor: Dr. Aguilar Calderon Jose Alfonso-->
<?php
    require_once(__DIR__ . "/template/header.php");
    require_once(__DIR__ . "/../../controllers/torneosControllers.php"); 
    //Instanciamos controlador para ejecutar la consulta.
    $objTorneosController= new TorneosControllers();
    // Capturar el id y a su vez sacar la informacion del Torneo.
    $lstTorneo=$objTorneosController->readOneTorneos($_GET["id"])
    
?>
    <div class=" mx-auto p-5">
        <div class="card">
        <div class="card-header">
             INFORMACION DEL TORNEO.
        </div>
        <div class="card-body">
            <form action="torneosinsert.php" method="post">
                <div class="md-3">
                    <label for="nombreTorneo" class="form-label">NOMBRE DEL TORNEO (ID: <?= $lstTorneo["id"] ?></label>
                    <input type="text" class ="form-control" name ="txtNombreTorneo"
                     id="nombreTorneo" value="<?= $lstTorneo["nombreTorneo"]?>"readonly>
                </div>
                <div class="mb-3">
                    <label for="organizador" class="form-label" >ORGANIZADOR (nombre completo)
                    </label>
                    <input type="text" name="txtOrganizador" id="organizador"
                    class="form-control" value="<?= $lstTorneo["organizador"] ?>"readonly>
                </div>
                <div class="md-3">
                    <label for="patrocinador" class="form-label">PATROCINADOR(ES)</label>
                    <textarea name="txtPatrocinador" id="patrocinador" cols="30" rows="2"
                    class="form-control"><?= $lstTorneo["patrocinadores"] ?></textarea>
                    <span id="patrocinador" class="form-text"readonly>
                        Atencion: se puede separar con "," si hay mas de un patrocinador.
                    </span>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="sede" class="form-label" >SEDE (cancha)</label>
                        <input type="text" name="txtSede" id="sede" class="form-control" value=
                        "<?= $lstTorneo["sede"] ?>"readonly>
                    </div>
                    <div class="col mb-3">
                        <label for="categoria" class="form-label">CATEGORIA</label>
                        <input list="lstCategoria" name="txtCategoria" id="categoria"
                        class="form-control" value="<?= $lstTorneo["categoria"] ?>"readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="premio1" class="form-label">PREMIO 1ER. LUGAR </label>
                        <input type="text" name="txtPremio1" id="premio1" class="form-control"
                        value="<?= $lstTorneo["premio1"] ?>"readonly>
                    </div>
                    <div class="col mb-3">
                        <label for="premio2" class="form-label">PREMIO 2DO. LUGAR </label>
                        <input type="text" name="txtPremio2" id="premio2" class="form-control"
                        value="<?= $lstTorneo["premio2"] ?>"readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="premio3" class="form-label">PREMIO 3ER. LUGAR </label>
                        <input type="text" name="txtPremio3" id="premio3" class="form-control"
                        value="<?= $lstTorneo["premio3"] ?>"readonly>
                    </div>
                    <div class="col mb-3">
                        <label for="otroPremio" class="form-label">OTRO PREMIO (CAMPEON
                            CANASTERO) </label>
                        <input type="text" name="txtOtroPremio" id="otroPremio" class="form-control"
                        value="<?= $lstTorneo["otroPremio"] ?>"readonly>
                    </div>
                </div>
                <!-- Usuario y Contraseña para el Organizador del Torneo -->
                <div class="row">
                    <div class="col mb-3">
                        <label for="usuario" class="form-label">USUARIO </label>
                        <input type="text" name="txtUsuario" id="usuario" class="form-control"
                        value="<?= $lstTorneo["usuario"] ?>"readonly>
                    </div>
                    <div class="col mb-3">
                        <label for="contrasena" class="form-label">CONTRASEÑA</label>                            CANASTERO) </label>
                        <input type="text" name="txtContrasena" id="contrasena"
                         class="form-control" value="<?= $lstTorneo["contrasena"] ?>"readonly>
                    </div>
                </div> 
                <div class="col-12">
                    <a href="readAllTorneos.php" class="btn btn-success">REGRESAR</a>
                </div>              
            </form>
        </div>
        <div class="card-footer text-body-secondary">
            DETALLE TORNEOS
        </div>
    </div>
    </div>
<?php
    require_once(__DIR__ . "/template/footer.php");
?>