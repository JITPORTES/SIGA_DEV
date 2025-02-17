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
		
    function rutaSistema()
	{
		$ruta = "SIGA";
		return $ruta;
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
	
	public function actualizaCuentasContables($Id_Activo,$CuentaActivo,$CuentaActivoB10,$Cuent_Cont_Dep,$CuentaDepreciacionB10,$CuentaResultados,$CuentaResultadosB10,$CuentaBaja,$Id_Cuentas,$VidaUtilFiscal,$FechaFiscal,$MontoFiscal,$CuentaRexBaja,$MOIAntesCambio,$FechaInicioFiscal)
	{
	   $db =  new Database();
	   $db_connect = $db->connect();
	   
	   $MontoFiscal = str_ireplace(",","",$MontoFiscal);
	   $MOIAntesCambio = str_ireplace(",","",$MOIAntesCambio);

	   if ($Id_Cuentas== "")
	   $Id_Cuentas = "null";	   
	   $query_rs = "update siga_activos_contabilidad set Cuent_Cont_Act='".$CuentaActivo."',Cuent_Cont_Act_B10='".$CuentaActivoB10."',
	   Cuent_Cont_Result='".$CuentaResultados."',Cuent_Cont_Result_B10='".$CuentaResultadosB10."',Cuent_Cont_Dep='".$Cuent_Cont_Dep."',
	   Cuent_Cont_Dep_B10='".$CuentaDepreciacionB10."',Cuent_Cont_Baja='".$CuentaBaja."',Id_Cuentas=".$Id_Cuentas.",VidaUtilFiscal=".$VidaUtilFiscal.",FechaFiscal='".$FechaFiscal."',MontoFiscal=".$MontoFiscal.",CuentaRexBaja='".$CuentaRexBaja."'
       ,MOIAntesCambio='".$MOIAntesCambio."',FechaInicioFiscal='".$FechaInicioFiscal."'	   
	    where Id_Activo=".$Id_Activo;
	   sqlsrv_query($db_connect,$query_rs);
	   //echo $query_rs."<br>";
	   $db->disconnect($db_connect);
	}
	
	
	public function calculaDepreciacion($Id_Activo)
	{
	   $db =  new Database();
	   $db_connect = $db->connect();
	   
	   $MontoFiscal = str_ireplace(",","",$MontoFiscal);
	   $MOIAntesCambio = str_ireplace(",","",$MOIAntesCambio);

	
	   $query_rs = "update siga_activos_contabilidad set Cuent_Cont_Act 	   
	    where Id_Activo=".$Id_Activo;
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


	public function obtenCatalogo($id=-1,$Tabla,$indice,$orden="descripcion",$excepto="",$and="")
	{
	
	   $db =  new Database();
	   $db_connect = $db->connect();
				
	   $query_rs = "SELECT * 
	   				FROM $Tabla 
	   				WHERE 0=0 ";
	   if ($id != -1)
	   $query_rs .= " and $indice='".$id."'"; 
   
       if ($excepto != "")
	   $query_rs .= " and $indice not in(".$excepto.")"; 
   
       if ($and != "")
	   $query_rs .= $and;
	   
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

	   $query_rs .= " order by Anio,MesActual ";
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
	
	function obtenFiscalD4($AF_BC,$AnioFiltro="",$Tipo="",$Anual=0,$MesFiltro="",$EsFiscal=0,$INPCPeriodo=2018)
    {
	   $db =  new Database();
	   $db_connect = $db->connect();
				
	   /*$query_rs = "exec spLineaRecta @AF_BC='".$AF_BC."'";
	   if (strlen($AnioFiltro) > 0)
	   $query_rs .= ",@AnioFiltro=".$AnioFiltro;  */
       
	   if ($Anual==0)
       $query_rs = "select * from spFiscalD4Fn('".$AF_BC."','".$Tipo."') where 0=0 ";
	   else
	   {
	    $query_rs = "select * from CierreMes where AF_BC='".$AF_BC."'";
		$query_rs .= " and TipoDepreciacion=".$EsFiscal;
	   }
       //$query_rs = "select * from spFiscalD4FnMensual('".$AF_BC."','".$Tipo."',".$EsFiscal.",'".$INPCPeriodo."') where 0=0 ";
   
	   if (strlen($AnioFiltro) > 0)
	   $query_rs .= " and Anio=".$AnioFiltro;
   
	   //if ($Anual==1)
	   //{
       if (strlen($MesFiltro) > 0)
	   $query_rs .= " and mescalculo=".$MesFiltro;
	   //}
	   
	   $query_rs .= " order by Anio,MesActual ";
	   //echo $query_rs;
	   //die();
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
	
	function obtenPolizaMensual($AF_BC,$AnioFiltro="",$MesFiltro="",$Agrupacion=2,$INPCPeriodo=2018)
    {
	   $db =  new Database();
	   $db_connect = $db->connect();
				
		if ($Agrupacion==2)		
	    $query_rs = "select * from (";
	    if ($Agrupacion==1)
		$query_rs = "select Cuenta,CC,sum(cargo) as cargo,sum(abono) as abono from (";	

		$query_rs .= " select B.Id_Activo,B.AF_BC,isnull(A.Cuent_Cont_Act,'NA') as Cuenta,
		isnull((select top 1 S.Desc_Centro_de_costos from siga_cat_centro_de_costos S where S.Id_Centros_de_costos=A.Centro_Costos),'NA') as CC,
		0 as cargo,isnull((select top 1 depreciacionmensual from  spFiscalD4FnMensual(B.AF_BC,1,0,".$INPCPeriodo.") where AF_BC=B.AF_BC
		and Anio=".$AnioFiltro." and mescalculo=".$MesFiltro."),0) as abono from siga_activos_contabilidad A,siga_activos B
		where A.Id_Activo=B.Id_Activo 


		union

		select B.Id_Activo,B.AF_BC,'6000040' as Cuenta,
		isnull((select top 1 S.Desc_Centro_de_costos from siga_cat_centro_de_costos S where S.Id_Centros_de_costos=A.Centro_Costos),'NA') as CC,
		isnull((select top 1 depreciacionmensual from  spFiscalD4FnMensual(B.AF_BC,1,0,".$INPCPeriodo.") where AF_BC=B.AF_BC
		and Anio=".$AnioFiltro." and mescalculo=".$MesFiltro."),0) as cargo,0 as abono from siga_activos_contabilidad A,siga_activos B
		where A.Id_Activo=B.Id_Activo 
		 
		 
		 ) A 
		 where 0=0 and cargo > 0 or abono>0 ";
		 
		 
		 if ($Agrupacion==2)
		 {
		 $query_rs .= " order by AF_BC";
         }
		 
		 if ($Agrupacion==1)
		 {
	     $query_rs .= " group by Cuenta,CC ";		 
		 $query_rs .= " order by Cuenta,CC";
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
	
	
	
	function cierreMes($AF_BC,$AnioFiltro="",$MesFiltro="",$Agrupacion=2,$INPCPeriodo=2018,$TodoAntes="")
    {
	   $db =  new Database();
	   $db_connect = $db->connect();

	    $query_rs .= "insert into CierreMes select * from dbo.spFiscalD4FnMensual('".trim($AF_BC)."',1,1,".$INPCPeriodo.")";

        if ($TodoAntes == "")
	    $query_rs .= " where Anio=".$AnioFiltro." and mescalculo=".$MesFiltro;  
	    //echo $query_rs;
	    //die();
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
	
	function obtenPolizaMensualBaja($AF_BC,$AnioFiltro="",$MesFiltro="",$Agrupacion=2)
    {
	   $db =  new Database();
	   $db_connect = $db->connect();
				
		if ($Agrupacion==2)		
	    $query_rs = "select * from (";
	    if ($Agrupacion==1)
		$query_rs = "select Cuenta,CC,sum(cargo) as cargo,sum(abono) as abono from (";	

		$query_rs .= " select B.Id_Activo,B.AF_BC,isnull(A.Cuent_Cont_Act,'NA') as Cuenta,
		isnull((select top 1 S.Desc_Centro_de_costos from siga_cat_centro_de_costos S where S.Id_Centros_de_costos=A.Centro_Costos),'NA') as CC,
		0 as cargo,isnull((select top 1 depreciacionmensual from  spFiscalD4FnMensual(B.AF_BC,1,0,".$INPCPeriodo.") where AF_BC=B.AF_BC
		and Anio=".$AnioFiltro." and mescalculo=".$MesFiltro."),0) as abono from siga_activos_contabilidad A,siga_activos B
		where A.Id_Activo=B.Id_Activo and B.Id_Activo in (select Id_Activo from siga_baja_activo and month(Fecha_Baja)=".$MesFiltro." and year(Fecha_Baja)=".$AnioFiltro.")


		union

		select B.Id_Activo,B.AF_BC,'6000040' as Cuenta,
		isnull((select top 1 S.Desc_Centro_de_costos from siga_cat_centro_de_costos S where S.Id_Centros_de_costos=A.Centro_Costos),'NA') as CC,
		isnull((select top 1 depreciacionmensual from  spFiscalD4FnMensual(B.AF_BC,1,0,".$INPCPeriodo.") where AF_BC=B.AF_BC
		and Anio=".$AnioFiltro." and mescalculo=".$MesFiltro."),0) as cargo,0 as abono from siga_activos_contabilidad A,siga_activos B
		where A.Id_Activo=B.Id_Activo and B.Id_Activo in (select Id_Activo from siga_baja_activo and month(Fecha_Baja)=".$MesFiltro." and year(Fecha_Baja)=".$AnioFiltro.")
		 
		 
		 ) A 
		 where 0=0 and cargo > 0 or abono>0 ";
		 
		 
		 if ($Agrupacion==2)
		 {
		 $query_rs .= " order by AF_BC";
         }
		 
		 if ($Agrupacion==1)
		 {
	     $query_rs .= " group by Cuenta,CC ";		 
		 $query_rs .= " order by Cuenta,CC";
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
	
	
	function obtenActivosContables($AF_BC="",$AnioFiltro="",$Bajas="")
    {
	   $db =  new Database();
	   $db_connect = $db->connect();
				

       $query_rs = "select Id_Activo,AF_BC from siga_activos where 0=0 and Id_Activo in (select Id_Activo from siga_activos_contabilidad where rtrim(ltrim(Fecha_Inicio_Depr)) <>'' and (Id_ActivoPadre=0 or Id_ActivoPadre is null)";
	   
	
   	   //if (strlen($AnioFiltro) > 0)
	  // $query_rs .= " and year(Fecha_Inicio_Depr)<=".$AnioFiltro;		   
   
       $query_rs .= " ) ";
	   
	   if ($Bajas != "")
	   {
		   if ($Bajas == 0)
		   $query_rs .= " and Id_Activo not in (select Id_Activo from siga_baja_activo where Estatus_Cancelacion<>1 )";
	   }

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
	
    function obtenActivo($Id_Activo="")
    {
	   $db =  new Database();
	   $db_connect = $db->connect();
				

       $query_rs = "select * from siga_activos where Id_Activo=".$Id_Activo;
	   	   
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

	function obtenActivoProveedor($Id_Activo="")
    {
	   $db =  new Database();
	   $db_connect = $db->connect();
				

       $query_rs = "select * from siga_activo_proveedor where Id_Activo=".$Id_Activo;
	   	   
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
	
	function obtenActivoContabilidad($Id_Activo="")
    {
	   $db =  new Database();
	   $db_connect = $db->connect();
				

       $query_rs = "select *,(select Id_ActivoPadre from siga_activos A where A.Id_Activo=".$Id_Activo.") as Id_ActivoPadre from siga_activos_contabilidad where Id_Activo=".$Id_Activo;
	   	   
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
	
	function obtenCuentas($Id_Activo=-1)
    {
		
	   //$activo = $this->obtenActivo($Id_Activo);
	   $db =  new Database();
	   $db_connect = $db->connect();
				

       $query_rs = "select *,dateadd(month,(VidaUtilFiscal*12),FechaFiscal) as FechaFiscalFinal from siga_activos_contabilidad where Id_Activo=".$Id_Activo;
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
	
	
	function obtenPorcentajes()
    {
	   $db =  new Database();
	   $db_connect = $db->connect();
				

       $query_rs = "select * from siga_cat_cuentas_contables where 0=0 order by Descripcion";
	   	   
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
	
	function obtenFirma($Id_CalificaTicket)
    {
	   $db =  new Database();
	   $db_connect = $db->connect();
				

       $query_rs = "select Archivo_Binario from siga_ticket_calificacion where Id_Solicitud=".$Id_CalificaTicket;
	   	   
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
	
	public function actualizaSeguimientoBaja($Id_Activo, $CveWorkFlow, $Seguimiento, $Comentario, $Paso, $Id_Baja)
	{
	   $db =  new Database();
	   $db_connect = $db->connect();
	   
	   $EstatusBaja = "0";
	   $Paso = ($Paso+1);
	   if ($Paso==6)
	   $EstatusBaja = "1";
   
	   $query_rs = "update siga_baja_Activo set ".$Seguimiento."=1,WorkFlowPaso=".$CveWorkFlow.",EstatusBaja=".$EstatusBaja." where Id_Activo=".$Id_Activo." and Id_baja=".$Id_Baja;
	   sqlsrv_query($db_connect,$query_rs);
	   //echo $query_rs."<br>";
	   $db->disconnect($db_connect);
	   $db_connect = $db->connect();
	   $query_rs = "update siga_workflow_activo set Aceptado=1, FechaAceptado=getDate() ";
	   if ($Comentario != "") { $query_rs .= ", ComentarioBaja='" . $Comentario . "'";}
	   $query_rs .= " where Id_Activo=" . $Id_Activo . " and CveWorkFlow=" . $CveWorkFlow . " and Id_baja=" . $Id_Baja;
	   sqlsrv_query($db_connect,$query_rs);
	   
	   if ($EstatusBaja=="1")
	   {
		 $query_rs = "update siga_activos set Id_Situacion_Activo=12 where Id_Activo=".$Id_Activo;
	     sqlsrv_query($db_connect,$query_rs);
		 
		 $query_rs = "insert into siga_baja_activo(Id_Activo,Motivo_Baja,Comentarios,Destino,Fecha_Baja,Usuario,Jefe_Area,Seg_Sol_Baja,Seg_Resp_Area_Ges,
		 Seg_Dir_Adminis,Cuenta_baja,Seg_Contabilidad,Seg_Seguridad,Seg_Usuario_Resp,WorkFlowPaso,Comentario,EstatusBaja) 
		 select A.Id_Activo,
		 C.Motivo_Baja,
		 C.Comentarios,
		 C.Destino,
		 C.Fecha_Baja,
		 C.Usuario,
		 C.Jefe_Area,
		 C.Seg_Sol_Baja,
		 C.Seg_Resp_Area_Ges,
		 C.Seg_Dir_Adminis,
		 C.Cuenta_baja,
		 C.Seg_Contabilidad,
		 C.Seg_Seguridad,
		 C.Seg_Usuario_Resp,
		 C.WorkFlowPaso,
		 C.Comentario,
		 C.EstatusBaja
		 from siga_activos A,siga_baja_activo C 
		 where A.Id_ActivoPadre=".$ID_Activo."
		 and C.Id_Activo=A.Id_ActivoPadre";
		 //echo $query_rs;
		 sqlsrv_query($db_connect,$query_rs);
		 
		 $query_rs = "update siga_activos set Id_Situacion_Activo=12 where Id_Activo in (select Id_Activo from siga_Activos where Id_ActivoPadre=".$Id_Activo.")";
	     sqlsrv_query($db_connect,$query_rs);
		 
	   }
	   //echo $query_rs."<br>";
	   $db->disconnect($db_connect);
	}

	public function verifico_baja_aceptada($Id_Activo,$CveWorkFlow,$Id_Baja){
		$db =  new Database();
	   $db_connect = $db->connect();
		
		 $query_rs = "select 
										count(*) as Total 
									from 
										siga_workflow_activo 
									where 
										FechaAceptado is not null 
										and Id_baja=".$Id_Baja." 
										and Id_Activo=".$Id_Activo." 
										and CveWorkflow=".$CveWorkFlow."
									";
	   	   
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
		
		return $rows[0]["Total"];
	}
	
	public function actualizaSeguimientoBajaNo($Id_Activo,$CveWorkFlow,$Seguimiento,$Comentario, $Id_Usuario, $Id_Baja)
	{
	   $db =  new Database();
	   $db_connect = $db->connect();
	   $query_rs = "update siga_baja_Activo set ".$Seguimiento."=0,WorkFlowPaso=".$CveWorkFlow.", Estatus_Cancelacion=1, Fecha_Cancelacion=getdate(), Usuario_Cancelo='".$Id_Usuario."', Coment_Cancelacion='".$Comentario."' where Id_Activo=".$Id_Activo." and Id_baja=".$Id_Baja;
	   sqlsrv_query($db_connect,$query_rs);
	   //echo $query_rs."<br>";
	   $db->disconnect($db_connect);
	   $db_connect = $db->connect();
	   $query_rs = "update siga_workflow_activo set Aceptado=0,FechaAceptado=getDate(),ComentarioBaja='".$Comentario."' where Id_Activo=".$Id_Activo." and CveWorkFlow=".$CveWorkFlow." and Id_baja=".$Id_Baja;
	   sqlsrv_query($db_connect,$query_rs);
	   //echo $query_rs."<br>";
	   $db->disconnect($db_connect);
	}
	
	public function actualizaReubicacion($Id_Activo,$Id_Area,$Id_Ubic_Prim,$Id_Ubic_Sec,$Ubic_Especifica,$Centro_Costos,$Id_Usuario_Sesion, $Id_Usuario_Responsable, $Nom_Usuario_Reponsable, $Responsable_Procedencia, $Id_Activo_Reubicacion)
	{
	   $db =  new Database();
	   $db_connect = $db->connect();
	   
	   /*$query_rs = "update siga_activos set Id_Area_Ant=Id_Area,Id_Ubic_Prim_Ant=Id_Ubic_Prim,Id_Ubic_Sec_Ant=Id_Ubic_Sec,Centro_Costos_Ant=(
	   select Centro_Costos from siga_activos_contabilidad where Id_Activo=".$Id_Activo.") where Id_Activo=".$Id_Activo;
	   //echo $query_rs;
	   sqlsrv_query($db_connect,$query_rs);*/
	   
	   $query_rs = "insert into siga_historico_reubicacion(Id_Activo,Id_Area,Id_Ubic_Prim,Id_Ubic_Sec,Ubic_Especifica,FechaReubicacion,Centro_Costos,Id_Usuario,Responsable_Activo_Procedencia, Id_Activo_Reubicacion) 
	   select Id_Activo,Id_Area,Id_Ubic_Prim,Id_Ubic_Sec,Especifica,getDate(),
	   (select Centro_Costos from siga_activos_contabilidad where Id_Activo=".$Id_Activo."),".$Id_Usuario_Sesion.",'".$Responsable_Procedencia."', ".$Id_Activo_Reubicacion." from siga_activos where Id_Activo=".$Id_Activo;
	   //echo $query_rs;
	   sqlsrv_query($db_connect,$query_rs);

	   $query_rs = "update siga_activos set Id_Area=".$Id_Area."
	   ,Id_Ubic_Prim=".$Id_Ubic_Prim.",Id_Ubic_Sec=".$Id_Ubic_Sec.", Especifica='".$Ubic_Especifica."', Num_Empleado=(select top 1 No_Usuario from siga_usuarios where id_usuario=".$Id_Usuario_Responsable."), Nombre_Completo='".$Nom_Usuario_Reponsable."' where Id_Activo=".$Id_Activo;
	   //echo $query_rs;
	   sqlsrv_query($db_connect,$query_rs);
	   
	   $query_rs = "update siga_activos_contabilidad set Centro_Costos=".$Centro_Costos."
	   where Id_Activo=".$Id_Activo;
	   //echo $query_rs;
	   sqlsrv_query($db_connect,$query_rs);

       /* Actualizamos los hijos*/	   
	   $query_rs = "update siga_activos_contabilidad set Centro_Costos=".$Centro_Costos."
	   where Id_Activo in (select Id_Activo from siga_Activos where Id_ActivoPadre=".$Id_Activo.")";
	   sqlsrv_query($db_connect,$query_rs);
	   
	   $query_rs = "update siga_activos set Id_Area=".$Id_Area."
	   ,Id_Ubic_Prim=".$Id_Ubic_Prim.",Id_Ubic_Sec=".$Id_Ubic_Sec.", Especifica='".$Ubic_Especifica."' where Id_Activo in (select Id_Activo from siga_Activos where Id_ActivoPadre=".$Id_Activo.")";
	   sqlsrv_query($db_connect,$query_rs);
	   /* Actualizamos los hijos*/	

	   
	   //echo $query_rs."<br>";
	   $db->disconnect($db_connect);
	}
	
	function obtenProcesoWorkflow($Id_Activo)
    {
	   $rows = array();
	   if ($Id_Activo != "")
	   {		   
	   $db =  new Database();
	   $db_connect = $db->connect();
       
       $query_rs = "
	   SELECT A.*,B.Orden,C.Seg_Sol_Baja,C.Seg_Resp_Area_Ges,C.Seg_Dir_Adminis,C.Seg_Contabilidad,
	   C.Seg_Seguridad,C.Seg_Usuario_Resp,C.WorkFlowPaso,C.Comentario,A.ComentarioBaja 
	   FROM siga_workflow_activo A,siga_workflow B,siga_baja_activo C 
	   WHERE A.CveWorkflow=B.CveWorkflow 
	   and A.Id_Activo=".$Id_Activo." 
	   and A.Id_baja=C.Id_baja
	   and C.Id_baja=(select top 1 Id_baja from siga_baja_activo bb where Id_Activo=".$Id_Activo." order by 1 desc)
	   and (select top 1 Estatus_Cancelacion from siga_baja_activo where Id_Activo=".$Id_Activo." order by Id_Baja desc)<>1 	
	   ORDER BY B.Orden DESC
	   ";
	   	   
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
		
		
		
		while( $row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC))
		{
			$rows[] = $row;
		}
		
		sqlsrv_free_stmt($result);
		$db->disconnect($db_connect);
	   }		
		return $rows;
	}
	
	function obtenProcesoWorkflow2($Id_Activo)
    {
		$rows = array();
	   if ($Id_Activo != "")
	   {		   
	   $db =  new Database();
	   $db_connect = $db->connect();
			
    $query_rs = "SELECT A.*,B.Orden,C.Seg_Sol_Baja,C.Seg_Resp_Area_Ges,C.Seg_Dir_Adminis,C.Seg_Contabilidad,
	   C.Seg_Seguridad,C.Seg_Usuario_Resp,C.WorkFlowPaso,C.Comentario,A.ComentarioBaja 
		 FROM siga_workflow_activo A,siga_workflow B,siga_baja_activo C 
		 WHERE A.CveWorkflow=B.CveWorkflow 
		 AND A.Id_Activo=".$Id_Activo." 
		 AND A.Id_baja=C.Id_baja 
	   AND C.Id_baja=(select top 1 Id_baja from siga_baja_activo bb where Id_Activo=".$Id_Activo." order by 1 desc)
	   order by B.Orden desc
	   ";
	   	   
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
		
		
		
		while( $row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC))
		{
			$rows[] = $row;
		}
		
		sqlsrv_free_stmt($result);
		$db->disconnect($db_connect);
	   }		
		return $rows;
	}
	

    function existeProceso($Id_Activo,$Id_Baja,$Orden,$Aceptado=-1)
    {
	   $db =  new Database();
	   $db_connect = $db->connect();
				

       $query_rs = "select count(*) as Existe from siga_workflow_activo A,siga_workflow B where 
	   A.CveWorkFlow=B.CveWorkFlow 
	   and 
	   A.Id_baja=".$Id_Baja."
	   and B.Orden=".$Orden;
	   
	   if ($Aceptado != -1)
	   $query_rs .= " and A.Aceptado=".$Aceptado;	   
	   	   
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
		
		return $rows[0]["Existe"];
	}
	
	  function verifica_proceso_workflow($Id_Baja,$Paso)
    {
	   $db =  new Database();
	   $db_connect = $db->connect();
		 $query_rs = "select count(*) as Existe from  siga_workflow_activo where Id_baja=".$Id_Baja." and CveWorkflow=".$Paso;
	   
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
		
		return $rows[0]["Existe"];
	}
	
	function existeCancelacion($Id_Activo, $Id_Baja)
    {
	   $db =  new Database();
	   $db_connect = $db->connect();
		

       $query_rs = "
						select top 1 convert(varchar,Estatus_Cancelacion)+'-'+Coment_Cancelacion as Cancelado 
						from siga_baja_activo where Id_Activo=".$Id_Activo." and Id_baja=".$Id_Baja." and Estatus_Cancelacion=1
			 ";
	   
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
		
		return $rows[0]["Cancelado"];
	}
	
	
	function obtenWorkflow($Orden)
    {
	   $db =  new Database();
	   $db_connect = $db->connect();
				

       $query_rs = "select B.* from siga_workflow B where Orden=".$Orden;
	   	   
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
	
	public function insertaProcesoWorkflow($Id_Activo,$Id_Baja,$Id_Usuario,$Correo)
	{
	   $proceso_actual = $this->obtenProcesoWorkflow($Id_Activo);
	   $bajaactivo = $this->obtenCatalogo($Id_Activo,"siga_baja_activo","Id_Activo","Fecha_Baja");
	   //$usuarioProceso = $this->obtenCatalogo($Id_Usuario,"siga_usuarios","Id_Usuario","Id_Usuario");
	   //$Id_baja = $bajaactivo[0]["Id_baja"];
	   //$Correo = $usuarioProceso[0]["Correo"];
	   if (count($proceso_actual) == 0) // No hay flujo empieza desde el inicio
	   {
       $Paso = 1;	   
	   }
       else
	   {		   
	   $Paso = ($proceso_actual[0]["Orden"]+1); 
	   }		
	   $ProcesoArr = $this->obtenWorkflow($Paso);
	   $CveWorkflow = $ProcesoArr[0]["CveWorkflow"];
	   
	   if ($this->existeProceso($Id_Activo,$Id_Baja,$Paso,0) == 0)
	   {
		   $db =  new Database();
		   $db_connect = $db->connect();
		   $query_rs = "insert into siga_workflow_activo(Id_baja,CveWorkflow,FechaAlta,Correo,Aceptado,Id_Activo,Id_Usuario) values(";
		   $query_rs .= $Id_Baja.",".$CveWorkflow.",getDate(),'".$Correo."',0,".$Id_Activo.",'".$Id_Usuario."')";
		   sqlsrv_query($db_connect,$query_rs);
		   //echo $query_rs."<br>";
		   $db->disconnect($db_connect);
	   }
	   else
		   $Paso = $Paso - 1;
	   
	   return $Paso;
	}

	function obtenDetalleBaja($Id_Activo, $Id_Baja)
    {
		
	   $cons_baja="";	
	   if($Id_Baja!="-1"){
		   if($Id_Baja!=""){
			$cons_baja=" and A.Id_baja=".$Id_Baja;	
		   }	
	   }
	   
	   $db =  new Database();
	   $db_connect = $db->connect();
				

		$query_rs = "
		SELECT TOP 1 
				A.*,
				A.Id_baja as Id_Baja_Activo,
				B.Desc_Motivo_baja,
				C.Desc_Destino_final,
				(SELECT C.[Desc_Centro_de_costos] 
				FROM siga_activos_contabilidad B, siga_cat_centro_de_costos C
				WHERE B.Centro_Costos=C.Id_Centros_de_costos 
				AND B.Id_Activo=".$Id_Activo."
				AND B.Estatus_Reg <> 3) Costos
		FROM siga_baja_Activo A, 
				siga_cast_motivo_baja B,
				siga_cast_destino_final C 
		WHERE A.ID_Activo=".$Id_Activo.$cons_baja." 
			AND A.Motivo_Baja=B.Id_Motivo_baja 
			AND A.Destino=C.Id_Destino_final			
		ORDER BY Id_baja desc";
	   	   
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
	
	function ubic_prim_y_ubic_sev($Id_Activo)
    {
	   $db =  new Database();
	   $db_connect = $db->connect();
				

       $query_rs = "select Desc_Ubic_Prim, Desc_Ubic_Sec from siga_activos a
				left join siga_cat_ubic_prim p on a.Id_Ubic_Prim=p.Id_Ubic_Prim 
				left join siga_cat_ubic_sec s on a.Id_Ubic_Sec=s.Id_Ubic_Sec 
				where Id_Activo=".$Id_Activo."";
	   	   
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

	function propiedad_activo($Id_Activo)
    {
	   $db =  new Database();
	   $db_connect = $db->connect();
				

	   $query_rs = "SELECT Desc_Propiedad 
	   				FROM siga_activos a 
	   				LEFT JOIN siga_cat_propiedad p 
	   				ON a.Id_Propiedad=p.Id_Propiedad 
	   				WHERE Id_Activo=".$Id_Activo."";
	   	   
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
	
	function correo_resp($Id_Activo){
	   $db =  new Database();
	   $db_connect = $db->connect();
				

	   $query_rs = "
			select * from (
			SELECT (select top  1 email from empleados_chs where num_empleado=siga_activos.Num_Empleado) as email FROM siga_activos where id_activo=".$Id_Activo." 
			) siga_activos where email is not null and email<>''
		 ";
	   	   
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


   function curlData($url,$fields)
   {

    $postvars = http_build_query($fields);

    // open connection
    $ch = curl_init();

    // set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
	//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // execute post
    $jsonData = curl_exec($ch);
	if (curl_error($ch)) {
		$error_msg = curl_error($ch);
		echo "Error=".$error_msg;
	}
    // close connection
    curl_close($ch);
   
   
	$jsonData = preg_replace("/[\r\n]+/", " ", trim($jsonData));
	$jsonData = preg_replace('/[ ]{2,}|[\t]/', ' ', trim($jsonData));
	$jsonData = str_replace("\\'", "'", $jsonData);
	//$jsonData = str_replace("\\&#39;", "'", $jsonData);
	$jsonData = str_replace("\\\'", "'", $jsonData);
	//$jsonData = str_replace("\\", "", $jsonData);
    $jsonData = utf8_encode($jsonData);
	//print_r($jsonData);
	
	$jsonData = json_decode($jsonData,true);
	
	return $jsonData;
   
   
   }	
   
   function validaRespuesta($arrJSON,$resultado)
   {
     $result = $arrJSON["mensaje_error"];
     if ( strlen($result) == 0 )
	 {
		$result = $arrJSON[$resultado];
	 }
	 return $result;
   }
   
   function buscaProveedor($termino="")
    {
	   $db =  new Database();
	   $db_connect = $db->connect();
	   
	   	   $unwanted_array = array(    '�'=>'S', '�'=>'s', '�'=>'Z', '�'=>'z', '�'=>'A', '�'=>'A', '�'=>'A', '�'=>'A', '�'=>'A', '�'=>'A', '�'=>'A', '�'=>'C', '�'=>'E', '�'=>'E',
                            '�'=>'E', '�'=>'E', '�'=>'I', '�'=>'I', '�'=>'I', '�'=>'I', '�'=>'N', '�'=>'O', '�'=>'O', '�'=>'O', '�'=>'O', '�'=>'O', '�'=>'O', '�'=>'U',
                            '�'=>'U', '�'=>'U', '�'=>'U', '�'=>'Y', '�'=>'B', '�'=>'Ss', '�'=>'a', '�'=>'a', '�'=>'a', '�'=>'a', '�'=>'a', '�'=>'a', '�'=>'a', '�'=>'c',
                            '�'=>'e', '�'=>'e', '�'=>'e', '�'=>'e', '�'=>'i', '�'=>'i', '�'=>'i', '�'=>'i', '�'=>'o', '�'=>'n', '�'=>'o', '�'=>'o', '�'=>'o', '�'=>'o',
                            '�'=>'o', '�'=>'o', '�'=>'u', '�'=>'u', '�'=>'u', '�'=>'y', '�'=>'b', '�'=>'y' );

	   $termino = mb_strtolower(trim($termino));
       $termino = strtr( $termino, $unwanted_array );
				

       $query_rs = "select distinct value,id from (select top 30 NombreProveedor as value,NombreProveedor as id,Fech_Inser from siga_activo_proveedor where NombreProveedor like '%".$termino."%' order by Fech_Inser desc) A";
	   	   
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
	
	function obtenHijosActivo($Id_Activo)
    {
	   $db =  new Database();
	   $db_connect = $db->connect();
				

       $query_rs = "select * from siga_activos where Id_ActivoPadre=".$Id_Activo;
	   	   
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
