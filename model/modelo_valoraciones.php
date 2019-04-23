<?php

require_once 'model/conexion.php';

    class  Valoraciones {

        private $pdo;

        public $id_usuario;
        public $id_producto;
        public $puntos_producto_usuario;
        public $valoracion_producto;

        public function __CONSTRUCT(){
            try{
                $this->pdo = Conexion::Conectar();     
            }
            catch(Exception $e){
                die($e->getMessage());
            }
        }

        public function Votacion(Valoraciones $data){
           try{
           $sql = "INSERT INTO votaciones_producto (id_usuario, id_producto, puntos_producto_usuario,valoracion_producto) 
                    VALUES (?, ?, ?, ?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->id_usuario,
                        $data->id_producto, 
                        $data->puntos_producto_usuario, 
                        $data->valoracion_producto)
                    
               );
               
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        public function buscar_id_usuario($nombre_usuario){
            //if(isset($_SESSION["nombre_usuario"])){
                echo"son parvaaaaaaaaaaaaaaaaas";
                //$variable= $_REQUEST['nombre_usuario'];
                try{
                    $sql="SELECT * FROM usuario WHERE nombre_usuario= '$nombre_usuario' ";
                    $stm= $this->pdo->prepare($sql);
                    $stm->execute();
                    return $stm->fetch(PDO::FETCH_OBJ);
                }catch(Exception $e){
                    die($e->getMessage());
                }
            //}
        }    
    
    
        


    }
?>