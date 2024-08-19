<?php


if (isset($_POST['enviar'])) {

    $numero = $_POST['numero'];

    if ($numero != null and $numero != 0 and $numero != 1) {
        $resultados = Algoritmo_Criba($numero);

        echo"<div class='message-me'>
                    <h2> $numero  </h2>
                        </div>";

        foreach($resultados as $valores){

            echo "<div class='message-bot'>
                    <h2> $valores  </h2>
                        </div>"; 
        }
        
    }
    else if($numero = 0 || $numero = 1){

        echo"<div class='message-me'>
                    <h2> $numero  </h2>
                        </div>";

        echo "<div class='message-bot'>
                    <h2> </h2>
                        </div>"; 

    }
}

function Algoritmo_Criba($limite)
{

    $esPrimo = array_fill(0, $limite + 1, true);

    $esPrimo[0] = $esPrimo[1] = false;

    for ($i = 2; $i * $i <= $limite; $i++) {
        if ($esPrimo[$i]) {

            for ($j = $i * $i; $j <= $limite; $j += $i) {
                $esPrimo[$j] = false;
            }
        }
    }

    $primos = [];
    for ($i = 2; $i <= $limite; $i++) {
        if ($esPrimo[$i]) {
            $primos[] = $i;
        }
    }

    return $primos;
}
