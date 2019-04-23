

<table class="table table-striped">

    <thead>
        <tr>
            <th>Categoria</th>
			<th>Producto</th>
            <th>Descripcion</th>
            <th style="width:120px;">Imagen</th>
            <th style="width:120px;">Número de votos</th>
			<th style="width:120px;">Puntuación total</th>
			<th style="width:120px;">Puntuación media</th>
        </tr>
    </thead>
    <tbody>


        <tr>
            <td><?php echo $prodsel->id_categoria; ?></td>
            <td><?php echo $prodsel->nombre_producto; ?></td>
            <td><?php echo $prodsel->descripcion_producto; ?></td>		
            <td><img src="<?php echo $prodsel->ruta_foto;?>" alt="" /></td>
			<td><?php echo $prodsel->num_votos; ?></td>
			<td><?php echo $prodsel->puntos_total; ?></td>
			<td><?php echo $prodsel->puntos_media; ?></td>
            <td>
                <!--<a href="?c=Web&a=ValorarProducto&id=">Valorar</a>-->
                <form id="frm-valoracion" action="?c=Web&a=Votar&id_producto=<?php echo $prodsel->id_producto; ?>" method="post" enctype="multipart/form-data">
                <input id="radio1" type="radio" name="estrellas" value="5"><!--
                --><label for="radio1">★</label><!--
                --><input id="radio2" type="radio" name="estrellas" value="4"><!--
                --><label for="radio2">★</label><!--
                --><input id="radio3" type="radio" name="estrellas" value="3"><!--
                --><label for="radio3">★</label><!--
                --><input id="radio4" type="radio" name="estrellas" value="2"><!--
                --><label for="radio4">★</label><!--
                --><input id="radio5" type="radio" name="estrellas" value="1"><!--
                --><label for="radio5">★</label>
                </br>
                <input type="text" name="valoracion_escrita">
                </br>
                <div class="text-right">
                    <button class="btn btn-success">Valorar</button>
                </div>
                
                    
                </form>
            </td>
            
        </tr>

    </tbody>
</table> 
