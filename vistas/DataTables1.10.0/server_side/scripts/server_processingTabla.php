<?php

/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
 
  function obtenEvaluaciones($Mes,$Anio,$AcumuladoFiltro,$category="",$category2="",$NumeroEnvio=-1)
 {
	
				
	   /*$query_rs = "(
	    select CveCita,(select Descripcion from RazonComentario R where R.CveRazon=C.CveRazon)  as Razon,C.Comentario,C.CveCliente,
		(Select A.Descripcion from Asistencia A where A.CveAsistencia=C.CveAsistencia) as Asistencia,C.CveServicio,C.FechaAlta
		from CitaComentario C where 0=0 ";

	    if ($CveAsistencia != "")
	    $query_rs .= " and C.CveAsistencia=".$CveAsistencia;  
   
		if ($CveServicio != "")
	    $query_rs .= " and C.CveServicio='".$CveServicio."'";  
   
   
		if ($Acumulado == 0)
		$query_rs .= ' and MONTH(C.FechaAlta)='.$Mes;	
		else
		$query_rs .=  " and MONTH(C.FechaAlta)>= 1 and MONTH(C.FechaAlta)<=".$Mes;	

    	$query_rs .= ' and YEAR(C.FechaAlta)='.$Anio;
		
		$query_rs .= ") Tabla ";
		//echo $query_rs;
		*/
        $query_rs = "( Select *,(select T.Mensaje from TipoErrorCorreo T where T.CveTipoError=C.CveTipoError limit 1) as Error from Mailing C where 0=0 ";
   
		if ($Acumulado == 0)
		$query_rs .= ' and MONTH(C.FechaEnvio)='.$Mes;	
		else
		$query_rs .=  " and MONTH(C.FechaEnvio)>= 1 and MONTH(C.FechaEnvio)<=".$Mes;	
	
	  	if ($NumeroEnvio != -1)
		$query_rs .= ' and C.NumeroEnvio='.$NumeroEnvio;
	 
	    if ($category != "")
		$query_rs .=  " and ErrorEnvio=".$category;
	
	
		if ($category2 != "")
		{
		if ($category2 == "No ha sido contestado aun por el cliente")	
		$query_rs .=  " and CveEvaluacion is null";
	    if ($category2 == "Evaluacion Efectuada")	
		$query_rs .=  " and CveEvaluacion is not null";
	    }

    	$query_rs .= ' and YEAR(C.FechaEnvio)='.$Anio;
		
		$query_rs .= ") Tabla ";
	 //echo $query_rs;
		
		return $query_rs;
	 
	}
	
	session_start();
	$Mes = $_SESSION["mes"];
	$Anio = $_SESSION["anio"];
	$AcumuladoFiltro = $_SESSION["AcumuladoFiltro"];
	$CveOrigen = $_SESSION["CveOrigenFiltro"];
	$CveAsistencia = "";
	$CveServicio = "";
	$CvePregunta = "";

	if (isset($_GET["CveAsistencia"]))
	$CveAsistencia = $_GET["CveAsistencia"];
	if (isset($_GET["CveServicio"]))
	$CveServicio = $_GET["CveServicio"];
	if (isset($_GET["CvePregunta"]))
	$CvePregunta = $_GET["CvePregunta"];


    $category = $_GET["category"];
	$category2 = "";
	if (isset($_GET["category2"]))
    $category2 = $_GET["category2"];

	$NumeroEnvio = 1;
	if (isset($_GET["NumeroEnvio"]))
	{
	 $NumeroEnvio =	$_GET["NumeroEnvio"];
	}

	
	$query = obtenEvaluaciones($Mes,$Anio,$AcumuladoFiltro,$category,$category2,$NumeroEnvio);

	// DB table to use
	$table = $query;

	// Table's primary key
	$primaryKey = 'CAS';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes


$columns = array(
	array( 'db' => 'CAS', 'dt' => 0 ),
	array( 'db' => 'NOMBRE_CLIENTE',  'dt' => 1 ),
	array( 'db' => 'APELLIDOS_CLIENTE',   'dt' => 2 ),
	array( 'db' => 'NUM_CUENTA',     'dt' => 3 ),
	array( 'db' => 'CLAVE',     'dt' => 4 ),
	array( 'db' => 'NOMBRE_SERVICIO',     'dt' => 5 ),
	array( 'db' => 'FECHA_SERVICIO',     'dt' => 6 ),
	array( 'db' => 'CORREO',     'dt' => 7 ),
	array( 'db' => 'Error',     'dt' => 8 ),
	
);

// SQL server connection information

//include('../../../conf/config.php');

$sql_details['host'] = "internal-db.s148218.gridserver.com";
$sql_details['db'] = "db148218_pif";
$sql_details['user'] = "db148218";
$sql_details['pass'] = "Mockup2015-";


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require( 'ssp.class.php' );

echo json_encode(
	SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);


