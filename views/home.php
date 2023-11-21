<?php
    @session_start();
    require './db.php';

    require './components/header.php';
?>
<main class="flex col ali-ite-cent height-100 width-100">
    <article class="text-al-cent">
        <h1>Witaj na rankingu SPOJ'a!</h1>
        <table>
        <?php
            get_scores();
        ?>
        </table>
    </article>
</main>
<?php
    require './components/checkScoreForm.php';
    require './components/loginUserForm.php';
    require './components/footer.php';
?>
