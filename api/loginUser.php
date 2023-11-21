<?php
    @session_start();
    require '../libs/simple_html_dom/simple_html_dom.php';
    require '../db.php';

    if(isset($_POST['user']) && isset($_POST['password'])){
        if($result = $spoj_db->query("SELECT password, score FROM wyniki WHERE user='{$_POST['user']}'")){
            $row = $result->fetch_assoc();
            if(password_verify($_POST['password'], $row['password'])){
                $_SESSION['user'] = $_POST['user'];
                $_SESSION['score'] = $row['score'];
                
                header("location: /spoj/profile/");
                exit();
            }
            else{
                $_SESSION['err'] = 4;
                
                header("location: /spoj/");
                exit();
            }
        }
        else{
            $_SESSION['err'] = 4;
            
            header("location: /spoj/");
            exit();
        }
    }
    
    header("location: /spoj/");
?>