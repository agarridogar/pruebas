<?php

require_once 'model/modelo_usuarios.php';
require_once 'model/modelo_productos.php';	
require_once 'model/modelo_valoraciones.php';

class WebControlador{
	
    private $usuario;
    private $productos;
    private $valoraciones;
    

	public function __CONSTRUCT(){
		
    $this->usuario= new Usuario();
    $this->productos= new productos();
    $this->valoraciones= new valoraciones();


    }
    
    public function Index(){
		
        require_once 'view/header.php';
        require_once 'view/Contenido/home.php';
        require_once 'view/footer.php';
    }
	
	public function Registro_usuario(){
		
		$user = new Usuario();
		
        require_once 'view/header.php';
        require_once 'view/Contenido/registro.php';
        require_once 'view/footer.php';
    }
	
	public function Login_usuario(){
		
		$user = new Usuario();
		
        require_once 'view/header.php';
        require_once 'view/Contenido/login.php';
        require_once 'view/footer.php';
    }


    public function Crud(){

        $prod = new Productos();
      
        require_once 'view/header.php';
        require_once 'view/Contenido/vista_productos.php';
        require_once 'view/footer.php';
    }
	
	public function Guardar_usuarios(){


		$user = new Usuario();
		
        $user->nombre_usuario = $_REQUEST['nombre_usuario'];
        $user->password_usuario = $_REQUEST['password_usuario'];
       	$this->usuario->Registrar($user);
        
        echo "Usuario registrado con exito, <a href='index.php'>volver</a>";
	}
	
	public function Iniciar_sesion(){
		
		$user = new Usuario();
		
		$user->nombre_usuario = $_REQUEST['nombre_usuario'];
		$user->password_usuario = $_REQUEST['password_usuario'];
		
		$this->usuario->Validar($user);

    }


    public function ValorarProducto(){

        $prodsel = new Productos();

        if(isset($_SESSION["nombre_usuario"])){
        
            if(isset($_REQUEST['id_producto'])){
                $prodsel = $this->productos->ObtenerProducto($_REQUEST['id_producto']);
            }
            
            require_once 'view/header.php';
            require_once 'view/Contenido/vista_valora_producto.php';
            require_once 'view/footer.php';
        }

        else {
			header("Location: index.php?c=Web&a=Login_usuario");
		}
    }

    //public function Votar(){
       // require_once 'view/header.php';
        //require_once 'model/modelo_valoraciones.php';
        //require_once 'view/footer.php';

        //$alm = new Valoraciones();
        //$id_usuario = $this->valoraciones->buscar_id_usuario($_SESSION['nombre_usuario']);
        
       
        //$alm->id_usuario = $_REQUEST['id_usuario'];
        //$alm->id_producto = $_REQUEST['id_producto'];
        //$alm->puntos_producto_usuario = $_REQUEST['estrellas'];
        //$alm->valoracion_producto = $_REQUEST['valoracion_producto'];
        

       
        //$this->Valoraciones->Votacion($alm);
            
    //}
    public function Votar(){
        require_once 'model/modelo_valoraciones.php';
        require_once 'model/modelo_usuarios.php';

        $alm= new Valoraciones();
        $usu= new Usuario();
        echo $_SESSION['nombre_usuario'];
        //if(isset($_SESSION["nombre_usuario"])){
        //echo "sooooooooooool!";
            //if(isset($_REQUEST['nombre_usuario'])){
                $usu = $this->valoraciones->buscar_id_usuario($_SESSION['nombre_usuario']);
                
                
                //hasta aqui non da erros!!
                $alm->id_usuario = $usu->id_usuario;//$_REQUEST['id_usuario'];
                $alm->id_producto = $_REQUEST['id_producto'];
                $alm->puntos_producto_usuario = $_REQUEST['estrellas'];
                $alm->valoracion_producto = $_REQUEST['valoracion_escrita'];
                
                $this->valoraciones->Votacion($alm);
                echo "fff";
                //tampouco da erros pero non inserta nova fila
            //}
            
            //require_once 'view/header.php';
            //require_once 'view/footer.php';
            echo $_REQUEST['estrellas'];
            echo $_REQUEST['valoracion_escrita'];
            echo $_REQUEST['id_producto'];
            //non o lee //echo $_REQUEST['nombre_usuario'];
            
            
        //}

        //else {
		//	header("Location: index.php?c=Web&a=Login_usuario");
		//}

   }
    
    

}

?>