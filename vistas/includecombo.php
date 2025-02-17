	carga<?php echo $nombrefuncion?>();
	function carga<?php echo $nombrefuncion?>() {
		var resultado=new Array();
		data={orden:'<?php echo $desc?>',accion: "consultar"<?php echo $Filtro ?>};
		resultado=cargo_cmb("../fachadas/activos/<?php echo $tabla?>/<?php echo $tabla?>Facade.Class.php",false, data);

		if(resultado.totalCount>0){
			$('#cmb<?php echo $nombrefuncion?>').append($('<option>', { value: "-1" }).text("--<?php echo $nombre?>--"));
			for(var i = 0; i < resultado.totalCount; i++)
			{
				if (resultado.data[i].<?php echo $id?> != '<?php echo $excepto?>') 			
				$('#cmb<?php echo $nombrefuncion?>').append($('<option>', { value: resultado.data[i].<?php echo $id?> }).text(resultado.data[i].<?php echo $desc?>));
			}
		}else{
			$('#cmb<?php echo $nombrefuncion?>').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}