<?php

// Representación del laberinto
$laberinto = [
    [1, 1, 0, 0,0],
    [0, 1, 0, 1,0],
    [1, 1, 1, 1,0],
    [1, 0, 0, 1,0],
    [1, 0, 0, 1,1]
];
// Tamaño del laberinto
$N = count($laberinto);
   
// Matriz de solución
$solucion = array_fill(0, $N, array_fill(0, $N, 0));

// Función para comprobar si una celda es válida
function esValido($laberinto, $x, $y) {
    global $N;
    return ($x >= 0 && $x < $N && $y >= 0 && $y < $N && $laberinto[$x][$y] == 1);
}

// Función para resolver el laberinto utilizando backtracking
function resolverLaberinto($laberinto, $x, $y, &$solucion) {
    global $N;

    // Si llegamos a la meta (última celda)
    if ($x == $N - 1 && $y == $N - 1) {
        $solucion[$x][$y] = 1;
        return true;
    }

    // Comprobar si podemos movernos a la posición (x, y)
    if (esValido($laberinto, $x, $y)) {
        // Marcar esta celda como parte de la solución
        $solucion[$x][$y] = 1;

        // Moverse hacia la derecha
        if (resolverLaberinto($laberinto, $x + 1, $y, $solucion)) {
            return true;
        }

        // Moverse hacia abajo
        if (resolverLaberinto($laberinto, $x, $y + 1, $solucion)) {
            return true;
        }

        // Moverse hacia la izquierda
        if (resolverLaberinto($laberinto, $x - 1, $y, $solucion)) {
            return true;
        }

        // Moverse hacia arriba
        if (resolverLaberinto($laberinto, $x, $y - 1, $solucion)) {
            return true;
        }

        // Si ninguno de los movimientos funciona, desmarcar la celda (backtrack)
        $solucion[$x][$y] = 0;
        return false;
    }

    return false;
}

// Función para imprimir la solución
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
            $color = 'white'; // Color de fondo para caminos transitables
            if ($valor == 0) {
                $color = 'black'; // Color de fondo para paredes
            }
            if ($solucion[$x][$y] == 1) {
                $color = 'green'; // Color para el camino de la solución
            }
            echo "<td style='width: 30px; height: 30px; background-color: $color; border: 1px solid #999;'></td>";
        }
        echo '</tr>';
    }
    echo '</table>';
    echo '</div>';
}

// Imprimir el laberinto con el camino de la solución
echo '<br><h1>LABERINTO:</h1><br>';
imprimirLaberinto($laberinto, $solucion);

// Resolver el laberinto
if (resolverLaberinto($laberinto, 0, 0, $solucion)) {
    echo '<br><h1>LABERINTO SOLUCIÓN:</h1><br>';
    imprimirLaberinto($laberinto, $solucion);
    imprimirSolucion($solucion);
} else {
    echo "No hay solución disponible";
}


?>
