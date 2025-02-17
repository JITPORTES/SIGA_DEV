<?php
	function fecha_ddmmyyyy($F){
		$Fecha="";
		if($F!=""&&$F!=null&&$F!="undefined"&&$F!="NULL"&&$F[1]!=""){
			$Fecha=$F[6].''.$F[7].'/'.$F[4].''.$F[5].'/'.$F[0].''.$F[1].''.$F[2].''.$F[3];
		}
		return $Fecha;
	}

	$style_td = "color: white; background: #969191; font-weight: bold;";
?>


<style type="text/css">
	<!--
	/* Estilos originales */
	#encabezado { padding:2px 0; border-top: 0px solid; border-bottom: 1px solid; width: 100%; }
	#encabezado .fila #col_1 { width: 24%; }
	#encabezado .fila #col_2 { text-align: center; width: 55%; font-size: 12px; font-family: Arial; }
	#encabezado .fila #col_3 { width: 21%; }
	
	#encabezado .fila #col_6 { width: 15%; }
	#encabezado .fila #col_5 { width: 70%; font-size: 12px; font-family: Arial; }
	#encabezado .fila #col_7 { width: 15%; }
	
	#footer { padding-top: 5px 0; border-top: 1px solid; width: 100%; }
		#footer .fila td { text-align: left; width: 50%; }
		#footer .fila td span { font-size: 10px; }
		#footer .fila td div { font-size: 10px;text-align: right; }
	
	#tbl { width: 100%; }
	.text-center { text-align: center; }

	body { font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif; font-weight: 400; overflow-x: hidden; overflow-y: auto; }
		#tbl .thead #tr .td{ text-align:center; background:#19294a; color:#fff; }
		#tbl .tbody #tr .td{ border:0.5px solid #ccc; font-size:11px; padding: 4px; }
		#tbl .tbody #tr .comentarios{ border:0.5px solid #ccc; font-size:11px; padding: 4px; height:60px; }
		#tbl .tbody #tr.photo{ background:#f4f4f4; color:#666; text-align:center; }
		#tbl .tbody tr.adjuntos td{ padding:1em 0; }
		#tbl .tbody tr td.check img{ width: 15px; height: 15px; margin: 0 auto; display: block; }
		#tbl .tbody #tr .sign { vertical-align: top; height: 6em; text-align: center; }
		#tbl .tbody #tr .td .sign .comments { text-align: left; }
		#tbl .tbody #tr .td .author { vertical-align: middle; text-align:center; }
		#tbl .tbody #tr.faces .td { }
		#tbl .tbody #tr.faces .td img{ margin: 0 auto; display: block; width: 40px; vertical-align: middle; }
	
	.foto { border:0px solid; height: 150px; width: 160px; text-align: center; }
	.fotochs { border:0px solid; height: 160px; width: 160px; text-align: center; }
	.recuadro { border: 1px solid; padding: 5px 0; margin: 5px 0; text-align: center; }
	
	/* Comentarios calificacion */
	#tbl .tbody #tr .comen{ border:0.5px solid #ccc; font-size:11px; padding: 4px; }




	/* Hoja de estilos normalizados */
	.div-footer { border-top: #CCC solid 1px; }
	.footer { padding-top: 5px 0; width:100%; }
		.footer .fila td { text-align:left; width:50%; font-size: 10px; }
		.footer .fila td div { text-align: right }
	
	.text-left { text-align: left; }
	.text-right { text-align: right; }

	.tbl-encabezado { width: 100%; border-bottom: #CCC solid 1px; }
		.tbl-encabezado tr:first-child { text-align: left; border: red solid 1px; }
		.tbl-encabezado td { text-align: center; vertical-align: middle; }
		.tbl-encabezado td img { height: 80px; }

	.tbl-contenedor { width: 100%; }
		.tbl-contenedor .thead th, .tbl-contenedor .tbody .th { border-top: 0px solid #ddd; line-height: 1.42857143; padding: 8px; vertical-align: top; font-size:13px; text-align:center; background:#19294a; color:#fff; }
		.tbl-contenedor .tbody .td { border:0.5px solid #ccc; font-size:11px; padding: 4px; vertical-align: top; }
		.tbl-contenedor .tbody tr.photo { background:#f4f4f4; color:#666; text-align:center; }
		.tbl-contenedor .tbody tr.adjuntos td { padding:1em 0; }
		.tbl-contenedor .tbody td.check img { width:15px; height:15px; margin:0 auto; display:block; }
		.tbl-contenedor .tbody .sign { vertical-align:top; height:6em; text-align:center; }
		.tbl-contenedor .tbody .td .sign .comments{ text-align:left; }
		.tbl-contenedor .tbody .td .author { vertical-align: middle; text-align:center; }
		.tbl-contenedor .tbody .td-calificacion { text-align: center; width: 20%; border:0.5px solid #ccc; padding: 4px; }
		.tbl-contenedor .tbody tr.faces .td img { margin:0 auto; display:block; width:40px; vertical-align:middle; }
		.tbl-contenedor .tbody .comentarios { text-align: justify; border:0.5px solid #ccc; font-size:11px; padding: 4px; vertical-align: top; }
		.tbl-contenedor .tbody .td-imagen-adjunto { width: 50%; text-align: center; background: #f4f4f4; padding: 4px; font-size: 11px; border:0.5px solid #ccc; }
	-->
</style>