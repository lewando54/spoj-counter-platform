<!DOCTYPE html>
<html lang="pl" class="flex col ali-ite-cent width-100 height-100">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ranking SPOJ'a</title>
        <link rel="stylesheet" href="assets/css/style.css">
        <script src="assets/js/script.js" defer></script>
    </head>
    <body class="flex col ali-ite-cent width-100 height-100">
        <?php
            require 'profileLink.php';
        ?>
        <header class="flex row ali-ite-cent jus-con-cent wrap">
            <a href="/spoj/" class="flex jus-con-cent ali-ite-cent gap-1">
                <h4 class="margin-0">Ranking</h4>
                <img class="logo" src="assets/img/spoj.png" alt="logo spoja">
            </a>
        </header>
        <nav class="flex jus-con-cent ali-ite-cent width-100">
            <div id="nav-in-wrapper" class="flex row jus-con-cent ali-ite-cent width-25 height-100">
                <?php 
                    if(isset($_SESSION['user'])):
                ?>
                        <div onclick='showForm(0)' class='link-btn'><span class='link-btn-text'>Sprawdź swój wynik</span></div>
                        <a href='api/logout.php' class='link-btn'><span class='link-btn-text'>Wyloguj się</span></a>
                <?php 
                    else:
                ?>
                        <div onclick='showForm(0)' class='link-btn'><span class='link-btn-text'>Sprawdź swój wynik</span></div>
                        <div onclick='showForm(1)' class='link-btn'><span class='link-btn-text'>Zarejestruj się</span></div>
                        <div onclick='showForm(2)' class='link-btn'><span class='link-btn-text'>Zaloguj się</span></div>
                <?php
                    endif; 
                ?> 
            </div>
        </nav>
        <div id="menu-burger">
            <div id="top-line" class="line"></div>
            <div id="mid-line" class="line"></div>
            <div id="bot-line" class="line"></div>
        </div>