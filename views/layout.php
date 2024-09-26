<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="icon" href="../build/img/logo.avif">
    <title>ESC</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../build/css/app.css">
    </head>
    <body class="p-3 m-0 border-0 bd-example m-0 border-0"> 

    <nav class="navbar navbar-dark p-0">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"><img width="60" height="60" src="../build/img/logo.png" alt="Logo"> E.E.S.T N1</a>
            <button class="navbar-toggler menu" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title text-white" id="offcanvasDarkNavbarLabel">Menu</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <hr class="text-white">
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/registro">Registro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
                
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                    </a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item text-white" href="#">Action</a></li>
                    <li><a class="dropdown-item text-white" href="#">Another action</a></li>
                    <li>
                        <hr class="dropdown-divider bg-white">
                    </li>
                    <li><a class="dropdown-item text-white" href="#">Something else here</a></li>
                    </ul>
                </li>
                </ul>
                <form class="d-flex mt-3" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-orange" type="submit">Search</button> -->
                </form>
            </div>
            </div>
        </div>
    </nav>
    <hr class="line-nav">

    <div id="loading" style="display: none;">
        <div class="spinner"></div>
    </div>

    <?= $contenido ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../build/js/index.js"></script>
      
  </body>
</html>