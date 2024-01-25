<!DOCTYPE html>
<!--
        Descripción: 212DWESLoginLogoutMulticapaPOO -- layout.php
        Autor original: Carlos García Cachón
        Autor: Oscar Pascual Ferrero
        Fecha de creación/modificación: 17/01/2024
-->
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Oscar Pascual Ferrero">
        <meta name="description" content="212DWESLoginLogoutMulticapaPOO">
        <meta name="keywords" content="214DWESLoginLogoutMulticapaPOO, DWES">
        <meta name="generator" content="Apache NetBeans IDE 19">
        <meta name="generator" content="60">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Oscar Pascual Ferrero</title>
        <link rel="icon" type="image/jpg" href="webroot/media/images/favicon.ico"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="webroot/css/style.css">
        <style>
            button {
                all: unset;
            }
        </style>
    </head>

    <body>
        <header class="text-center">
            <h1>Aplicación LoginLogoutMulticapaPOO - <?php echo $aTitleLang[$_COOKIE['idioma']][$_SESSION['paginaEnCurso']]?></h1>
        </header>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <?php require_once $aView[$_COOKIE['idioma']][$_SESSION['paginaEnCurso']]; ?>
                    </div>
                </div>
            </div>
        </main>
        <footer class="position-fixed bottom-0 end-0">
            <div class="row text-center">
                <div class="footer-item">
                    <address>© <a href="../../index.html" target="_blank" style="color: white; text-decoration: none; background-color: lightgray">Oscar Pascual Ferrero</a>
                        IES LOS SAUCES 2023-24 </address>
                </div>
                <div class="footer-item">
                    <a href="../212DWESProyectoDWES/indexProyectoDWES.html" style="color: black; text-decoration: none; background-color: lightgray">Inicio</a>
                </div>
                <div class="footer-item">
                    <a href="https://github.com/Discreppo/212DWESLoginLogoutMulticapaPOO.git" target="_blank"><img
                            src="webroot/media/images/github.png" alt="LogoGitHub" /></a>
                </div>
            </div>
        </footer>

        <script src="webroot/bootstrap.bundle.min.js"
                integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    </body>

</html>

