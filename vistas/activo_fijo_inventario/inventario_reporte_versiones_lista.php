<?php
	// Contador de elementos por escribir
	$contador = 0;

	if (count($respuestaConsulta) > 0) {
		if($respuestaConsulta[0]->Id_Reporte_Version > 0) {
			// Escribe la lista de los elementos encontrados
			?><ul class="lista-basica-admin-edicion"><?php
				for($i = 0; $i < count($respuestaConsulta); $i++) {
					?><li <?php if($respuestaConsulta[$i]->Aplica == 1) { echo('title="Vista publicada"'); } ?>>
						<span><?php if($respuestaConsulta[$i]->Aplica == 1) { echo('<i class="fa fa-star" aria-hidden="true" title="Vista publicada"></i>'); } ?></span>
						<span class="w-100" id="IdReporteVersion_<?php echo($respuestaConsulta[$i]->Id_Reporte_Version); ?>" data-version-aplica="<?php echo($respuestaConsulta[$i]->Aplica); ?>" data-id-reporte-version="<?php echo($respuestaConsulta[$i]->Id_Reporte_Version); ?>" onclick="mostrarDetalleVersion(this);"><?php echo($respuestaConsulta[$i]->NombreVersion); ?></span>
						<span style="white-space: nowrap;">
							<i class="fa fa-pencil-square" data-nombre-tabla="<?php echo($respuestaConsulta[$i]->NombreTabla); ?>" data-id-reporte-version="<?php echo($respuestaConsulta[$i]->Id_Reporte_Version); ?>" onclick="agregarModificarVersionReporte(this);" title="Click para editar esta vista"></i>
							&nbsp;|&nbsp;
							<i class="fa fa-trash" data-id-reporte-version="<?php echo($respuestaConsulta[$i]->Id_Reporte_Version); ?>" onclick="mostrarAlertConfirm(() => { eliminarVersionReporte(this); }, 'Está seguro que desea eliminar la vista seleccionada?');" title="Click para eliminar esta vista"></i>
						</span>
					</li><?php
				}
			?></ul><?php
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
				<h4>Por el momento no existen vistas generadas para el reporte seleccionado</h4>
			</div>
		</div><?php
	}
?>