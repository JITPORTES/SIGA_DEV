<?php 
// Imagen base64 enviada desde javascript en el formulario
// En este caso, con PHP plano podriamos obtenerla usando :
$baseFromJavascript = $_POST['base64'];
$baseFromJavascript = "data:image/png;base64,BBBFBfj42Pj4....";

// Nuestro base64 contiene un esquema Data URI (data:image/png;base64,)
// que necesitamos remover para poder guardar nuestra imagen
// Usa explode para dividir la cadena de texto en la , (coma)
$base_to_php = explode(',', $baseFromJavascript);
// El segundo item del array base_to_php contiene la información que necesitamos (base64 plano)
// y usar base64_decode para obtener la información binaria de la imagen
$data = base64_decode($base_to_php[1]);// BBBFBfj42Pj4....

// Proporciona una locación a la nueva imagen (con el nombre y formato especifico)
$filepath = "/../../../Archivos/QR_Temporal/image.png"; // or image.jpg

// Finalmente guarda la imágen en el directorio especificado y con la informacion dada
file_put_contents($filepath, $data);

?>