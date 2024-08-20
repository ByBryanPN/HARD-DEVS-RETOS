<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>PILAS Y COLAS</title>
</head>

<body>
    <div class="container d-flex flex-row">
        <div class="bg-dark p-4 rounded text-white container d-flex flex-column justify-content-center align-items-center mt-5 w-2" style="max-width: 300px;">
            <form method="post">
                <div class="mb-3 text-center">
                    <label class="form-label">¿En qué podemos asistirle?</label>
                    <textarea class="form-control" type="text" name="solicitud"></textarea>
                    <div class="form-text">Su solicitud será atendida en un plazo de 24 horas.</div>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" name="btn-Agregar" class="btn btn-success text-white">Envíar</button>
                </div>
            </form>
        </div>
        <div class="container d-flex flex-column justify-content-center align-items-center mt-5 w-2" style="max-width: 300px;">
            <form method="post">
                <div class="btn-group m-2" role="group" aria-label="Basic example">
                    <button type="submit" name="btn-Visualizar" class="btn btn-primary">Visualizar</button>
                    <button type="submit" name="btn-Atender" class="btn btn-success">Atender</button>
                    <button type="submit" name="btn-Eliminar" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
            <table class="table">
                <thead class="bg-dark text-white text-center">
                    <tr>
                        <th scope="col">SOLICITUDES</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php include('logica.php'); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>