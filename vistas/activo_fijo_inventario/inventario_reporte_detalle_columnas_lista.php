<?php
	// Contador de elementos por escribir
	$contador = 0;
?>
<?php
	if (count($respuestaConsulta) > 0) {
		if($respuestaConsulta[0]->Id_Reporte_Version > 0) {
			// Escribe la lista de los elementos encontrados
			?><div class="tablaAnchoAltoFull">
				<div class="pseudoTR">
					<div class="pseudoTD" style="padding: 0em 0.5em;">
						<h4>Nombre de la vista: <span><?php echo($respuestaConsulta[0]->NombreVersion); ?></span></h4>
					</div>
				</div>
				<div class="pseudoTR">
					<div class="pseudoTD positionRelativoFull" title="Arraste aquí las columnas que se desean visualizar el reporte">
						<div class="pseudoIframe">
							<ul id="lista-columnas-reporte-version-<?php echo($respuestaConsulta[0]->Id_Reporte_Version); ?>" class="lista-droppable h-100"><?php
								for($i = 0; $i < count($respuestaConsulta); $i++) {
									?><li data-id-columna-detalle="<?php echo($respuestaConsulta[$i]->Id_Columna_Detalle); ?>" data-id-columna="<?php echo($respuestaConsulta[$i]->Id_Columna); ?>" <?php if ($respuestaConsulta[$i]->Visible == 0) { echo("class='itemStatic'"); } ?>>
										<span class="sortableItem" data-id-columna-detalle="<?php echo($respuestaConsulta[$i]->Id_Columna_Detalle); ?>" data-id-columna="<?php echo($respuestaConsulta[$i]->Id_Columna); ?>" title="Arrastre hacia arriba o hacia abjo ordenar la columna">
											<span><?php echo($respuestaConsulta[$i]->Orden . " - " . $respuestaConsulta[$i]->Descripcion_Columna); ?></span>
										</span>
										<?php
											if ($respuestaConsulta[$i]->Visible == 0) {
												// Elementos que no pueden eliminarse ni reordenarse
												?><span class="text-center"><i class="fa fa-lock" aria-hidden="true"></i></span><?php
											}
											else {
												// Elementos editables
												?><span class="cursor-pointer" data-id-columna-detalle="<?php echo($respuestaConsulta[$i]->Id_Columna_Detalle); ?>" onclick="mostrarAlertConfirm(() => { eliminarColumnaVersionReporte(this) }, 'Está seguro que desea eliminar la columna seleccionada?');" title="Click para eliminar esta columna"><i class="fa fa-trash"></i></span><?php
											}
										?>
									</li><?php
								} ?>
							</ul>
						</div>
					</div>
				</div>
				<!--
				<div class="pseudoTR">
					<div class="pseudoTD text-center" style="padding: 5px;">
						<button class="btn btn-danger" onclick="mostrarAlertConfirm(() => { eliminarColumnaVersionReporte(this) }, 'Está seguro que desea eliminar la(s) columna(s) seleccionada(s)?');">Eliminar</button>
					</div>
				</div>
				-->
			</div><?php
		}
		else { 
			// No se han encontrado elementos para mostrar
			?><div class="v-wrap">
				<div class="v-box">
					<h4>Ha ocurrido un error en la consulta: <?php echo($respuestaConsulta[0]->Descripcion_Columna); ?></h4>
				</div>
			</div><?php
		}
	}
	else{
		// No se han encontrado elementos para mostrar
		?><div class="v-wrap">
			<div class="v-box">
				<h4>Por el momento no existen columnas agregadas a la vista seleccionada</h4>
			</div>
		</div><?php
	}
?>