// Alumno: Covarrubias Lopez Jesus Alonso
// Grupo: LISIV-3
// Materia: DESARROLLO WEB AVANZADO
// Profesor: Dr. Aguilar Calderon Jose Alfonso
<?php
    require_once(__DIR__ . "/../model/torneosmodels.php");

    class torneosControllers{

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
        return($id!=false) ? header("Location: admin.php") : header("Location: frmTorneos.php");

        }

        //Metodo que manda ejecutar la funcion read del modelo del Torneo.
        public function readTorneos(){
            return ($this->model->read()) ? $this->model->read() : false;
        }

        //Metodo para ejecutar la funcion readOne del modelo Torneo.
        public function readOneTorneos($id){
            return ($this->model->readOne($id));
        }

        //Metodo que manda llamar la funcion update del modelo.
        public function updateTorneos($id, $nombreTorneo, $organizador, $patrocinadores, $sede, 
    $categoria, $premio1, $premio2, $premio3, $otroPremio){

    $resultado = $this->model->update(
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

    if ($resultado != false) {
        header("Location: /webappbasket/views/admin/readOneTorneos.php?id=" . $id);
    } else {
        header("Location: /webappbasket/views/admin/readAllTorneos.php");
    }

    exit;
}
    //Metodo que manda llamar  a la funcion delete del modelo.
    public function delete($id){
        return ($this->model->delete($id)) ? header("Location: readAllTorneos.php"): header("Location: readOneTorneos.php?id=.$id");
    }
    }
?>