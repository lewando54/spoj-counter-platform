<?php
    @session_start();
    require '../libs/simple_html_dom/simple_html_dom.php';
    require '../db.php';

    if(isset($_POST['user']) && isset($_POST['password']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['klasa'])){
        $result = $spoj_db->query("SELECT COUNT(user) AS wynik FROM wyniki WHERE user='{$_POST['user']}'");
        $row = $result->fetch_assoc();
            if($row['wynik'] == 0){
                $html = file_get_html("http://pl.spoj.com/users/{$_POST['user']}");
                $h3 = $html->find('h3.top-4.text-center', 0);
                    if($h3->plaintext == "Problems"){
                        $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
                        $score = 0;
                        $tabelka = $html->find('table', 1);
                            foreach($tabelka->find('tr') as $wiersze){
                                foreach($wiersze->find('td') as $zadanie){
                                    if($zadanie->plaintext != "")
                                        $score = $score + 1;
                                }
                            }
                        $spoj_db->query("INSERT INTO wyniki VALUES (NULL, 
                            '{$_POST['user']}', 
                            '$pass', 
                            '{$_POST['firstname']}',
                            '{$_POST['lastname']}',
                            '{$_POST['klasa']}',
                            '$score')"
                            );
                        $_SESSION['score'] = $score;
                        $_SESSION['user'] = $_POST['user'];
                        
                        header("location: /spoj/");
                        exit();
                    }
                    else if($h3 == null){
                        $_SESSION['err'] = 1;
                        
                        header("location: /spoj/");
                        exit();
                    }
                }
            else{
                $_SESSION['err'] = 2;
                
                header("location: /spoj/");
                exit();
            }
    }
    
    header("location: /spoj/");
?>