<nav class='navbar navbar-expand-lg navbar-light bg-light top-0'>
    <a class='navbar-brand' href='main'>
        PRISMA FORUM
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class='collapse navbar-collapse display-flex justify-content-between' id='navbarSupportedContent'>
        <?php
        $session = new Session();

        if ($session->exists()) {
            echo "
                <ul class='navbar-nav mr-auto'>
                    <li class='nav-item active'>
                        <a class='nav-link' href='main' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>" . $session->getCurrentName() ."</a>
                    </li>
                    <li class='nav-item'>
                        <a href='#' class='nav-link '>Cerrar Sesión</a>
                    </li>
                </ul>
            "; 

        } else {
            echo "
            <div class=''>
                <a class='btn btn-light'   href='login'>Iniciar Sesión</a>
                <a class='btn btn-primary' href='register'>Registrarse</a>
            </div>
            ";
        }
        ?>
    </div>
</nav>


