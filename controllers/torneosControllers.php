<?php
    require_once("../../models/torneosModel.php");

    class torneosController{

        private $model;

        public function __construct()
        {
            $this->model = new torneosModel();
        }

        //Creamos metodo controlador que mandar llamar la funcion insert del Modelo.
        //Tambien mandara los parametros necesarios para guardar en la tabla "torneos".
        //Si los datos se guardan redireccionara al usuario a la pantalla de unicio de lo 
        //contrario se mantendra en la pantalla del formulario de captura de datos del toneo.
        public function saveTorneo($nombreTorneo, $organizador, $patrocinadores, $sede, $categoria,
        $premio1, $premio2, $premio3,$otroPremio, $usuario, $contrasena){
            //Recordemos que la funcion insert del modelo, regresa el ultimo id generado.
            $id= $this->model->insert($nombreTorneo, $organizador, $patrocinadores, $sede, $categoria,
        $premio1, $premio2, $premio3, $otroPremio, $usuario, $contrasena);
        return($id!=false) ? header("Location: mainTorneos.php") : header("Location: frmTorneos.php");

        }

        //Metodo que manda ejecutar la funcion read del modelo del Torneo.
        public function readTorneos(){
            return ($this->model->read()) ? $this->model->read() : false;
        }
    }
?>