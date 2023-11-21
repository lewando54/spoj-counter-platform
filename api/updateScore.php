<?php
@session_start();
require '../libs/simple_html_dom/simple_html_dom.php';
require '../db.php';

if(isset($_SESSION['user'])){
    if($html = file_get_html("http://pl.spoj.com/users/{$_SESSION['user']}")){
            $score = 0;
            $tabelka = $html->find('table', 1);
            foreach($tabelka->find('tr') as $wiersze){
                foreach($wiersze->find('td') as $zadanie){
                    if($zadanie->plaintext != "")
                        $score = $score + 1;
                }
            }
            $spoj_db->query("UPDATE wyniki SET score=$score WHERE user='{$_SESSION['user']}'");
    }
    header("location: /spoj/profile/");
    
    exit();
}
header("location: /spoj/");

exit();
?>