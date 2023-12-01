<?php require_once $GLOBALS['src'] . 'includes/header/index.php' ;?>

<main class='container-md'>
    <?php require_once $GLOBALS['src'] . 'components/navbar/index.php' ;?>
    <h1 class="h1 mt-5 text-center">Preguntas y respuestas:</h1>
    <div class="d-flex justify-content-center">
        <div class="accordion accordion-flush mt-5 col-12 col-md-8" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Instalación
                </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        Para la realización del proyecto utilice:
                        <ul>
                            <li>
                                S.O: <code>ubuntu-22.04.3-live-server-amd64</code>
                            </li>
                            <li>PHP: <code>8.1.2-1ubuntu2.14</code></li>
                            <li>Composer: <code>2.6.5</code></li>
                            <li>Bootstrap CDN: <code>5.3.2</code></li>
                            <li>
                                <p>Docker: <code>24.0.6</code></p>
                                imagenes utilizadas: 
                                <ul>
                                    <li>nginx proxy manager: <code>jc21/nginx-proxy-manager:latest</code></li>
                                    <li>
                                        php + apache: <code>php:8.1-apache</code>
                                    </li>
                                    <li>mysql: <code>mysql:8.1</code></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    Dificultades
                </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    Dificultad
                    <ul>
                        <li>Alta:
                            <p>
                                Tuve muchas complicaciones con el almacenamiento de los archivos al servidor. Fue mi primera vez, al menos en PHP. <br>
                                Me topé con varios bugs que me pusieron contra las cuerdas, pero pude manejarlos de una manera bastante correcta.
                            </p>
                        </li>
                        <li>Media:
                            <p>Me tomé la libertad de armar el proyecto con POO y MVC. Fué algo engorroso inicialmente, pero con el pasar de las horas me fuí adaptando a éste patrón de diseño.</p>
                        </li>
                        <li>Fácil:
                            <p>
                                Lo que más fácil me resultó, fué la maquetación. Pero tampoco me pareció tan complicado PHP alemenos hasta dónde me interioricé, siendo que es mi primer contacto real con éste lenguaje. El tener bastantes similitudes con Javascript me ayudó bastante.

                            </p>
                        </li>
                    </ul>
                </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    Clase usada para el modelo User
                </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                   <code>
                    <?php highlight_file($GLOBALS['src'] . 'models/User.php');?>
                   </code>
                </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                    Instalación dependencia php-kint/kint
                </button>
                </h2>
                <div id="flush-collapseFour" class="accordion-collapse collapse <?php echo (isset($_GET['click']) ? 'show' : '');?>" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    command:
                   <code>
                        composer require kint-php/kint --dev
                   </code>
                   <p class='mt-3'>
                       <a href="?click=true" class='btn btn-primary'>Ejecutar dependencia</a>
                   </p>
                   <p class='kint'>
                    <?php 
                        use Src\models\User;
                        if((isset($_GET['click']))){
                            User::kint();  
                        }
                    ;?>
                   </p>
                </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require_once $GLOBALS['src'] . 'components/footer/index.php' ;?>

<?php require_once $GLOBALS['src'] . 'includes/footer/index.php' ;?>