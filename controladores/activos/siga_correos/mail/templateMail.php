<?php

include("../../class.php");

function obtenMensaje($CveHallazgo)	
{	

$obj = new Model_Db_Discovery();

//$actual_link = "http://$_SERVER[HTTP_HOST]"."/prearrival";
$actual_link = "http://www.mockup.mx/webdesign/liverpool/experiencia/mystery/";
//echo $actual_link;
//die();

//variables 
$hallazgo = $obj->obtenHallazgo($CveHallazgo);
$fecha = $hallazgo[0]["FechaEvaluacion"];

/*$fechad = date("d",strtotime($fecha));
$fecham = date("m",strtotime($fecha));
$fechaa = date("Y",strtotime($fecha));
$meses = array("Enero", "Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
$nombre_mes = $meses[$fecham-1];
$fechaPHP = date("d/m/Y",strtotime($fecha));
*/

$fechaPHP = date("d/m/Y",strtotime($fecha));
$imagen1 = $hallazgo[0]["Archivo1"];
$imagen2 = $hallazgo[0]["Archivo2"];
$imagen3 = $hallazgo[0]["Archivo3"];

//$fecha = date("F j, Y",strtotime($fecha));
$cuerpoMail = "<!doctype html>
<html>
<head>
<meta charset=\"UTF-8\">
<title>Mail Detalles</title>
<link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"http://www.mockup.mx/webdesign/liverpool/experiencia/mystery/images/indicadores.ico\">
<link href=\"http://www.liverpoolrh.com.mx/experiencia/mystery/css/mail.css\" rel=\"stylesheet\" type=\"text/css\">
</head>

<body>

    <div class=\"mailCont\">
    
        <div class=\"mailheader\">
        <img src=\"http://www.mockup.mx/webdesign/liverpool/experiencia/mystery/images/experiencia-cliente.jpg\">
        <h1>Estimado Director / Gerente</h1>
        <p>Le informamos que en su evaluación de Mystery Shopper se encontro el siguiente hallazgo.</p>
        </div><!--mailheader-->
        
        <div class=\"sepparatorGap\">
        <p class=\"mailTienda\">".utf8_decode($hallazgo[0]["Almacen"])."</p> <p class=\"mailFecha\">".$fechaPHP."</p> <p class=\"mailHora\">12:03am</p>
        </div><!--sepparatorGap-->
        
        <div class=\"mailObsCont\">
        
        	<p class=\"mailObs\">Observaciones</p><p class=\"mailEvi\">Evidencias</p>
            
            <div class=\"mailRow\">
            
            	<div class=\"ObsCont\">
                	<textarea name=\"\" rows=\"4\" class=\"mailTextarea\" title=\"Comentarios\" readonly>".utf8_decode($hallazgo[0]["Comentario1"])."</textarea>
                    
                </div><!--ObsCont-->
                
                <div class=\"EviCont\">
               		<img src=\"http://liverpoolrh.com.mx/experiencia/mystery/uploads/".$imagen1."\">
                </div><!--ObsCont-->
                
            </div><!--mailRow-->";
            
			if ($hallazgo[0]["Comentario2"] != "")
            $cuerpoMail .= "<hr class=\"mailHR\">
            
            <div class=\"mailRow\">
            
            	<div class=\"ObsCont\">
                	<textarea name=\"\" rows=\"4\" class=\"mailTextarea\" title=\"Comentarios\" readonly>".utf8_decode($hallazgo[0]["Comentario2"])."</textarea>
                    
                </div><!--ObsCont-->
                
                <div class=\"EviCont\">
               		<img src=\"http://liverpoolrh.com.mx/experiencia/mystery/uploads/".$imagen2."\">
                </div><!--ObsCont-->
                
            </div><!--mailRow-->";
            
            if ($hallazgo[0]["Comentario3"] != "")
            $cuerpoMail .= "<hr class=\"mailHR\">
            
            <div class=\"mailRow\">
            
            	<div class=\"ObsCont\">
                	<textarea name=\"\" rows=\"4\" class=\"mailTextarea\" title=\"Comentarios\" readonly>".utf8_decode($hallazgo[0]["Comentario3"])."</textarea>
                    
                </div><!--ObsCont-->
                
                <div class=\"EviCont\">
               		<img src=\"http://liverpoolrh.com.mx/experiencia/mystery/uploads/".$imagen3."\">
                </div><!--ObsCont-->
                
            </div><!--mailRow-->";
            
            $cuerpoMail .= "
            
            
        </div><!--mailObsCont-->
        
        <div class=\"mailFooter\">
        <p>Esta información se encuentra publicada en el Portal de Experiencia del Cliente</p>
        <a href=\"http://www.liverpoolrh.com.mx/experiencia\">www.liverpoolrh.com.mx/experiencia</a>
        </div><!--mailFooter-->
        
        
    
    </div><!--mailCont-->

</body>
</html>";

return $cuerpoMail;
}

?>