<?php
include("./conexion/conexion.php");

$TextoFinal = '';

function moverEnAlfabeto($TextoInicial, $numero) {
    $TextoFinal = '';
    $TextoInicial = strtoupper($TextoInicial); //Permite dejar todo el texto en mayuscula para que sea mas sencillo el movimiento números

    for ($i = 0; $i < strlen($TextoInicial); $i++) { //para determinar cuantos caracteres posee el string
        $caracter = $TextoInicial[$i];
        
        if (ctype_alpha($caracter)) { // Verifica si el carácter es una letra
            $nuevoCaracter = chr(((ord($caracter) - 65 + $numero) % 26) + 65);
            $TextoFinal .= $nuevoCaracter;
        } else {
            $TextoFinal .= $caracter; // Si no es una letra, conserva el carácter original
        }
    }

    return $TextoFinal;
}

if (isset($_POST['enviar'])) {
    $TextoInicial = $_POST['texto'];
    $numero = $_POST['numero'];
    $TextoFinal = moverEnAlfabeto($TextoInicial, $numero);
    
    $sql = "INSERT INTO textos VALUES ('$TextoInicial','$numero', '$TextoFinal')";
    $insertar= mysqli_query($conn,$sql);
}    
echo "$TextoFinal";

?>
