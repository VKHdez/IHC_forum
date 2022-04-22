
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    
    <link href="src/css/main.css" rel="stylesheet" type="text/css">

    <title>PRISMA FORUM</title>
</head>

<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>


    <?php include('src/main/views/menu.php');?>

    <div class="container-fluid w-100" role="main">

        <div class="row mt-4 " style="height:100vh">
            <div class='col-1 text-center'>
                <i class="bi-chat btn btn-outline-success" style="font-size: 1.3rem;"></i>
                <i class="bi-chat btn btn-outline-info" style="font-size: 1.3rem;"></i>
                <i class="bi-vector-pen btn btn-outline-dark" style="font-size: 1.3rem;"></i>
            </div>
            
            <div class='col'>
                <h3>Resultados para ...</h3>
                <h2>  </h2>
            </div>

            <div class="col-2 border-left text-center">
                <h4>Relacionados</h4>
            </div>
        </div>

    
    
    </div>


    <footer class="position-absolute b-0 w-100 bg-light">
        <div class="text-center p-3">
            <p class="text-dark">FORO UNIVERSITARIO - Interacción Humano Computadora - Primavera 2022</p>
        </div>
    </footer>
</body>
</html>