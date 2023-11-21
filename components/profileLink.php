<?php 
if(isset($_SESSION['user'])) {
    echo "
    <a href='profile/' class='profileLink'>
        <p>{$_SESSION['user']}</p>
        <img src='assets/img/pawn.png' alt='Obrazek awatara symbolizujący profil' style='width: 30px'>
    </a>
    ";
}
?>