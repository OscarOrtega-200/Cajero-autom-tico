<?php
//funcion para verificar la tarjeta
function verificartarjeta($numerodetarjeta, $clave ){
    //array con base de datos para la tarjeta de credito
    $tarjetavalida= array();
    
    if (isset($tarjetavalida [$numerodetarjeta]) && $tarjetavalida [$numerodetarjeta] ==$clave){
        return true;
    } else {
        return false;

    }

}
//inicio del programa
echo "Ingrese el numero de la tarjeta: ";
$numerodetarjeta = readline();
echo "Ingrese la clave de la atrjeta: ";
$clave = readline();

if (verificartarjeta ($numerodetarjeta, $clave))
echo "Bienvenido al cajero automático! OFOR" ;

else {
    echo "Tarjeta o clave invalida, intente mas tarde";
}



?>
