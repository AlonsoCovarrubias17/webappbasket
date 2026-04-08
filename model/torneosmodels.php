<?php
    require_once(__DIR__ . "/../config/Database.php");

    class torneosModel{
        public $PDO;

        public function __construct()

        {
            //Declaramos la variable para conexion a la BD.
            //Instanciamos la clase DataBase.
            $conecction = new DataBase();
            //Llamamos al metodo connect y lo asignamos a nuestra 
            //variable $PDO.
            $this->PDO = $conecction->connect();
        }

        //Metodo para hacer un INSERT en la BD, en tabla "torneos".
        public function insert($nombreTorneo, $organizador, $patrocinadores, $sede, $categoria,
        $premio1, $premio2, $premio3,$otroPremio, $usuario, $contrasena){
            //Encriptar Contraseña asignada al organizador del torneo.
            $contrasena = $this->passwordEncrypt($contrasena);
            // iniciamos declarando el statement y preparando la consulta.
            $statement = $this->PDO->prepare("INSERT INTO torneos VALUES(null, :nombreTorneo,
            :organizador, :patrocinadores, :sede, :categoria, :premio1, :premio2, :premio3,
            :otroPremio, :usuario, :contrasena)");
            //Asociamos los valores colocados como placeholder en el query mediante el 
            //binParam().
            $statement->bindParam(":nombreTorneo", $nombreTorneo);
            $statement->bindParam(":organizador", $organizador);
            $statement->bindParam(":patrocinadores", $patrocinadores);
            $statement->bindParam(":sede", $sede);
            $statement->bindParam(":categoria", $categoria);
            $statement->bindParam(":premio1", $premio1);
            $statement->bindParam(":premio2", $premio2);
            $statement->bindParam(":premio3", $premio3);
            $statement->bindParam(":otroPremio", $otroPremio);
            $statement->bindParam(":usuario", $usuario);
            $statement->bindParam(":contrasena", $contrasena);
            //Ejecutamos el statement mediante execute(). Valoraremos mediante un shorthand if
            //lo que regresara este metodo.
            return ($statement->execute()) ? $this->PDO->lastInsertId() : false ;
        }

            //El administrador creara el torneo y al usuario (organizador).
            //Por lo que al crear su password, buscaremos encriptarla por seguridad.
            //Utilizar el metodo password_hash y password_verify.

            public function passwordEncrypt($password){
                $passwordEncrypted =password_hash($password, PASSWORD_DEFAULT);
                return $passwordEncrypted;
            }
            //Metodo para verificar si la password introducida corresponde con la encriptada.
            public function passwordDencrited($passwordEncrypted, $passwordCandidate){
                //con un shorthand if, verificamos si el password candidato es correcto.
                return (password_verify($passwordCandidate, $passwordEncrypted)) ? true : false;
            }
            
            //Crearemos el metodo para listar todos los torneos.
            public function read(){
                $statement = $this->PDO->prepare("SELECT * FROM torneos");
                return ($statement->execute()) ? $statement->fetchAll() : false;
            }

            //Metodo para devolver la informacion de un solo torneo.
            public function readOne($id){
                $statement = $this->PDO->prepare("SELECT * FROM torneos WHERE id= :id LIMIT 1");
                $statement->execute([":id"=> $id]);
                return $statement->fetch(PDO::FETCH_ASSOC);
            }

            //Metodo para actualizar los datos del Torneo.
            public function update($id, $nombreTorneo, $organizador, $patrocinadores, $sede, 
            $categoria,$premio1, $premio2, $premio3,$otroPremio){
                $statement = $this->PDO->prepare("UPDATE torneos SET nombreTorneo = :nombreTorneo,
                organizador = :organizador, patrocinadores = :patrocinadores, sede =  :sede, categoria 
                = :categoria, premio1 = :premio1, premio2 = :premio2, premio3 = :premio3, otroPremio
                = :otroPremio WHERE id = :id");
                //Asociamos los valores colocados como placeholder en el query mediante el 
                //binParam().
                $statement->bindParam(":id", $id);
                $statement->bindParam(":nombreTorneo", $nombreTorneo);
                $statement->bindParam(":organizador", $organizador);
                $statement->bindParam(":patrocinadores", $patrocinadores);
                $statement->bindParam(":sede", $sede);
                $statement->bindParam(":categoria", $categoria);
                $statement->bindParam(":premio1", $premio1);
                $statement->bindParam(":premio2", $premio2);
                $statement->bindParam(":premio3", $premio3);
                $statement->bindParam(":otroPremio", $otroPremio);

                return ( $statement-> execute()) ? $id : false;          

            }
        }
    

?>