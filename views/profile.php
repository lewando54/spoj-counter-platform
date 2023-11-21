<?php
    @session_start();
    require '../libs/simple_html_dom/simple_html_dom.php';
        if(!isset($_SESSION['user'])){
            header("location: /");
            exit();
        }
    $html = file_get_html("http://pl.spoj.com/users/{$_SESSION['user']}");
    require '../components/header.php'; 
?>
<main class="flex col ali-ite-cent height-100 width-100">
    <article>
        <a href="<?php echo "http://pl.spoj.com/users/{$_SESSION['user']}"; ?>"><h1>Twój Profil na SPOJ'u</h1></a>
    </article>
    <article class="flex row jus-con-cent ali-ite-cent">
        <h2 style="margin-right: 10px">Ilość wykonanych zadań: <?php echo $_SESSION['score']; ?></h2>
        <a id="refresh" href="api/updateScore.php" class="flex jus-con-cent ali-ite-cent"><img id="refreshImg" src="assets/img/12337.png" alt="odśwież wynik" style="width: 24px"></a>
    </article>
    <section class="flex jus-con-cent ali-ite-cent width-100 col2 text-al-cent" style="margin-bottom: 45px">
        <div style="margin-left: 20px">
            <?php
                $profile = $html->find("#user-profile-left",0);
                foreach($profile->find("a") as $a)
                    $a->href = "http://pl.spoj.com".$a->href;
                echo $profile;
            ?>
        </div>
        <div class="flex jus-con-cent row wrap width-100 height-100">
            <?php
                $tabelka = $html->find('table', 1);
                foreach($tabelka->find('tr') as $wiersze){
                    foreach($wiersze->find('td') as $zadanie){
                        if($zadanie->plaintext != ""){
                            echo "<div style='border: 1px solid gray; width: 120px; display: flex; align-items: center; justify-content: center'>";
                            $zadanie->childNodes(0)->href = "http://pl.spoj.com".$zadanie->childNodes(0)->href;
                            echo $zadanie->childNodes(0);
                            echo "</div>";
                        }
                    }
                }
            ?>
        </div>
    </section>
</main>
<?php
    require '../components/checkScoreForm.php';
    require '../components/loginUserForm.php';
    require '../components/footer.php';
?>