<h1 class="page-header">Productos</h1>

<div class="row">
<?php foreach($this->productos->ListarProductos() as $r): ?>

  <div class="col-xl-3 col-lg-4 col-md-2 col-sm-12 col-sm-12"  >
  <br>
  <div class="card" style="width: 18rem;">  
  <div class="card-body">

  <h5 class="card-title"><?php echo $r->nombre_producto; ?></h5>
  <h6 class="card-subtitle mb-2 text-muted"><?php echo $r->id_categoria; ?></h6>
    
    <table class="table  ">
    <tbody>    

        <tr>
            <td><?php echo $r->descripcion_producto; ?></td>		
        </tr>
        <tr>
            <td><img src="<?php echo $r->ruta_foto;?>" alt="" /></td>
        </tr>
        <tr>
			<td>Votos: <?php echo $r->num_votos; ?> | Puntos: <?php echo $r->puntos_total; ?> | Media: <?php echo $r->puntos_media; ?></td>
        </tr>
        <tr>
            <td>
                <a href="?c=Web&a=ValorarProducto&id_producto=<?php echo $r->id_producto; ?>">Valorar</a>
            </td>
        </tr>   
        </tbody>
    </table>
    </div> 
    </div> 
</div> 

<?php endforeach; ?>

</div>  
