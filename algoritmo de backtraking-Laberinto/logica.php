<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $array = $_POST['array'];

    $laberinto = $array;

$N = count($laberinto);

$solucion = array_fill(0, $N, array_fill(0, $N, 0));


function esValido($laberinto, $x, $y) {
    global $N;
    return ($x >= 0 && $x < $N && $y >= 0 && $y < $N && $laberinto[$x][$y] == 1);
}


function resolverLaberinto($laberinto, $x, $y, &$solucion) {
    global $N;


    if ($x == $N - 1 && $y == $N - 1) {
        $solucion[$x][$y] = 1;
        return true;
    }

 
    if (esValido($laberinto, $x, $y)) {
 
        $solucion[$x][$y] = 1;

        
        if (resolverLaberinto($laberinto, $x + 1, $y, $solucion)) {
            return true;
        }


        if (resolverLaberinto($laberinto, $x, $y + 1, $solucion)) {
            return true;
        }

        
        if (resolverLaberinto($laberinto, $x - 1, $y, $solucion)) {
            return true;
        }


        if (resolverLaberinto($laberinto, $x, $y - 1, $solucion)) {
            return true;
        }

         
        $solucion[$x][$y] = 0;
        return false;
    }

    return false;
}


function imprimirSolucion($solucion) {
    $i=0;
    echo '<br><h1>SOLUCIÓN LÓGICA:</h1><br>';
    foreach ($solucion as $fila) {
        foreach ($fila as $valor) {
            $i++;
            
            if($i==5){
                if($valor==0){
                    echo "<input type='text' style='max-width: 100px; font-size: 20px; text-align: center;' value='$valor'> <br>";
                }else{
                    echo "<input type='text' style='max-width: 100px; font-size: 20px; text-align: center; background: #09ff05;' value='$valor'> <br>";        
                }
                $i=0;
            }else{
                if($valor==0){
                    echo "<input type='text' style='max-width: 100px; font-size: 20px; text-align: center;' value='$valor'>";
                }else{
                    echo "<input type='text' style='max-width: 100px; font-size: 20px; text-align: center; background: #09ff05;' value='$valor'>";        
                }
            }
            
        }
       
    }
}

function imprimirLaberinto($laberinto, $solucion) {
    
    echo '<div style="display: inline-block;">';
    echo '<table cellspacing="0" cellpadding="5">';
    foreach ($laberinto as $x => $fila) {
        echo '<tr>';
        foreach ($fila as $y => $valor) {
            $color = 'white'; 
            if ($valor == 0) {
                $color = 'black'; 
            }
            if ($solucion[$x][$y] == 1) {
                $color = 'green'; 
            }
            echo "<td style='width: 30px; height: 30px; background-color: $color; border: 1px solid #999;'></td>";
        }
        echo '</tr>';
    }
    echo '</table>';
    echo '</div>';
}


echo '<br><h1>LABERINTO:</h1><br>';
imprimirLaberinto($laberinto, $solucion);


if (resolverLaberinto($laberinto, 0, 0, $solucion)) {
    echo '<br><h1>LABERINTO SOLUCIÓN:</h1><br>';
    imprimirLaberinto($laberinto, $solucion);
    imprimirSolucion($solucion);
} else {
    echo "No hay solución disponible";
}

}
?>
