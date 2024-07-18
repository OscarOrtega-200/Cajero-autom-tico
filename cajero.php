<?php
//inicio del programa
echo "Ingrese el numero de la tarjeta: ";
$numerodetarjeta = readline();
echo "Ingrese la clave de la tarjeta: ";
$clave = readline();

if (verificartarjeta ($numerodetarjeta, $clave)){
     echo "Bienvenido al cajero automatico OFOR! \n";

     echo "\n Seleccione una opción del monto a retirar: \n";
    echo "1. 10,000\n";
    echo "2. 20,000\n";
    echo "3. 50,000\n";
    echo "4. 100,000\n";
    echo "5. Otro monto\n";
    $opcion = readline();
    switch ($opcion){
        case 1:
            $montoarealizar = 10000;
            break;
            case 2:
            $montoarealizar = 20000;
            break;
            case 3:
            $montoarealizar = 50000;
            break;
            case 4:
            $montoarealizar = 100000;
            break;
            case 5:
            $montoarealizar = readline("Ingresa el valor a retirar: \n");
            break;
            default:
            echo "Opcion invalida. Intente de nuevo\n";
            exit;
            
    }
    $saldoInicial = 1000000;
    $saldo = retirardinero($numerodetarjeta, $montoarealizar, $saldoInicial);
    if ($saldo !== false){
    echo "\n ¿Desea ver su nuevo saldo si / no ? \n";
    $respuesta = readline();
    if( $respuesta == "si"){
      echo "Su nuevo saldo es : $saldo";

    }
    
    }
}else {
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
    $saldoinicial = 1000000;
    echo "su saldo es de : $saldoinicial";
}
//funcion para hacer un retiro de dinero
function retirardinero($numerodetarjeta, $montoarealizar, $saldoInicial){
    if ( $montoarealizar <= $saldoInicial){
        $saldo = $saldoInicial - $montoarealizar;
        echo "Retiro exitoso.";
        return $saldo;

    }else {
        echo "Saldo insuficiente . ¡ Hasta la próxima !.";
        return false;
    }
}
?>