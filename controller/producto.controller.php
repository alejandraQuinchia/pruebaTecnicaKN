<?php
require_once 'model/producto.php';

class ProductoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Producto();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/producto/producto.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $alm = new Producto();
        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/producto/producto-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $alm = new Producto();
        
        $alm->id = $_REQUEST['id'];
        $alm->Nombre_Producto = $_REQUEST['nombre_producto'];
        $alm->Referencia = $_REQUEST['referencia'];
        $alm->Precio = $_REQUEST['precio'];
        $alm->Peso = $_REQUEST['peso'];
        $alm->Stock = $_REQUEST['stock'];
        $alm->Categoria = $_REQUEST['categoria'];

        $alm->id > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }
}