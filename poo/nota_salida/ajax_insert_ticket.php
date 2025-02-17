<?php
if(isset($_POST['nota_salida_id_solicitd']) && $_POST['nota_salida_id_solicitd'] !==''){

include_once(dirname(__FILE__)."/../cx.php");

$nota_salida_id_solicitd  =$_POST['nota_salida_id_solicitd'];

$SQL_num_ticket="
	SELECT Id_Solicitud_DNS FROM siga_det_nota_salida WHERE Id_Nota_Salida_DNS = $nota_salida_id_solicitd 
";

$SQL_num_ticket = $pdoConexion->query($SQL_num_ticket);
$num_ticket 		= $SQL_num_ticket->fetch(PDO::FETCH_NUM);
$num_ticket 		= $num_ticket[0];


$datos_ticket = "
	SELECT 
			Asist_Especial,
			id_usuario,
			Id_Medio,
			Seccion,
			Titulo,
			Desc_Motivo_Reporte,
			Prioridad,
			Id_Activo,
			Id_Gestor,
			ComentarioCierreGestor,
			Id_Categoria,
			Id_Subcategoria,
			Id_Motivo_Aparente,
			Id_Motivo_Real			
	FROM 	siga_solicitud_tickets
	WHERE Id_Solicitud=$num_ticket
	";

	$datos_ticket_qry=$pdoConexion->query($datos_ticket);
	$datos_ticket_res=$datos_ticket_qry->fetch(PDO::FETCH_NUM);

	$Asist_Especial				=$datos_ticket_res[0];
	$Id_Usuario_Inicial		=$datos_ticket_res[1];
	$Id_Medio							=$datos_ticket_res[2];
	$Seccion							=$datos_ticket_res[3];
	$Titulo								=$datos_ticket_res[4];
	$Desc_Motivo_Reporte	=$datos_ticket_res[5];
	$Prioridad						=$datos_ticket_res[6];
	$Id_Activo						=$datos_ticket_res[7];
	$Id_Gestor						=$datos_ticket_res[8];
	$ComentarioCierreGestor =$datos_ticket_res[9];
	$Id_Categoria					=$datos_ticket_res[10];
	$Id_Subcategoria			=$datos_ticket_res[11];
	$Id_Motivo_Aparente		=$datos_ticket_res[12];
	$Id_Motivo_Real				=$datos_ticket_res[13];

$datos_nota_salida="
	SELECT  Id_Nota_Salida,
	        Id_Usr_Quien_Autoriza,
	        Id_Area_Realiza,
	        Url_Adjuntos,
	        Id_Usr_Realiza_Nota,
	        (SELECT TOP 1 Id_Activo_DNS FROM siga_det_nota_salida WHERE Id_Nota_Salida_DNS=ns.Id_Nota_Salida ORDER BY Id_Accesorio_DNS DESC) Id_Activo_DNS,
	        Fech_Realiza_Nota,
	        Fech_Autoriza,
	        Fech_Firma_Recibe,
	        (SELECT TOP 1 Descripcion_DNS FROM siga_det_nota_salida WHERE Id_Nota_Salida_DNS=ns.Id_Nota_Salida ORDER BY Id_Accesorio_DNS DESC) Descripcion_DNS,
	        (SELECT TOP 1 Marca_DNS FROM siga_det_nota_salida WHERE Id_Nota_Salida_DNS=ns.Id_Nota_Salida ORDER BY Id_Accesorio_DNS DESC) Marca_DNS,
	        (SELECT TOP 1 Modelo_DNS FROM siga_det_nota_salida WHERE Id_Nota_Salida_DNS=ns.Id_Nota_Salida ORDER BY Id_Accesorio_DNS DESC) Modelo_DNS,
	        (SELECT TOP 1 No_Serie_DNS FROM siga_det_nota_salida WHERE Id_Nota_Salida_DNS=ns.Id_Nota_Salida ORDER BY Id_Accesorio_DNS DESC) No_Serie_DNS,
	        Empresa_Recibe,
	        Nombre_Contacto,
	        Telefono_Contacto,
	        Mail_Contacto,
	        (SELECT Desc_Motivo_Alta FROM siga_cat_motivo_salida WHERE Id_Motivo_Salida=ns.Id_Motivo_Salida) Id_Motivo_Salida,
	        Id_Ubic_Prim,
	        Id_Ubic_Sec
	FROM siga_nota_salida ns (NOLOCK)
	WHERE ns.Id_Nota_Salida= (SELECT TOP 1 Id_Nota_Salida_DNS FROM 	siga_det_nota_salida (NOLOCK)
	WHERE 	Id_Solicitud_DNS= $nota_salida_id_solicitd
	GROUP BY Id_Nota_Salida_DNS
	ORDER BY Id_Nota_Salida_DNS desc)
	";

	$datos_nota_salida_qry  = $pdoConexion->query($datos_nota_salida);
	$datos_nota_salida_res  = $datos_nota_salida_qry->fetch(PDO::FETCH_NUM);

	$Id_Nota_Salida			    = $datos_nota_salida_res[0];
	$Id_Usr_Quien_Autoriza	= $datos_nota_salida_res[1];
	$Id_Area_Realiza		    = $datos_nota_salida_res[2];
	$Url_Adjuntos			      = $datos_nota_salida_res[3];
	$Id_Usr_Realiza_Nota	  = $datos_nota_salida_res[4];
	$Id_Activo_DNS			    = $datos_nota_salida_res[5];
	$Fech_Realiza_Nota		  = $datos_nota_salida_res[6];
	$Fech_Autoriza			    = $datos_nota_salida_res[7];
	$Fech_Firma_Recibe		  = $datos_nota_salida_res[8];
	$Descripcion_DNS		    = $datos_nota_salida_res[9];
	$Marca_DNS				      = $datos_nota_salida_res[10];
	$Modelo_DNS				      = $datos_nota_salida_res[11];
	$No_Serie_DNS			      = $datos_nota_salida_res[12];
	$Empresa_Recibe			    = $datos_nota_salida_res[13];
	$Nombre_Contacto		    = $datos_nota_salida_res[14];
	$Telefono_Contacto		  = $datos_nota_salida_res[15];
	$Mail_Contacto			    = $datos_nota_salida_res[16];
	$Id_Motivo_Salida		    = $datos_nota_salida_res[17];
	$Id_Ubic_Prim			      = $datos_nota_salida_res[18];
	$Id_Ubic_Sec			      = $datos_nota_salida_res[19];

	$Fech_Realiza_Nota		  = date('Y-m-d H:m:s', strtotime($Fech_Realiza_Nota));
	$Fech_Autoriza			    = date('Y-m-d H:m:s', strtotime($Fech_Autoriza));
	$Fech_Firma_Recibe		  = date('Y-m-d H:m:s', strtotime($Fech_Firma_Recibe));

  $sql_nota_salida_detalle="
    SELECT  Cantidad_DNS,
            Unidad_DNS,
            Marca_DNS,
            Modelo_DNS,
            Descripcion_DNS,
            No_Serie_DNS
    FROM 	  siga_det_nota_salida
    WHERE 	Id_Nota_Salida_DNS=$nota_salida_id_solicitd
    AND 	  Estatus_Reg_DNS <> 3
	";
	$nota_salida_detalle=$pdoConexion->query($sql_nota_salida_detalle);
	$nota_salida_detalle_r= $nota_salida_detalle->fetchAll(PDO::FETCH_NUM);
	
	$array_nota_salida_detalle=array('Se realiza nota de salida: '.$Id_Nota_Salida.' para equipo/material siguiente por: '.$Id_Motivo_Salida);
	
	foreach ($nota_salida_detalle_r as $value) {
		$array_nota_salida_detalle[]=" Cantidad:".$value[0]." Unidad: ".utf8_decode($value[1])." Marca:".utf8_decode($value[2])." Modelo:".utf8_decode($value[3])." Descripción".utf8_decode($value[4])." Serie:".utf8_decode($value[5])."  /  ";
	}

  $comentariosCierreImplode = implode(",",$array_nota_salida_detalle);
	$comentariosCierre        = substr($comentariosCierreImplode,0,990);

	if(is_null($Id_Activo_DNS)){
		$Id_Activo_DNS=1;
	}else{
    $Id_Activo_DNS=0;
  }

	$nota_salida_generar_ticket="
	INSERT INTO siga_solicitud_tickets (Id_Solicitud_Anterior,Asist_Especial,Id_Usuario_Inicial,Id_Usuario,Id_Area,Id_Medio,Titulo,Desc_Motivo_Reporte,Prioridad,Url_archivo,Fech_Inser,Usr_Inser,Estatus_Reg,Estatus_Proceso,Id_Activo,Id_Categoria,Id_Subcategoria,Id_Gestor,ComentarioCierre,ComentarioCierreGestor,Id_Motivo_Aparente,Id_Motivo_Real,Id_Est_Equipo,Fech_Solicitud,Fech_Seguimiento,Fech_Espera_Cierre,Fech_Cierre,Gestor_Final_Cierre,Activo_Externo,Nombre_Act_Ext,Marca_Act_Ext,Modelo_Act_Ext,No_Serie_Act_Ext,Empresa_Ext,Nombre_Completo_Ext,Telefono_Ext,Correo_Ext,Id_Ubic_Prim,Id_Ubic_Sec,Seccion)
	VALUES  ($nota_salida_id_solicitd,$Asist_Especial,$Id_Usuario_Inicial,$Id_Usr_Quien_Autoriza,$Id_Area_Realiza,2,'$Titulo','$Desc_Motivo_Reporte',$Prioridad,'$Url_Adjuntos',getdate(),$Id_Usr_Realiza_Nota,1,4,$Id_Activo_DNS,$Id_Categoria,$Id_Subcategoria,$Id_Usr_Realiza_Nota,'$comentariosCierre','$ComentarioCierreGestor',$Id_Motivo_Aparente,$Id_Motivo_Real,1,'$Fech_Realiza_Nota','$Fech_Autoriza','$Fech_Firma_Recibe',getdate(),$Id_Usr_Realiza_Nota,$Id_Activo_DNS,'$Descripcion_DNS','$Marca_DNS','$Modelo_DNS','$No_Serie_DNS','$Empresa_Recibe','$Nombre_Contacto','$Telefono_Contacto','$Mail_Contacto',$Id_Ubic_Prim,$Id_Ubic_Sec,1)";
	$pdoConexion->query($nota_salida_generar_ticket);
	// $Id_Ticket = $pdoConexion->lastInsertId();
	$pdoConexion=null;
			echo json_encode('OK');
    }else{
        echo json_encode('Sin datos');
    }
?>