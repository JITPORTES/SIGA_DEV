<?php
if(class_exists('Database') != true)
include("database.php");

class SIGA 
{
	
	function creaVariable($nombre,$default,$nombrePOST)
    {
	  if (isset($_SESSION[$nombre]))
	   $valor = $_SESSION[$nombre];
	  else
	   $valor = $default;

	  if (isset($_POST[$nombrePOST]))
	  $valor = $_POST[$nombrePOST];
	  
	  $_SESSION[$nombre] = $valor;

	  return $_SESSION[$nombre];
	
	}
	
	function limpiaSesion()
	{
	 session_unset();
	}
		

	
	public function insertaPregunta($CveCampana,$CveAsistencia,$CveServicio,
		$Descripcion,$Activo,$Orden,$CveTipo,$EsNPS,$EsApp,$Ocultar,$EsSatisfecho,$CveTipoNPS)
	{
	   $db =  new Database();
	   $db_connect = $db->connect();

	   $query_rs = "insert into Pregunta(CvePregunta,CveAsistencia,CveTipo,Descripcion,
	   CveServicio,Orden,Ocultar,EsApp,EsNPS,Activo,
	   CveCampana,FechaAlta,EsSatisfecho,CveTipoNPS) 
	   values((select max(A.CvePregunta)+1 from Pregunta A),".$CveAsistencia.",".$CveTipo.",'".
	   $Descripcion."','".$CveServicio."',".$Orden.",".$Ocultar.",".$EsApp.",".$EsNPS.",".
	   $Activo.",".$CveCampana.",now(),".$EsSatisfecho.",".$CveTipoNPS.")";
	   sqlsrv_query($db_connect,$query_rs);
	   //echo $query_rs."<br>";
	   $db->disconnect($db_connect);
	}
	
	public function actualizaPregunta($CveCampana,$CveAsistencia,$CveServicio,$CvePregunta,
		$Descripcion,$Activo,$Orden,$CveTipo,$EsNPS,$EsApp,$Ocultar,$EsSatisfecho,$CveTipoNPS)
	{
	   $db =  new Database();
	   $db_connect = $db->connect();

	   $query_rs = "update Pregunta set CveCampana=".$CveCampana.",CveAsistencia=".$CveAsistencia.",
	   CveServicio='".$CveServicio."',Descripcion='".$Descripcion."',CveTipo=".$CveTipo.",
	   Orden=".$Orden.",Ocultar=".$Ocultar.",Activo=".$Activo.",FechaActualiza=now(),
	   EsApp=".$EsApp.",EsNPS=".$EsNPS.",EsSatisfecho=".$EsSatisfecho.",CveTipoNPS=".$CveTipoNPS."
	   where CvePregunta=".$CvePregunta;
	   sqlsrv_query($db_connect,$query_rs);
	   //echo $query_rs."<br>";
	   $db->disconnect($db_connect);
	}
	public function eliminaPregunta($CvePregunta)
	{
	   $db =  new Database();
	   $db_connect = $db->connect();

	   $query_rs = "delete from Pregunta where CvePregunta=".$CvePregunta;
	   sqlsrv_query($db_connect,$query_rs);
	   //echo $query_rs."<br>";
	   $db->disconnect($db_connect);
	}


	public function obtenCatalogo($id=-1,$Tabla,$indice,$orden="descripcion",$excepto="")
	{
	
	   $db =  new Database();
	   $db_connect = $db->connect();
				
	   $query_rs = " select * from $Tabla where 0=0 ";
	   if ($id != -1)
	   $query_rs .= " and $indice='".$id."'"; 
   
       if ($excepto != "")
	   $query_rs .= " and $indice not in(".$excepto.")"; 
	   
	   $query_rs .= " order by $orden";
	   //echo $query_rs;
	   $result = sqlsrv_query($db_connect,$query_rs);
		
		if( $result === false ) 
		{
			if( ($errors = sqlsrv_errors() ) != null) {
				foreach( $errors as $error ) {
					echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
					echo "code: ".$error[ 'code']."<br />";
					echo "message: ".$error[ 'message']."<br />";
					echo "query: ".$query_rs."<br /><br>";
				}
			}
		}
		
		
		$rows = array();
		while( $row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC))
		{
			$rows[] = $row;
		}
		
		sqlsrv_free_stmt($result);
		$db->disconnect($db_connect);
		
		return $rows;
	 
	}
	
   function obtenLineaRecta($AF_BC,$AnioFiltro="",$Formula=1,$MesFiltro=12)
   {
	   $db =  new Database();
	   $db_connect = $db->connect();
				
	   /*$query_rs = "exec spLineaRecta @AF_BC='".$AF_BC."'";
	   if (strlen($AnioFiltro) > 0)
	   $query_rs .= ",@AnioFiltro=".$AnioFiltro;  */
       //$query_rs = "select * from spLineaRectaFn('".$AF_BC."','".$Formula."') where 0=0 ";
	   
	   $query_rs = "select * from spFiscalD4FnMensual('".$AF_BC."','".$Tipo."') where 0=0 ";
	   
	   if (strlen($AnioFiltro) > 0)
	   $query_rs .= " and Anio=".$AnioFiltro;
   
   
       if ($MesFiltro > 0)
	   $query_rs .= " and mescalculo=".$MesFiltro;   
	   //echo $query_rs;
	   $result = sqlsrv_query($db_connect,$query_rs);
	   
		
		if( $result === false ) 
		{
			if( ($errors = sqlsrv_errors() ) != null) {
				foreach( $errors as $error ) {
					echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
					echo "code: ".$error[ 'code']."<br />";
					echo "message: ".$error[ 'message']."<br />";
					echo "query: ".$query_rs."<br /><br>";
				}
			}
		}
		
		
		$rows = array();
		while( $row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC))
		{
			$rows[] = $row;
		}
		
		sqlsrv_free_stmt($result);
		$db->disconnect($db_connect);
		
		return $rows;
	}
	
	function obtenFiscal($AF_BC,$AnioFiltro="")
    {
	   $db =  new Database();
	   $db_connect = $db->connect();
				
	   /*$query_rs = "exec spLineaRecta @AF_BC='".$AF_BC."'";
	   if (strlen($AnioFiltro) > 0)
	   $query_rs .= ",@AnioFiltro=".$AnioFiltro;  */
       $query_rs = "select * from spFiscalFn('".$AF_BC."') where 0=0 ";
	   if (strlen($AnioFiltro) > 0)
	   $query_rs .= " and Anio=".$AnioFiltro;
	   //echo $query_rs;
	   $result = sqlsrv_query($db_connect,$query_rs);
	   
		
		if( $result === false ) 
		{
			if( ($errors = sqlsrv_errors() ) != null) {
				foreach( $errors as $error ) {
					echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
					echo "code: ".$error[ 'code']."<br />";
					echo "message: ".$error[ 'message']."<br />";
					echo "query: ".$query_rs."<br /><br>";
				}
			}
		}
		
		
		$rows = array();
		while( $row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC))
		{
			$rows[] = $row;
		}
		
		sqlsrv_free_stmt($result);
		$db->disconnect($db_connect);
		
		return $rows;
	}
	
	function obtenFiscalD4($AF_BC,$AnioFiltro="",$Tipo="",$Anual=0,$MesFiltro="")
    {
	   $db =  new Database();
	   $db_connect = $db->connect();
				
	   /*$query_rs = "exec spLineaRecta @AF_BC='".$AF_BC."'";
	   if (strlen($AnioFiltro) > 0)
	   $query_rs .= ",@AnioFiltro=".$AnioFiltro;  */
       
	   if ($Anual==0)
       $query_rs = "select * from spFiscalD4Fn('".$AF_BC."','".$Tipo."') where 0=0 ";
	   else
       $query_rs = "select * from spFiscalD4FnMensual('".$AF_BC."','".$Tipo."') where 0=0 ";
   
	   if (strlen($AnioFiltro) > 0)
	   $query_rs .= " and Anio=".$AnioFiltro;
   
	   if ($Anual==1)
	   {
       if (strlen($MesFiltro) > 0)
	   $query_rs .= " and mescalculo=".$MesFiltro;
	   }
	   //echo $query_rs;
	   $result = sqlsrv_query($db_connect,$query_rs);
	   
		
		if( $result === false ) 
		{
			if( ($errors = sqlsrv_errors() ) != null) {
				foreach( $errors as $error ) {
					echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
					echo "code: ".$error[ 'code']."<br />";
					echo "message: ".$error[ 'message']."<br />";
					echo "query: ".$query_rs."<br /><br>";
				}
			}
		}
		
		
		$rows = array();
		while( $row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC))
		{
			$rows[] = $row;
		}
		
		sqlsrv_free_stmt($result);
		$db->disconnect($db_connect);
		
		return $rows;
	}
	
	
	function obtenActivosContables($AF_BC="",$AnioFiltro="")
    {
	   $db =  new Database();
	   $db_connect = $db->connect();
				

       $query_rs = "select Id_Activo,AF_BC from siga_activos where 0=0 and Id_Activo in (select Id_Activo from siga_activos_contabilidad where rtrim(ltrim(Fecha_Inicio_Depr)) <>''";
	   
	
   	   if (strlen($AnioFiltro) > 0)
	   $query_rs .= " and year(Fecha_Inicio_Depr)<=".$AnioFiltro;
   
       $query_rs .= " ) ";


	   if (strlen($AF_BC) > 0)
	   $query_rs .= " order by AF_BC";
   

	   
	   //echo $query_rs;
	   $result = sqlsrv_query($db_connect,$query_rs);
	   
		
		if( $result === false ) 
		{
			if( ($errors = sqlsrv_errors() ) != null) {
				foreach( $errors as $error ) {
					echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
					echo "code: ".$error[ 'code']."<br />";
					echo "message: ".$error[ 'message']."<br />";
					echo "query: ".$query_rs."<br /><br>";
				}
			}
		}
		
		
		$rows = array();
		while( $row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC))
		{
			$rows[] = $row;
		}
		
		sqlsrv_free_stmt($result);
		$db->disconnect($db_connect);
		
		return $rows;
	}

}	
?>
