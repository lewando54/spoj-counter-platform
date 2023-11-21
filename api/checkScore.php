<?php
    @session_start();
    require '../libs/simple_html_dom/simple_html_dom.php';

    if(isset($_SESSION['user'])){
        header("location: index.php");
        exit();
    }

    if($html = file_get_html("http://pl.spoj.com/users/{$_POST['user']}")){
        $h3 = $html->find('h3.top-4.text-center', 0);
        if($h3->plaintext == "Problems"){
            $score = 0;
            $tabelka = $html->find('table', 1);
            foreach($tabelka->find('tr') as $wiersze){
                foreach($wiersze->find('td') as $zadanie){
                    if($zadanie->plaintext != "")
                        $score = $score + 1;
                }
            }
            echo "<section><h1>Twoja ilość zadań to: {$score}</h1></section>";
            exit();
        }
        else if($h3 == null){
            $_SESSION['err'] = 3;
            header("location: index.php");
            exit();
        }
    }

    $_SESSION['err'] = 3;
    header("location: index.php");
    exit();
?>