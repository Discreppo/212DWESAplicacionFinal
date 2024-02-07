<!--
        Descripción: 212DWESLoginLogoutMulticapaPOO -- vWIP.php
        Autor: Oscar Pascual Ferrero
        Fecha de creación/modificación: 04/02/2024
-->
<div class="text-center" style='padding: 20px'>
    <form method="post">
        <button class="btn btn-secondary" aria-disabled="true" type="submit" name="salirREST">Salir</button>
    </form>
</div>
<div class='row'>

    <div style='width: 49%' class='col'>
        <form name="apiREST" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <fieldset class='nasa'>
                <table>
                    <thead>
                        <tr>
                            <th class="rounded-top" colspan="3"><legend>IMAGEN DE LA NASA</legend></th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <!-- CodDepartamento Obligatorio -->
                            <td class="d-flex justify-content-start">
                                <label>Fecha de la Imagen:</label>
                            </td>
                            <td>
                                <!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                     comprobamos que exista la variable y no sea 'null'. En el caso verdadero devolveremos el contenido del campo
                                     que contiene '$_REQUEST' , en caso falso sobrescribirá el campo a '' .-->
                                <input class="obligatorio d-flex justify-content-start" type="date" name="fecha" value="<?php echo $_SESSION['fecha'] ?>" min="1995-06-16" max="<?php $hoy=date("Y-m-d"); echo $hoy;?>">
                            </td>
                            <td class="error">
                                <?php
                                if (!empty($aErrores['fecha'])) {
                                    echo $aErrores['fecha'];
                                }
                                ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no está vacío, si es así, mostramos el error. -->
                            </td>
                        </tr>
                        <tr>

                    <p class="card-text">API - INSTRUCCIONES DE USO</p>
                    <p class="card-text">
                        Muestra una imagen del espacio con un titulo y una breve descripción de una fecha concreta
                        que introducimos como parámetro.<br>
                        Requiere una APIKEY que se solicita en este enlace: <a href="https://api.nasa.gov/">https://api.nasa.gov/</a><br>
                        Enlace web de la API: https://api.nasa.gov/planetary/apod?api_key={$apiKey}&date={$fecha}<br>
                        Ejemplo:<br>
                        https://api.nasa.gov/planetary/apod?api_key=APIKEY&date=2024-01-31<br>
                        Devolvería la imagen de esa fecha.</p>

                    </tr>
                    </tbody>
                </table>
                <div class="text-center">
                    <button class="btn btn-secondary" aria-disabled="true" type="submit" name="nasa">Solicitar imagen</button>
                </div>
                <p><b>Descripcion:</b> <?php echo $explicacion; ?></p>
                <p><b>Titulo de la Imagen:</b> <?php echo $title; ?></p>
                <img src="<?php echo $imagen; ?>" />
            </fieldset>
        </form>
        <div class="row text-center">
            

        </div>
    </div>
    <div style='width: 49%' class='col'>
        <form name="apiREST" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <fieldset>
                <table>
                    <thead>
                        <tr>
                            <th class="rounded-top" colspan="3"><legend>IMAGEN DE LA NASA</legend></th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <!-- CodDepartamento Obligatorio -->
                            <td class="d-flex justify-content-start">
                                <label for="fechaImagen">Fecha de la Imagen:</label>
                            </td>
                            <td>
                                <!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                     comprobamos que exista la variable y no sea 'null'. En el caso verdadero devolveremos el contenido del campo
                                     que contiene '$_REQUEST' , en caso falso sobrescribirá el campo a '' .-->
                                <input class="obligatorio d-flex justify-content-start" type="date" name="fechaImagen"
                                       value="<?php echo (isset($_SESSION['fechaApi']) ? $_SESSION['fechaApi'] : ''); ?>">
                            </td>
                            <td class="error">
                                <?php
                                if (!empty($aErrores['fechaImagen'])) {
                                    echo $aErrores['fechaImagen'];
                                }
                                ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no está vacío, si es así, mostramos el error. -->
                            </td>
                        </tr>
                        <tr>

                    <p class="card-text">API - INSTRUCCIONES DE USO</p>
                    <p class="card-text">
                        Muestra una imagen del espacio con un titulo y una breve descripción de una fecha concreta
                        que introducimos como parámetro.<br>
                        Requiere una APIKEY que se solicita en este enlace: <a href="https://api.nasa.gov/">https://api.nasa.gov/</a><br>
                        Enlace web de la API: https://api.nasa.gov/planetary/apod?api_key={$apiKey}&date={$fecha}<br>
                        Ejemplo:<br>
                        https://api.nasa.gov/planetary/apod?api_key=APIKEY&date=2024-01-31<br>
                        Devolvería la imagen de esa fecha.</p>

                    </tr>
                    </tbody>
                </table>
                <div class="text-center">
                    <button class="btn btn-secondary" aria-disabled="true" type="submit" name="confirmarFechaREST">Solicitar imagen</button>                    
                </div>
            </fieldset>
        </form>
    </div>
    <div style='width: 49%;' class='col'>
        <p>WIP</p>
    </div>
</div>

