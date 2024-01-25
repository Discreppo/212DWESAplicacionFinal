<!--
        Descripción: 212DWESLoginLogoutMulticapaPOO -- vInicioPublico.php
        Autor original: Carlos García Cachón
        Autor: Oscar Pascual Ferrero
        Fecha de creación/modificación: 17/01/2024
-->
<div class="container mt-3">
    <div class="row mb-5">
        <div class="col text-center">
            <form class="opcionesDelIdioma">
                <button type="submit" value="UK" name="botonIdioma"><img src="doc/icono_UK.png" class="img-fluid" alt="Bandera_UK"></button>
                <button type="submit" value="JP" name="botonIdioma"><img src="doc/icono_JP.png" class="img-fluid" alt="Bandera_JP"></button>
                <button type="submit" value="SP" name="botonIdioma"><img src="doc/icono_SP.png" class="img-fluid" alt="Bandera_SP"></button>
            </form>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col text-center">
            <img src="doc/esquemaApp.PNG" class="img-fluid" alt="Mapeo de la Aplicación">
        </div>
    </div>
    <div class="row">
        <div class="col text-center">
            <form method="post" action="indexLoginLogoutMulticapaPOO.php">
                <button class="btn btn-secondary" type="submit" name="login">Login</button>
            </form>
        </div>
    </div>
</div>