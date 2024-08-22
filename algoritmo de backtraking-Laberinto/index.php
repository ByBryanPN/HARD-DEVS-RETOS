<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Algoritmo Backtraking</title>
</head>
<style>
    .container {
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        font-family: 'Courier New', Courier, monospace;
        padding: 30px;

    }

    .table {
        border-radius: 50px;
        padding: 30px;
        background-color: #3F7FBF;
        width: 500px;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }

    .table input {
        font-size: 10px;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        width: 50px;

    }

    .form {
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        font-family: 'Courier New', Courier, monospace;

    }


    .input {
        border: none;
        outline: none;
        border-radius: 15px;
        padding: 1em;
        transition: 300ms ease-in-out;
    }

    .input:focus {
        background-color: white;
        transform: scale(1.05);

    }


    .button {
        appearance: button;
        background-color: #1899D6;
        border: solid transparent;
        border-radius: 16px;
        border-width: 0 0 4px;
        box-sizing: border-box;
        color: #FFFFFF;
        cursor: pointer;
        display: inline-block;
        font-size: 15px;
        font-weight: 700;
        letter-spacing: .8px;
        line-height: 20px;
        margin-top: 10px;
        outline: none;
        overflow: visible;
        padding: 13px 19px;
        text-align: center;
        text-transform: uppercase;
        touch-action: manipulation;
        transform: translateZ(0);
        transition: filter .2s;
        user-select: none;
        -webkit-user-select: none;
        vertical-align: middle;
        white-space: nowrap;
    }

    button:after {
        background-clip: padding-box;
        background-color: #1CB0F6;
        border: solid transparent;
        border-radius: 16px;
        border-width: 0 0 4px;
        bottom: -4px;
        content: "";
        left: 0;
        position: absolute;
        right: 0;
        top: 0;
        z-index: -1;
    }

    button:main,
    button:focus {
        user-select: auto;
    }

    button:hover:not(:disabled) {
        filter: brightness(1.1);
    }

    button:disabled {
        cursor: auto;
    }

    button:active:after {
        border-width: 0 0 0px;
    }

    button:active {
        padding-bottom: 10px;
    }
</style>

<div class="form">
    <form method="post">
        <h1>CONSTRUYE TU LABERINTO</h1>
        <h5>1 - camino // 0 - pared</h5>
        <table class="table">
            <tr>
                <td>
                    <select name="array[0][0]" class="input input-binary" placeholder="INICIO">
                        <option value="" disabled selected>INICIO</option>
                        <option value="1">Camino</option>
                        <option value="0">Pared</option>
                    </select>
                </td>
                <td>
                    <select name="array[0][1]" class="input input-binary">
                        <option value="" disabled selected></option>
                        <option value="1">Camino</option>
                        <option value="0">Pared</option>
                    </select>
                </td>
                <td>
                    <select name="array[0][2]" class="input input-binary">
                        <option value="" disabled selected></option>
                        <option value="1">Camino</option>
                        <option value="0">Pared</option>
                    </select>
                </td>
                <td>
                    <select name="array[0][3]" class="input input-binary">
                        <option value="" disabled selected></option>
                        <option value="1">Camino</option>
                        <option value="0">Pared</option>
                    </select>
                </td>
                <td>
                    <select name="array[0][4]" class="input input-binary">
                        <option value="" disabled selected></option>
                        <option value="1">Camino</option>
                        <option value="0">Pared</option>
                    </select>
                </td>
            </tr>
            <tr>

                <td>
                    <select name="array[1][0]" class="input input-binary">
                        <option value="" disabled selected></option>
                        <option value="1">Camino</option>
                        <option value="0">Pared</option>
                    </select>
                </td>
                <td>
                    <select name="array[1][1]" class="input input-binary">
                        <option value="" disabled selected></option>
                        <option value="1">Camino</option>
                        <option value="0">Pared</option>
                    </select>
                </td>
                <td>
                    <select name="array[1][2]" class="input input-binary">
                        <option value="" disabled selected></option>
                        <option value="1">Camino</option>
                        <option value="0">Pared</option>
                    </select>
                </td>
                <td>
                    <select name="array[1][3]" class="input input-binary">
                        <option value="" disabled selected></option>
                        <option value="1">Camino</option>
                        <option value="0">Pared</option>
                    </select>
                </td>
                <td>
                    <select name="array[1][4]" class="input input-binary">
                        <option value="" disabled selected></option>
                        <option value="1">Camino</option>
                        <option value="0">Pared</option>
                    </select>
                </td>
            </tr>
            <tr>

            <td>
                    <select name="array[2][0]" class="input input-binary">
                        <option value="" disabled selected></option>
                        <option value="1">Camino</option>
                        <option value="0">Pared</option>
                    </select>
                </td>
                <td>
                    <select name="array[2][1]" class="input input-binary">
                        <option value="" disabled selected></option>
                        <option value="1">Camino</option>
                        <option value="0">Pared</option>
                    </select>
                </td>
                <td>
                    <select name="array[2][2]" class="input input-binary">
                        <option value="" disabled selected></option>
                        <option value="1">Camino</option>
                        <option value="0">Pared</option>
                    </select>
                </td>
                <td>
                    <select name="array[2][3]" class="input input-binary">
                        <option value="" disabled selected></option>
                        <option value="1">Camino</option>
                        <option value="0">Pared</option>
                    </select>
                </td>
                <td>
                    <select name="array[2][4]" class="input input-binary">
                        <option value="" disabled selected></option>
                        <option value="1">Camino</option>
                        <option value="0">Pared</option>
                    </select>
                </td>
            <tr>

            <td>
                    <select name="array[3][0]" class="input input-binary">
                        <option value="" disabled selected></option>
                        <option value="1">Camino</option>
                        <option value="0">Pared</option>
                    </select>
                </td>
                <td>
                    <select name="array[3][1]" class="input input-binary">
                        <option value="" disabled selected></option>
                        <option value="1">Camino</option>
                        <option value="0">Pared</option>
                    </select>
                </td>
                <td>
                    <select name="array[3][2]" class="input input-binary">
                        <option value="" disabled selected></option>
                        <option value="1">Camino</option>
                        <option value="0">Pared</option>
                    </select>
                </td>
                <td>
                    <select name="array[3][3]" class="input input-binary">
                        <option value="" disabled selected></option>
                        <option value="1">Camino</option>
                        <option value="0">Pared</option>
                    </select>
                </td>
                <td>
                    <select name="array[3][4]" class="input input-binary">
                        <option value="" disabled selected></option>
                        <option value="1">Camino</option>
                        <option value="0">Pared</option>
                    </select>
                </td>
            </tr>
            <tr>

            <td>
                    <select name="array[4][0]" class="input input-binary">
                        <option value="" disabled selected></option>
                        <option value="1">Camino</option>
                        <option value="0">Pared</option>
                    </select>
                </td>
                <td>
                    <select name="array[4][1]" class="input input-binary">
                        <option value="" disabled selected></option>
                        <option value="1">Camino</option>
                        <option value="0">Pared</option>
                    </select>
                </td>
                <td>
                    <select name="array[4][2]" class="input input-binary">
                        <option value="" disabled selected></option>
                        <option value="1">Camino</option>
                        <option value="0">Pared</option>
                    </select>
                </td>
                <td>
                    <select name="array[4][3]" class="input input-binary">
                        <option value="" disabled selected></option>
                        <option value="1">Camino</option>
                        <option value="0">Pared</option>
                    </select>
                </td>
                <td>
                    <select name="array[4][4]" class="input input-binary">
                        <option value="" disabled selected>FINAL</option>
                        <option value="1">Camino</option>
                        <option value="0">Pared</option>
                    </select>
                </td>
            </tr>
            </tr>
        </table>
        <input class="button" type="submit" value="Enviar">
    </form>
</div>

<div class="container">
    <div>
        <?php include('logica.php'); ?>
    </div>
</div>
</body>
<script>
    const inputElements = document.querySelectorAll('.input-binary');


    inputElements.forEach(function(inputElement) {
        inputElement.addEventListener('input', function() {

            const inputValue = inputElement.value;


            if (inputValue === '1') {
                inputElement.style.backgroundColor = 'green';
            } else if (inputValue === '0') {
                inputElement.style.backgroundColor = '#996666';
            } else {
                inputElement.style.backgroundColor = '';
            }
        });
    });
</script>

</html>