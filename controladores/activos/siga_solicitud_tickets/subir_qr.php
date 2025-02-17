<?php 
// Imagen base64 enviada desde javascript en el formulario
// En este caso, con PHP plano podriamos obtenerla usando :
$baseFromJavascript = $_POST['base64'];
$baseFromJavascript = "data:image/png;base64,BBBFBfj42Pj4....";

// Nuestro base64 contiene un esquema Data URI (data:image/png;base64,)
// que necesitamos remover para poder guardar nuestra imagen
// Usa explode para dividir la cadena de texto en la , (coma)
$base_to_php = explode(',', $baseFromJavascript);
// El segundo item del array base_to_php contiene la informaci�n que necesitamos (base64 plano)
// y usar base64_decode para obtener la informaci�n binaria de la imagen
$data = base64_decode($base_to_php[1]);// BBBFBfj42Pj4....

// Proporciona una locaci�n a la nueva imagen (con el nombre y formato especifico)
$filepath = "/../../../Archivos/QR_Temporal/image.png"; // or image.jpg

// Finalmente guarda la im�gen en el directorio especificado y con la informacion dada
file_put_contents($filepath, $data);

?>