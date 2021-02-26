<h1 class="page-header">Productos</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Producto&a=Crud">Nuevo Producto</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Nombre Producto</th>
            <th>Referencia</th>
            <th>Precio</th>
            <th style="width:120px;">Peso</th>
            <th style="width:120px;">Stock</th>
            <th style="width:120px;">Fecha creación</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->nombre_producto; ?></td>
            <td><?php echo $r->referencia; ?></td>
            <td><?php echo $r->precio; ?></td>
            <td><?php echo $r->peso; ?></td>
            <td><?php echo $r->stock; ?></td>
            <td><?php echo $r->fecha_creacion; ?></td>
            <td>
                <a href="?c=Producto&a=Crud&id=<?php echo $r->ID; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Producto&a=Eliminar&id=<?php echo $r->ID; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
