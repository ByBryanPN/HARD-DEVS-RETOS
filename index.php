<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formulario.css">
    <link rel="stylesheet" href="cuadro_informativo.css">

    <title>Criba de Eratóstenes</title>

</head>

<body>
    <div class="container">
        <div class="notification">
            <div class="notiglow"></div>
            <div class="notiborderglow"></div>
            <div class="notititle">Criba de Eratóstenes</div>
            <div class="notibody">Al ingresar un número, el algoritmo devolverá todos los números primos inferiores a este. 😎</div>
        </div>
        <form method="post">
            <div class="card">
                <div class="chat-header">Chat</div>
                <div class="chat-window">
                    <ul class="message-list">
                        
                        <?php include('logica.php'); ?>  
                                            
                    </ul>
                </div>
                <div class="chat-input">
                    <input type="number" class="message-input" placeholder="Escribe un número" name="numero">
                    <button class="send-button" type="submit" name="enviar">Envíar</button>
                </div>
            </div>
        </form>
    </div>

</body>



</html>