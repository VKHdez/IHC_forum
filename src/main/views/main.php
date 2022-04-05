
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="src/css/main.css" rel="stylesheet" type="text/css">

    <title>PRISMA FORUM</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

    <?php include('src/main/views/menu.php');?>

    <main>
        <div class="d-flex flex-column align-items-center justify-content-center" style="height:100vh; background-color:#52a2bf;">
            <div class="container w-8" style="">
                <p class="fs-2 white mb-4 text-white">¿Que vas a estudiar hoy?</p>
                <form>
                    <div class="input-group mb-4">
                        <input type="text" class="form-control" placeholder="Aprendamos algo nuevo..." aria-describedby="button-addon2">
                    </div>
                </form>
            </div>
            <p class="text-white">Únete a miles de estudiantes y profesionales que comparten sus conocimientos con el mundo</p>
        </div>
    </main>

    <section>
        <div class="container mt-3">
            <p class="fs-4">TEMAS RECIENTES</p>
            <table class="table">
                <tbody>
                    <tr class="">
                        <td class="" ><strong>¿Cómo realizo un login en php & SQL Server?</strong></td>
                        <td class="">Saludos. Tengo un form en php pero ...</td>
                        <td class="">Añadido el 04 del 03 del 2022</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-3 mb-3">
            <a href="#" class="primary-link">Ver más...</a>
        </div>
    </section>
    <footer class="position-absolute b-0 w-100 bg-light">
        <div class="text-center p-3">
            <p class="text-dark">FORO UNIVERSITARIO - Interacción Humano Computadora - Primavera 2022</p>
        </div>
    </footer>
</body>
</html>