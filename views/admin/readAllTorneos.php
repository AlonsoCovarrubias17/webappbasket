<?php
    require_once(__DIR__ . "/template/header.php");
    require_once(__DIR__ . "/../../controllers/torneosControllers.php"); 
    //Instanciamos controlador para ejecutar la consulta.
    $objTorneosController= new TorneosControllers();
    //Capturamos los registros de la tabla en "filas".
    $rows = $objTorneosController->readTorneos();
?>
    <div class="card text-center">
        <div class="card-header">
                LISTADO DE TORNEOS
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered">
                <thead class="table-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">TORNEO</th>
                        <th scope="col">ORGANIZADOR</th>
                        <th scope="col">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($rows): ?>
                        <?php foreach($rows as $row): ?>
                            <tr>
                                <th><?= $row["id"] ?></th>
                                <th><?= $row["nombreTorneo"] ?></th>
                                <th><?= $row["organizador"] ?></th>
                                <th>
                                     ACCIONES:  EDITAR, ELIMINAR.
                                     <a href="readOneTorneos.php?id=<?= $row["id"] ?>" class="btn 
                                     btn-primary">Consultar</a>
                                     <a href="updateTorneos.php?id=<?= $row["id"] ?>" class="btn 
                                     btn-warning">Editar</a>
                                </th>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" class="text-center">
                                No hay torneos aun.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>             
         </div>
    </div>
<?php
    require_once(__DIR__ . "/template/footer.php");;
?>