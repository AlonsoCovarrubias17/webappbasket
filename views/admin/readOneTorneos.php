<?php
    require_once(__DIR__ . "/template/header.php");
    require_once(__DIR__ . "/../../controllers/torneosControllers.php"); 
    //Instanciamos controlador para ejecutar la consulta.
    $objTorneosController= new TorneosControllers();
    // Capturar el id y a su vez sacar la informacion del Torneo.
    $lstTorneo=$objTorneosController->readOneTorneos($_GET["id"])
    
?>
    <div class="card text-center">
        <div class="card-header">
                DETALLE DEL TORNEO SELECCIONADO
        <div class="card-body">
            <table class="table table-hover table-bordered">
                <thead class="table-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">TORNEO</th>
                        <th scope="col">ORGANIZADOR</th>
                        <th scope="col">PATROCINADORES</th>
                        <th scope="col">SEDE</th>
                        <th scope="col">CATEGORIA</th>
                        <th scope="col">CAMPEON</th>
                        <th scope="col">SUBCAMPEON</th>
                        <th scope="col">3ER LUGAR</th>
                        <th scope="col">OTRO PREMIO</th>
                        <th scope="col">USUARIO</th>
                        <th scope="col">CONTRASEÑA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="col"><?= $lstTorneo["id"] ?></td>
                        <td scope="col"><?= $lstTorneo["nombreTorneo"]?></td>
                        <td scope="col"><?= $lstTorneo["organizador"] ?></td>
                        <td scope="col"><?= $lstTorneo["patrocinadores"] ?></td>
                        <td scope="col"><?= $lstTorneo["sede"] ?></td>
                        <td scope="col"><?= $lstTorneo["categoria"] ?></td>
                        <td scope="col"><?= $lstTorneo["premio1"] ?></td>
                        <td scope="col"><?= $lstTorneo["premio2"] ?></td>
                        <td scope="col"><?= $lstTorneo["premio3"] ?></td>
                        <td scope="col"><?= $lstTorneo["otroPremio"] ?></td>
                        <td scope="col"><?= $lstTorneo["usuario"] ?></td>
                        <td scope="col"><?= $lstTorneo["contrasena"] ?></td>
                    </tr>
                     
                </tbody>
            </table>             
         </div>
    </div>
<?php
    require_once(__DIR__ . "/template/footer.php");;