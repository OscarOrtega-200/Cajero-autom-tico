<?php
//inicio del programa
echo "Ingrese el numero de la tarjeta: ";
$numerodetarjeta = readline();
echo "Ingrese la clave de la tarjeta: ";
$clave = readline();

if (verificartarjeta ($numerodetarjeta, $clave)){
     echo "Bienvenido al cajero automatico OFOR! \n";
     saldodelacuenta($numerodetarjeta);
    
} else {
    echo "Tarjeta o clave invalida, intente mas tarde";
}
//funcion para verificar la tarjeta
function verificartarjeta($numerodetarjeta, $clave ){
    //array con base de datos para la tarjeta de credito
    $tarjetavalida= array(
        "123456789" => "1234",
        "987654321" => "5678"
    );
    
    if (isset($tarjetavalida [$numerodetarjeta]) && $tarjetavalida [$numerodetarjeta] ==$clave){
        return true;
    } else {
        return false;

    }

}
//funcion para ver el saldo de la cuenta
function saldodelacuenta($numerodetarjeta){
    $saldo = 100000;
    echo "su saldo es de : $saldo";
   
}
    




?>
