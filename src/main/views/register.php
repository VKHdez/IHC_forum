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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

    <?php include('src/main/views/menu.php'); ?>

    <main>
        <div class="d-flex flex-column align-items-center justify-content-center" style="height:100vh; background-color:#4d5869;">
            <div class="container p-4" style="background-color:#fff; border-radius:20px; width:350px; ">
                <h5 class='mt-3' style="margin-bottom:40px"> <strong>REGISTRARSE</strong> </h5>

                <form action="<?php echo (constant('URL') . '/register/newUser'); ?>" method='post' class='w-100'>
                    <input class=' form-control w-100 rounded-pill' type='text' placeholder='nickname' name='nickname' required /> <br>
                    <input class=' form-control w-100 rounded-pill' type='text' placeholder='email' name='email' required /> <br>
                    <input class=' form-control w-100 rounded-pill' type='password' placeholder='pass' name='password' required /> <br>

                    <div class="d-flex justify-content-around">
                        <a class=' btn btn-link' href="main"> < Inicio</a>
                        <input class=' btn text-white' type='submit' value='Registrarse' style="background-color:#4BB6CD;"/>
                    </div>
                    
                </form>
            </div>
        </div>
    </main>

    <footer class="position-absolute b-0 w-100 bg-light">
        <div class="text-center p-3">
            <p class="text-dark">FORO UNIVERSITARIO - Interacción Humano Computadora - Primavera 2022</p>
        </div>
    </footer>
</body>
</html>