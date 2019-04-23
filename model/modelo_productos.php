<?php

require_once 'model/conexion.php';
		

    class  Productos {

        private $pdo;

        public $id_producto;
        public $id_categoria;
        public $nombre_producto;
        public $descripcion_producto;
        public $ruta_foto;
        public $num_votos;
        public $noticia_texto;
        public $puntos_total;
        public $puntos_media;
   

        public function __CONSTRUCT(){
            try{
                $this->pdo = Conexion::Conectar();     
            }
            catch(Exception $e){
                die($e->getMessage());
            }
        }
        


        public function ListarProductos()
        {
            try
            {
                $stm = $this->pdo->prepare("SELECT a.id_producto, b.descripcion_categoria as id_categoria, a.nombre_producto, a.descripcion_producto, a.ruta_foto, a.num_votos, a.puntos_total, a.puntos_media 
                FROM productos a 
                inner join categorias b where a.id_categoria = b.id_categoria");

                $stm->execute();
    
                return $stm->fetchAll(PDO::FETCH_OBJ);
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }


        public function ObtenerProducto($id_producto)
        {
            try 
            {                
                $stm = $this->pdo->prepare("SELECT a.id_producto, b.descripcion_categoria as id_categoria, a.nombre_producto, a.descripcion_producto, a.ruta_foto, a.num_votos, a.puntos_total, a.puntos_media 
                FROM productos a 
                inner join categorias b where a.id_categoria = b.id_categoria and id_producto = '$id_producto' " );
    
                $stm->execute(array($id_producto));
                return $stm->fetch(PDO::FETCH_OBJ);
            } catch (Exception $e) 
            {
                die($e->getMessage());
            }
        }

    }

?>


  