<?php

include_once($_SERVER["DOCUMENT_ROOT"]."/SIGA/poo/class_cx.php");

class class_usuario_adm_super extends conexionPoo{

	function usuariosAutorizados($id_usuario){

		$pdoConexion=conexionPoo::conexion();
		
		$sql_adm_super="
			SELECT 	Id_Cargo
			FROM 		siga_usuario_cargos
			WHERE 	Id_Usuario=$id_usuario
		";

		$RS_adm_super 	= $pdoConexion->query($sql_adm_super); 
		$RES_adm_super 	= $RS_adm_super->fetchAll(PDO::FETCH_NUM);

		$permisos=array();
		
		foreach($RES_adm_super as $item){
			$permisos[]=$item[0];
		}

		return $permisos;
		$pdoConexion=null;
	}

}
?>