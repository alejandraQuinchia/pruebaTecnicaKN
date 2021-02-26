<h1 class="page-header">
    <?php echo $alm->id != null ? $alm->Nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Producto">Productos</a></li>
  <li class="active"><?php echo $alm->id != null ? $alm->Nombre : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-producto" action="?c=Producto&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $alm->id; ?>" />
    
    <div class="form-group">
        <label>Nombre Producto</label>
        <input type="text" name="nombre_producto" value="<?php echo $alm->Nombre_Producto; ?>" class="form-control" placeholder="Ingrese el nombre del producto" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>Referencia</label>
        <input type="text" name="referencia" value="<?php echo $alm->Referencia; ?>" class="form-control" placeholder="Ingrese la referencia" data-validacion-tipo="requerido|min:10" />
    </div>
    
    <div class="form-group">
        <label>Precio</label>
        <input type="text" name="precio" value="<?php echo $alm->Precio; ?>" class="form-control" placeholder="Ingrese el precio del producto" data-validacion-tipo="requerido" />
    </div>
    
    <div class="form-group">
        <label>Peso</label>
        <input type="text" name="peso" value="<?php echo $alm->Peso; ?>" class="form-control" placeholder="Ingrese el peso del producto" data-validacion-tipo="requerido" />
    </div>
    
    <div class="form-group">
        <label>Stock</label>
        <input type="text" name="stock" value="<?php echo $alm->Stock; ?>" class="form-control" placeholder="Ingrese la cantidad de sus productos" data-validacion-tipo="requerido" />
    </div>
    
    <div class="form-group">
        <label>Categoria</label>
        <input type="text" name="categoria" value="<?php echo $alm->Categoria; ?>" class="form-control" placeholder="Ingrese la categoría de sus productos" data-validacion-tipo="requerido" />
    </div>
    
  
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-producto").submit(function(){
            return $(this).validate();
        });
    })
</script>