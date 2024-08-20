<?php

$supportSystem = new CustomerSupport();

$filename = "DB.txt";
$file = fopen($filename, "r");
if ($file!=null) {
    $contenido = fread($file, filesize($filename));
    fclose($file);
   $supportSystem->addRequest(nl2br($contenido));

} else {
    echo "No se pudo abrir el archivo para lectura.";
}


if (isset($_POST['btn-Visualizar'])) {
    $supportSystem->peekNextRequest();
}
if (isset($_POST['btn-Atender'])) {
    $supportSystem->processRequest();
}
if (isset($_POST['btn-Eliminar'])) {
    $supportSystem->undoLastAction();
}
if (isset($_POST['btn-Agregar'])) {
    $solicitud_cliente = $_POST['solicitud'];
    $filename = "DB.txt";
    $texto = $solicitud_cliente;
    $file = fopen($filename, "a");
    if ($file) {

        fwrite($file, $texto);
        fclose($file);

    } else {
        echo "No se pudo abrir el archivo para escritura.";
    }
}

































class Stack
{
    private $stack = array();

    public function push($item)
    {
        array_push($this->stack, $item);
    }

    public function pop()
    {
        if (!$this->isEmpty()) {
            return array_pop($this->stack);
        } else {
            return null;
        }
    }

    public function peek()
    {
        return end($this->stack);
    }

    public function isEmpty()
    {
        return empty($this->stack);
    }
}

class Queue
{
    private $queue = array();

    public function enqueue($item)
    {
        array_push($this->queue, $item);
    }

    public function dequeue()
    {
        if (!$this->isEmpty()) {
            return array_shift($this->queue);
        } else {
            return null;
        }
    }

    public function peek()
    {
        return reset($this->queue);
    }

    public function isEmpty()
    {
        return empty($this->queue);
    }
}

// Clase que gestiona el sistema de soporte al cliente
class CustomerSupport
{
    private $requestQueue;
    private $undoStack;

    public function __construct()
    {
        $this->requestQueue = new Queue();
        $this->undoStack = new Stack();
    }

    // Añadir una nueva solicitud de soporte
    public function addRequest($request)
    {
        $this->requestQueue->enqueue($request);
        $this->undoStack->push($request);
    }

    // Atender la siguiente solicitud en la cola
    public function processRequest()
    {
        $request = $this->requestQueue->dequeue();
        if ($request !== null) {
            $this->undoStack->push("Processed request: $request");
            echo "Solicitud atendida: $request\n";
        } else {
            echo "No hay solicitudes para atender.\n";
        }
    }

    // Deshacer la última acción realizada
    public function undoLastAction()
    {
        $action = $this->undoStack->pop();
        if ($action !== null) {
            echo "Acción deshecha: $action\n";
        } else {
            echo "No hay acciones para deshacer.\n";
        }
    }

    // Mostrar la siguiente solicitud en la cola
    public function peekNextRequest()
    {
        $nextRequest = $this->requestQueue->peek();
        if ($nextRequest !== null) {
            echo $nextRequest;
        } else {
            echo "No hay solicitudes en espera.\n";
        }
    }
}

// Simulación del sistema de soporte al cliente

/*
$supportSystem->addRequest("Solicitud 1");
$supportSystem->addRequest("Solicitud 2");
$supportSystem->addRequest("Solicitud 3");

$supportSystem->peekNextRequest(); // Muestra "Solicitud 1"

$supportSystem->processRequest();  // Atiende "Solicitud 1"
$supportSystem->processRequest();  // Atiende "Solicitud 2"

$supportSystem->undoLastAction();  // Deshace la acción de atender "Solicitud 2"

$supportSystem->peekNextRequest(); // Muestra "Solicitud 3"

$supportSystem->processRequest();  // Atiende "Solicitud 3"
$supportSystem->processRequest();  // No hay más solicitudes
*/




/*
class Pila
{
    private $Solicitudes = [];

    // Insertar un Solicitud en la pila (Push)
    public function Insertar($Solicitud)
    {   
        array_push($this->Solicitudes, $Solicitud);
    }

    // Eliminar el último Solicitud de la pila (Pop)
    public function Eliminar()
    {
        if (!$this->Verificar_Existencia_Solicitud()) {
            return array_pop($this->Solicitudes);
        }
        return null; // Si la pila está vacía, devolver null
    }

    // Ver el último Solicitud de la pila sin eliminarlo (Peek)
    public function Ver_Ultima_Solicitud()
    {
        return end($this->Solicitudes);
    }

    // Verificar si la pila está vacía
    public function Verificar_Existencia_Solicitud()
    {
        return empty($this->Solicitudes);
    }

    // Visualizar los Solicitudes de la pila
    public function Visualizar_Solicitud()
    {
        return $this->Solicitudes;
    }
}

class Cola {
    private $Cola = array();

    // Añadir un Solicitud al final de la cola
    public function enCola($item) {
        array_push($this->Cola, $item);
    }

    // Eliminar y devolver el primer Solicitud de la cola
    public function deCola() {
        if (!$this->isEmpty()) {
            return array_shift($this->Cola);
        } else {
            return null; // O manejar el caso de una cola vacía
        }
    }

    // Ver el primer Solicitud de la cola sin eliminarlo
    public function peek() {
        return reset($this->Cola);
    }

    // Verificar si la cola está vacía
    public function isEmpty() {
        return empty($this->Cola);
    }

    // Obtener el tamaño de la cola
    public function size() {
        return count($this->Cola);
    }
}

// Ejemplo de uso:
$Cola = new Cola();
$Cola->enCola(10);
$Cola->enCola(20);
$Cola->enCola(30);

echo $Cola->deCola(); // 10
echo $Cola->peek(); // 20
echo $Cola->size(); // 2
*/
