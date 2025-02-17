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
    
	
	function obtenEvaluaciones2($Mes,$Anio,$AcumuladoFiltro,$CveAsistencia,$CveServicio,$CvePregunta,$CveOrigen=-1,$EsApp=-1)
	{
	   require_once("../../../../class/PIF.php");
	   $obj = new PIF();
	   $servicios = $obj->obtenServicio2($Mes,$Anio,$AcumuladoFiltro);
	   
	   
	   $query_rs = "(
	    select A.CveEvaluacion, CL.Nombre,CL.ApellidoPaterno,CL.ApellidoMaterno,CL.Correo,A.NUMERO_CUENTA,
		CL.Telefono,A.Estado,A.Asistencia,A.CveServicio,A.Servicio,A.FechaEvaluacion,P1,P2,P3,P4,P5,P6,P7,P8,P9,P10,
		Clas1,Clas2,CveOrigen,A.CveAsistencia,case when Pindice>=0 and Pindice <= 6 then -100 
		 when Pindice>=7 and Pindice <= 8 then 0
		 when Pindice>=9 and Pindice <= 10 then 100
		 end as NPS,A.Audio
		from (";
	   
       $queryTemp = "";
	    for ($i=0; $i < count($servicios); $i++)
		{
	    $queryTemp .= "select distinct E.CveEvaluacion,E.FechaEvaluacion, E.CveCliente as NUMERO_CUENTA, 
		(Select A.Descripcion from Asistencia A where A.CveAsistencia=E.CveAsistencia limit 1) as Asistencia, 
		E.CveServicio,
		(Select A.Descripcion from Servicio A where A.CveServicio=E.CveServicio limit 1) as Servicio,";
        
		$queryPregunta = "";
		$preguntas = $obj->obtenPreguntasListado("",$servicios[$i]["CveServicio"],"",-1);
		for ($j=0; $j <count($preguntas); $j++)
        {	
         
			 if ($preguntas[$j]["CveTipo"] == 1)
			 $queryPregunta .= "(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=".$preguntas[$j]["CvePregunta"]." limit 1) as P".($j+1).",";
			
			 if ($preguntas[$j]["CveTipo"] == 2)
			 $queryPregunta .= "(Select case when R2.Valor=0 then 'No' else 'Si' end from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=".$preguntas[$j]["CvePregunta"]."  limit 1) as P".($j+1).",";

			 if ($preguntas[$j]["CveTipo"] == 3  )
			 $queryPregunta .= "(Select R2.Comentario from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=".$preguntas[$j]["CvePregunta"]."  limit 1) as P".($j+1).",";	 

			 if ($preguntas[$j]["CveTipo"] == 4)
			 $queryPregunta .= "(Select R2.Valor from RespuestaEvaluacion R2 where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=".$preguntas[$j]["CvePregunta"]." limit 1) as P".($j+1).",";
		 
		}
		
		for ($k=$j; $k <10; $k++)
		{
			$queryPregunta .= "'' as P".($k+1).",";
		}
		
		
		//$queryPregunta .= "'' as Clas1,'' as Clas2,";
		$preguntas = $obj->obtenPreguntasListado("",$servicios[$i]["CveServicio"],3,-1);
		for ($j=0; $j <count($preguntas); $j++)
        {	      
		  $queryPregunta .= "(Select C.Descripcion from ClasificacionComentario C,RespuestaEvaluacion R where C.CveClasificacion=R.CveClasificacion 
		  and R.CvePregunta=".$preguntas[$j]["CvePregunta"]." and R.CveEvaluacion=E.CveEvaluacion limit 1) as Clas1,";
		  $queryPregunta .= "(Select C.Descripcion from SubClasificacionComentario C,RespuestaEvaluacion R where C.CveSubClasificacion=R.CveSubClasificacion 
		  and R.CvePregunta=".$preguntas[$j]["CvePregunta"]." and R.CveEvaluacion=E.CveEvaluacion limit 1) as Clas2,"; 
		  break;
		}
		
		$queryTemp .= $queryPregunta."E.CveOrigen,E.CveAsistencia,E.Audio,E.CveEstado,E.Estado,(Select R2.Valor from RespuestaEvaluacion R2,Pregunta PP where R2.CveEvaluacion=E.CveEvaluacion and R2.CvePregunta=PP.CvePregunta and PP.EsNPS=1 limit 1) as Pindice
		from Evaluacion E where Validacion=1 and CveServicio='".$servicios[$i]["CveServicio"]."'";
		
		if ($EsApp != -1)
		$queryTemp .= " and E.EsApp=".$EsApp;
		
		$queryTemp .= " UNION ";
		}

		if (strlen($queryTemp) > 0)
		$queryTemp = substr($queryTemp,0,strlen($queryTemp)-6);	
	
	    //echo $queryTemp;
	   
		$query_rs .= $queryTemp." ) A,Cliente CL where A.NUMERO_CUENTA=CL.CveCliente ";

	    if ($CveAsistencia != "")
	    $query_rs .= " and A.CveAsistencia=".$CveAsistencia;  
   
		if ($CveServicio != "")
	    $query_rs .= " and A.CveServicio='".$CveServicio."'";  
   
		if ($CvePregunta != "")
	    $query_rs .= " and A.CvePregunta=".$CvePregunta;  
   
       	if ($CveOrigen != -1)
		$query_rs .= ' and A.CveOrigen='.$CveOrigen;
   
   
		if ($Acumulado == 0)
		$query_rs .= ' and MONTH(A.FechaEvaluacion)='.$Mes;	
		else
		$query_rs .=  " and MONTH(A.FechaEvaluacion)>= 1 and MONTH(A.FechaEvaluacion)<=".$Mes;	

    	$query_rs .= ' and YEAR(A.FechaEvaluacion)='.$Anio;
		
		$query_rs .= ") Tabla ";
   
	    //$query_rs .= " order by A.FechaEvaluacion DESC";
	 
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
	$EsApp = -1;

	if (isset($_GET["CveAsistencia"]))
	$CveAsistencia = $_GET["CveAsistencia"];
	if (isset($_GET["CveServicio"]))
	$CveServicio = $_GET["CveServicio"];
	if (isset($_GET["CvePregunta"]))
	$CvePregunta = $_GET["CvePregunta"];
	if (isset($_GET["EsApp"]))
	$EsApp = $_GET["EsApp"];
	
	$query = obtenEvaluaciones2($Mes,$Anio,$AcumuladoFiltro,$CveAsistencia,$CveServicio,$CvePregunta,$CveOrigen,$EsApp);
    //echo $query;
// DB table to use
$table = $query;

// Table's primary key
$primaryKey = 'CveEvaluacion';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes


$columns = array(
	array( 'db' => 'CveEvaluacion', 'dt' => 0 ),
	array( 'db' => 'Nombre',  'dt' => 1 ),
	array( 'db' => 'ApellidoPaterno',   'dt' => 2 ),
	array( 'db' => 'ApellidoMaterno',     'dt' => 3 ),
	array( 'db' => 'Correo',     'dt' => 4 ),
	array( 'db' => 'NUMERO_CUENTA',     'dt' => 5 ),
	array( 'db' => 'Telefono',     'dt' => 6 ),
	array( 'db' => 'Estado',     'dt' => 7 ),
	array( 'db' => 'Asistencia',     'dt' => 8 ),
	array( 'db' => 'CveServicio',     'dt' => 9 ),
	array( 'db' => 'Servicio',     'dt' => 10 ),
	array( 'db' => 'FechaEvaluacion',     'dt' => 11 ),
	array( 'db' => 'P1',     'dt' => 12 ),
	array( 'db' => 'P2',     'dt' => 13 ),
	array( 'db' => 'P3',     'dt' => 14 ),
	array( 'db' => 'P4',     'dt' => 15 ),
	array( 'db' => 'P5',     'dt' => 16 ),
	array( 'db' => 'P6',     'dt' => 17 ),
	array( 'db' => 'P7',     'dt' => 18 ),
	array( 'db' => 'P8',     'dt' => 19 ),
	array( 'db' => 'P9',     'dt' => 20 ),
	array( 'db' => 'P10',     'dt' => 21 ),
	array( 'db' => 'Clas1',     'dt' => 22 ),
	array( 'db' => 'Clas2',     'dt' => 23 ),
	array( 'db' => 'CveOrigen',     'dt' => 24 ),
	array( 'db' => 'CveAsistencia',     'dt' => 25 ),
	array( 'db' => 'NPS',     'dt' => 26 ),
	array( 'db' => 'Audio',     'dt' => 27 )
);

// SQL server connection information

//include('../../../conf/config.php');

$sql_details['host'] = "internal-db.s148218.gridserver.com";
$sql_details['db'] = "db148218_privilegios";
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


