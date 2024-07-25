<?php
// Inicio del programa
echo "Ingrese el número de la tarjeta: ";
$numerodetarjeta = readline();
echo "Ingrese la clave de la tarjeta: ";
$clave = readline();

// Función para verificar la tarjeta
function verificartarjeta($numerodetarjeta, $clave) {
    // Array con base de datos para la tarjeta de crédito
    $tarjetavalida = array(
        "123456789" => "1234",
        "987654321" => "5678"
    );
    
    if (isset($tarjetavalida[$numerodetarjeta]) && $tarjetavalida[$numerodetarjeta] == $clave) {
        return true;
    } else {
        return false;
    }
}

// Función para ver el saldo de la cuenta
function saldodelacuenta($numerodetarjeta, $saldoInicial) {
    echo "Su saldo es de: $saldoInicial";
}

// Función para hacer un retiro de dinero
function retirardinero($numerodetarjeta, $montoarealizar, $saldoInicial) {
    if ($montoarealizar <= $saldoInicial) {
        $saldo = $saldoInicial - $montoarealizar;
        echo "Retiro exitoso.";
        return $saldo;
    } else {
        echo "Saldo insuficiente. ¡Hasta la próxima!";
        return false;
    }
}

// Función para depositar dinero
function depositardinero($numerodetarjeta, $montoadepositar, $saldoInicial) {
    $saldo = $saldoInicial + $montoadepositar;
    return $saldo;
}

// Verificar tarjeta
if (verificartarjeta($numerodetarjeta, $clave)) {
    echo "Bienvenido al cajero automático OFOR! \n";
    $saldoInicial = 1000000; // Asignar saldo inicial

    while (true) {
        echo "\n Seleccione una opción: \n";
        echo "1. Retirar dinero\n";
        echo "2. Verificar saldo\n";
        echo "3. Depositar dinero\n";
        echo "4. Salir\n";
        $opcion = readline();

        switch ($opcion) {
            case 1:
                echo "\n Seleccione una opción del monto a retirar: \n";
                echo "1. 10,000\n";
                echo "2. 20,000\n";
                echo "3. 50,000\n";
                echo "4. 100,000\n";
                echo "5. Otro monto\n";
                $opcionmonto = readline();
                switch ($opcionmonto) {
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
                        $montoarealizar = readline("Ingrese el valor a retirar: ");
                        break;
                    default:
                        echo "Opción inválida. Intente de nuevo\n";
                        break;
                }
                $saldo = retirardinero($numerodetarjeta, $montoarealizar, $saldoInicial);
                if ($saldo !== false) {
                    $saldoInicial = $saldo; // Actualizar saldo inicial
                    echo "\n ¿Desea ver su nuevo saldo? (si/no) \n";
                    $respuesta = readline();
                    if (strtolower($respuesta) == "si") {
                        saldodelacuenta($numerodetarjeta, $saldoInicial);
                    }
                }
                break;
            case 2:
                saldodelacuenta($numerodetarjeta, $saldoInicial);
                break;
            case 3:
                echo "\n ¿Cuánto dinero desea depositar? \n";
                $montoadepositar = readline();
                $saldoInicial = depositardinero($numerodetarjeta, $montoadepositar, $saldoInicial);
                echo "Depósito exitoso. Su nuevo saldo es: $saldoInicial\n";
                break;
            case 4:
                echo "Hasta luego!";
                exit;
            default:
                echo "Opción inválida. Intente de nuevo\n";
        }
    }
} else {
    echo "Tarjeta o clave inválida, intente más tarde";
}
?>