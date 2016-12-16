<form id="form" method="post" action="<?=$url?>">
		<p class="pais">
		Pais: 
			<?php if ($hayPais) : ?>
				<input type="text" name="pais" value="<?=$_POST["pais"]?>" />
			<?php else: ?>
		<select name="pais" id="pais">
			<option value="-1">Selecciona un pais</code>
			<option value="ES">España</code>
			<option value="FR">Francia</code>	
		</select>
		<?php endif;?>
		</p>
		<p class="destino">
			<?php if ($hayPais) {
				echo "Destino: ";
				include("destino.php"); 
			} else { ?>
				<noscript>
					<input type="submit" value="Buscar Destinos" />
				</noscript>
			<?php }	?>
		</p>
		<p class="submit">
			<input type="submit" value="Enviar" />
		</p>
	</form>