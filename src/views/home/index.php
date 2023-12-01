<?php require_once $GLOBALS['src'] . 'includes/header/index.php' ;?>

<main class='home container-md'>
    <?php require_once $GLOBALS['src'] . 'components/navbar/index.php' ;?>

    <?php require_once $GLOBALS['src'] . 'components/aside/index.php' ;?>

    <div id='posts_cards' class="body">
        <div class="card-default">
            <div class="card-body d-flex flex-column justify-content-between">
                <p class="card-text">Select user...</p>
            </div>
        </div>
        <!-- insertar los post de usuario seleccionado -->
    </div>
</main>

<?php require_once $GLOBALS['src'] . 'components/modal/index.php' ;?>
<?php require_once $GLOBALS['src'] . 'components/footer/index.php' ;?>

<script>
    <?php require_once $GLOBALS['src'] . 'scripts/Models.js' ;?>

    <?php require_once $GLOBALS['src'] . 'scripts/aside.js' ;?>
</script>

<?php require_once $GLOBALS['src'] . 'includes/footer/index.php' ;?>

