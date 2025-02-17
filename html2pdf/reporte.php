<?php
date_default_timezone_set('America/Mexico_City');
ob_start();

$marcadeagua=0;

$var="";

if (isset($_POST['arraypdf'])) {
    $arraypdf= json_decode($_POST["arraypdf"], true);
	//$arraypdf= $_POST["arraypdf"];
}
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
<head>
 <style type="text/css">


	#tbl
	{
		 width: 100%;
	}



	.text-center
	{
		text-align: center;
	}


	body { font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif; font-weight: 400; overflow-x: hidden; overflow-y: auto; }



	#pdf_1 #tbl .thead #tr .td{
	  text-align:center;
	  background:#19294a;
	  color:#fff;
	}
	
	#pdf_1 #tbl .tbody #tr .td{
	  border:1px solid #ccc;
	  font-size:11px;
	  padding: 4px;
	}
	#pdf_1 #tbl .tbody #tr.photo{
	  background:#f4f4f4;
	  color:#666;
	  text-align:center;
	}
	#pdf_1 #tbl .tbody tr.adjuntos td{
	  padding:1em 0;
	}
	#pdf_1 #tbl .tbody tr td.check img{
	  width:15px;
	  height:15px;
	  margin:0 auto;
	  display:block;
	}
	#pdf_1 #tbl .tbody #tr .sign{
	  vertical-align:top;
	  height:6em;
	  text-align:center;
	}
	#pdf_1 #tbl .tbody #tr .td .sign .comments{
	  text-align:left;
	}
	#pdf_1 #tbl .tbody #tr .td .author{
	  vertical-align:center;
	  text-align:center;
	}
	#pdf_1 #tbl .tbody #tr.faces .td{
	}
	#pdf_1 #tbl .tbody #tr.faces .td img{
	  margin:0 auto;
	  display:block;
	  width:40px;
	  vertical-align:middle;
	}


  </style>
 

</head>
<body>

  <!-- /.login-logo -->
  <div  id="pdf_1"> 
	<table id="tbl">
      <thead class="thead">
        <tr id="tr">
          <td colspan="2" class="td" style="border-top: 1px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;">DATOS GENERALES</td>
        </tr>
      </thead>
      <tbody class="tbody">
        <tr id="tr">
          <td class="td">Fecha Emisión:</td>
          <td class="td">Tipo vale resguardo:</td>
        </tr>
        <tr id="tr">
          <td class="td">Área:</td>
          <td class="td">Jefe de área:</td>
        </tr>
      </tbody>
    </table>

    <table id="tbl">
      <thead class="thead">
        <tr id="tr">
          <td colspan="3" class="td" style="border-top: 1px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;">ASIGNACIÓN DEL RESGUARDO</td>
        </tr>
      </thead>
      <tbody class="tbody">
        <tr id="tr">
          <td colspan="2" class="td">Usuario vale resguardo:</td>
          <td colspan="1" class="td">No. Usuario vale resguardo:</td>
        </tr>
        <tr id="tr">
          <td class="td">Departamento:</td>
          <td class="td">Puesto:</td>
          <td class="td">Oficina</td>
        </tr>
        <tr id="tr">
          <td colspan="1" class="td">Teléfono (ext):</td>
          <td colspan="2" class="td">Correo:</td>
        </tr>
      </tbody>
    </table>


    <table id="tbl">
      <thead class="thead">
        <tr id="tr">
          <td colspan="7" class="td" style="border-top: 1px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;">CONTROL DE ACTIVO FIJO</td>
        </tr>
      </thead>
      <tbody class="tbody">
        <tr style="background:#bcbbbb;" id="tr">
          <td class="text-center td">AF/BC</td>
          <td  class="td text-center">Familia</td>
          <td  class="td text-center">Subfamilia</td>
          <td  class="td text-center">Marca</td>
          <td  class="td text-center">Modelo</td>
          <td  class="td text-center">No Serie</td>
          <td  class="td text-center">Fecha alta activo</td>
        </tr>
        <tr id="tr">
          <td class="td">AF003653</td>
          <td class="td">Computo</td>
          <td class="td">Laptop</td>
          <td class="td">Lenovo</td>
          <td class="td">X240</td>
          <td class="td">PF01DSSG</td>
          <td class="td">11/12/2016</td>
        </tr>
        <tr id="tr">
          <td class="td">AF003653</td>
          <td class="td">Computo</td>
          <td class="td">Laptop</td>
          <td class="td">Lenovo</td>
          <td class="td">X240</td>
          <td class="td">PF01DSSG</td>
          <td class="td">11/12/2016</td>
        </tr>
        <tr id="tr">
          <td class="td">AF003653</td>
          <td class="td">Computo</td>
          <td class="td">Laptop</td>
          <td class="td">Lenovo</td>
          <td class="td">X240</td>
          <td class="td">PF01DSSG</td>
          <td class="td">11/12/2016</td>
        </tr>
        <tr id="tr">
          <td class="td">AF003653</td>
          <td class="td">Computo</td>
          <td class="td">Laptop</td>
          <td class="td">Lenovo</td>
          <td class="td">X240</td>
          <td class="td">PF01DSSG</td>
          <td class="td">11/12/2016</td>
        </tr>
      </tbody>
    </table>

    <table id="tbl">
      <thead class="thead">
        <tr id="tr">
          <td class="td" style="border-top: 1px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;">OBSERVACIONES</td>
        </tr>
      </thead>
      <tbody class="tbody">
        <tr id="tr">
          <td class="td">Comentario:</td>
        </tr>
      </tbody>
    </table>


    <table id="tbl">
      <thead class="thead">
        <tr id="tr">
          <td colspan="2" class="td" style="border-top: 1px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;">NOMBRE Y FIRMA RESPONSABLES</td>
        </tr>
      </thead>
      <tbody class="tbody">
        <tr id="tr">
          <td class="td">RESPONSABLE DEL ÁREA</td>
          <td class="td">RESPONSABLE AF/BC:</td>
        </tr>
        <tr id="tr">
          <td class="td sign">Firma</td>
          <td class="td sign">Firma</td>
        </tr>
        <tr id="tr">
          <td class="td author">ING. JOAQUÍN PALACIO:</td>
          <td class="td author">ING. JOAQUÍN PALACIO:</td>
        </tr>
      </tbody>
    </table>
  </div>
  <!-- /.login-box-body -->

</body>

</html>
  
  
<?php






//}	
    //En una variable llamada $content se obtiene lo que tenga la ruta especificada
    //NOTA: Se usa ob_get_clean porque trae SOLO el contenido
    //Evitará este error tan común en FPDF:
    //FPDF error: Some data has already been output, can't send PDF
    
	//Eliminamos los archivos del directorio
	//eliminarDir("archivospdf");
	$content = ob_get_clean();
    //Se obtiene la librería
    require_once(dirname(__FILE__).'/html2pdf.class.php');
    /* Las lineas siguientes siempre serán las mismas
     * A mi parecer no hay mucho que explicar. Se explican
     * por sí solas :D
     * */
    try
    {
		
        $html2pdf = new HTML2PDF('P', 'A4', 'es', true, 'UTF-8', 3); //Configura la hoja
        $html2pdf->pdf->SetDisplayMode('fullpage'); //Ver otros parámetros para SetDisplaMode
        $html2pdf->writeHTML($content); //Se escribe el contenido 
		//$filename = "archivospdf/".(string)time() . ".pdf";
        $html2pdf->Output("mipdf.pdf");
		// return the filename to ajax request
		//echo $filename;
	}
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }

?>
