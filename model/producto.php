<?php

class Producto {

    private$pdo;
    
    public $id;
    public $Nombre_Producto;
    public $Referencia;
    public $Precio;
    public $Peso;
    public $Stock;
    public $Categoria;
    public $Fecha_Creacion;
    public $Fecha_Ultima_Venta;

    
    public function __CONSTRUCT() {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar() {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM tbl_productos");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id) {
        try {
            $stm = $this->pdo
                    ->prepare("SELECT * FROM tbl_productos WHERE ID = ?");


            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($id) {
        try {
            $stm = $this->pdo
                    ->prepare("DELETE FROM tbl_productos WHERE ID = ?");

            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar($data) {
        try {
            $sql = "UPDATE tbl_productos SET 
			nombre_producto          = ?, 
			referencia        = ?,
                        precio        = ?,
			peso            = ?, 
                        stock            = ?, 
                        categoria            = ?
			   WHERE ID = ?";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->Nombre_Producto,
                                $data->Referencia,
                                $data->Precio,
                                $data->Peso,
                                $data->Stock,
                                $data->Categoria,
                                $data->id
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ActualizarVenta($data) {
        try {
            $fechaActualA = date('d-m-Y');
            $sql = "UPDATE tbl_productos SET 
				stock        = ?,
				fecha_ultima_venta     = ?					
				    WHERE ID = ?";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->stock,
                                $data->$fechaActualA,
                                $data->id
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(Producto $data) {
        try {
            
            $sql = "INSERT INTO tbl_productos (nombre_producto, referencia, precio, peso, stock, categoria, fecha_creacion) 
		        VALUES (?, ?, ?, ?, ?, ?, '2021-02-26')";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->Nombre_Producto,
                                $data->Referencia,
                                $data->Precio,
                                $data->Peso,
                                $data->Stock,
                                $data->Categoria,
                                
                                
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}
