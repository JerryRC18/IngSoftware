<?php
    // We need to use sessions, so you should always start sessions using the below code.
    session_start();
    // If the user is not logged in redirect to the login page...
    if (!isset($_SESSION['usuario'])) {
        header('Location: index.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/bulma.min.css">
    <link rel="stylesheet" href="assets/css/styles4.css">
    <link rel="stylesheet" href="assets/css/material-design-iconic-font.css">
    <link rel="stylesheet" href="assets/css/styles3.css">
    
    <title>Servicios</title>
</head>

<body>
    <!-- Barra de navegación -->
    <header>
        <nav class="navbar-top">
            <ul class="navbar-top-ul">
                <li class="navbar-top-item">
                    <a href="#" class="navbar-top-links">
                        <i class="nav-menu-item"></i>
                    </a>
                </li>
            </ul>
        </nav>
            </header>
            <nav class="nav-menu" id="mySidenav">
                <a class="is-hidden-mobile brand is-uppercase has-text-weight-bold has-text-dark" href="servicios.php">SERVICIOS</a>
                <ul class="nav-menu-ul">
                <li class="nav-menu-item"><a href="php/contacto.php" class="nav-menu-link">CONTACTANOS</a></li>
                    <li class="nav-menu-item"><a href="php/nuevacita.php" class="nav-menu-link">NUEVA CITA</a></li>
                    <li class="nav-menu-item"><a href="php/historialcitas.php" class="nav-menu-link">HISTORIAL DE CITAS</a></li>
                    <li class="nav-menu-item"><a href="dentistas.php"  class="nav-menu-link">DENTISTAS</a></li>
                    <li class="nav-menu-item"><a href="php/cerrar_sesion.php" class="nav-menu-link">CERRAR SESION</a></li>
                </ul>
            </nav>
        </nav>

        </nav>
    </header>
    <div>
    <img class="imagen1"src="assets/images/blan1.jpg" alt="Blanqueamiento dental">
    
    <p>BLANQUEAMIENTO DENTAL DESDE $3000MXN<br>
    El blanqueamiento dental es un tratamiento cuyo objetivo es aclarar el color de los dientes, eliminando las manchas y la decoloración. Es el más popular de los tratamientos dentales estéticos.
    El blanqueamiento es más efectivo sobre las manchas extrínsecas o superficiales. Para mantener el color más brillante, el tratamiento debe de repetirse eventualmente, ya que no es un tratamiento que se realice una única vez.
    </p>
    <img src="assets/images/ort1.jpg" alt="ortodoncia">
    <p>ORTODONCIA desde $6000MXN<br>
    Mediante la aplicación de fuerzas para realizar pequeños movimientos en los dientes y los huesos maxilares, la ortodoncia nos sirve para asegurar una correcta posición de los dientes y un mejor funcionamiento de la mandíbula.
   Todo ello nos ayuda a establecer un correcto equilibrio morfológico y funcional de la cara y de la boca, mejorando la estética facial y el proceso de masticación.
   Además de lo estético, ella tiene el objetivo de proporcionar a las estructuras que forman el sistema masticatorio (articulaciones temporomandibulares, ligamentos, músculos, huesos, dientes y tejidos blandos) una estabilidad ortopédica/musculoesquelética, una correcta función oral a largo plazo y una función respiratoria óptimas.
    </p>
    <img src="assets/images/endo1.jpg" alt="endodoncia">
    <p>ENDODONCIA DESDE $2500MXN<br>
    La endodoncia es un procedimiento que tiene como finalidad preservar las piezas dentales dañadas, evitando así su pérdida. Para ello, se extrae la pulpa dental y la cavidad resultante, se rellena y sella con material inerte y biocompatible.
    </p>
    <img src="assets/images/extrac1.jpg" alt="extracciones">
    <P>EXTRACCIONES DENTALES DESDE $3000MXN<br> 
    La extracción dental es el procedimiento que realiza el odontólogo para extraer un diente de la encía. Este procedimiento se lleva a cabo cuando un diente no se puede recuperar, teniendo en cuenta la situación la cavidad bucal de cada persona.
También puede extraerse un diente que se encuentra situado en una mala posición y puede dañar a los dientes contiguos, como por ejemplo las extracciones que se hacen de las muelas del juicio.
    </P>
    <img src="assets/images/limp1.jpg" alt="limpieza">
    <P>LIMPIEZA DENTAL DESDE $1500MXN<br>
    La limpieza dental, también conocida como profilaxis, es aquella técnica que limpia todas esas zonas donde no llegas con tu cepillado normal. Es la base de la prevención de la odontología.
    Con la limpieza bucal mejoras tu sonrisa y evitas contraer enfermedades más graves como la gingivitis u otras enfermedades periodontales.
    </P>
    <img src="assets/images/perio1.jpg" alt="periodoncia">
    <P>PERIODONCIA DESDE $5000MXN<br>
    La periodoncia es el área de la Odontología que se encarga del estudio, prevención y tratamiento de aquellas patologías que afectan a los tejidos que protegen, rodean y sujetan los dientes: encía, hueso alveolar, ligamento periodontal y cemento radicular.
    Las lesiones periodontales se producen por la acumulación de bacterias, que ocasionan alteraciones del periodonto. Si no son tratadas, estas dolencias avanzan progresivamente, pudiendo provocar la caída de los dientes y diversas afecciones en nuestro organismo.
    </P>
    <img src="assets/images/resi1.jpg" alt="resinas">
    <P>RESINAS DESDE $3000MXN<br>
    Las resinas dentales son restauraciones estéticas de los dientes, que se pueden utilizar en dientes dañados o cariados en las cuales el material que se utiliza es precisamente la resina. Ésta se trabaja al color del diente, por lo que el resultado es una restauración cosmética y agradable.
    Las resinas dentales se utilizan como una alternativa estética en lugar de las amalgamas comunes y también pueden utilizarse para corregir fisuras y grietas.
    </P>

    
    </div>

</body>

</html>