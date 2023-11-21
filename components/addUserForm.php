<form id="addScore" action="api/addUser.php" method="post" class=<?php if(isset($_SESSION['err']) && ($_SESSION['err'] == 1 || $_SESSION['err'] == 2)) echo "formActive"; else echo "formInactive";?>>
    <div class="exit" id="exitAdd" onclick="showForm(1)">
        <svg id="exit2" enable-background="new 0 0 30.001 30.001" height="30" viewBox="0 0 30.001 30.001" width="30">
            <g id="g2" transform="scale(0.05859375)">
                <path d="M 512.001,84.853 427.148,0 256.001,171.147 84.853,0 0,84.853 171.148,256 0,427.148 84.853,512.001 256.001,340.854 427.148,512.001 512.001,427.148 340.853,256 Z" id="path2"/>
            </g>
        </svg>
    </div>
    <div class="error">
        <?php
                if (isset($_SESSION['err']) && $_SESSION['err'] == 1){
                    echo "Użytkownik nie istnieje na SPOJ'u!";
                    unset($_SESSION['err']);
                }
                if(isset($_SESSION['err']) && $_SESSION['err'] == 2){
                    echo "Użytkownik jest już zapisany!";
                    unset($_SESSION['err']);
                }
        
        ?>
    </div>
    <div class="underLine"><input type="text" name="user" id="user3" required autocomplete="off" onkeyup="return forceLower(this);"><label for="user3"><span class="labelText">Nazwa na SPOJ'u</span></label></div>
    <div class="underLine"><input type="password" name="password" id="password2" required autocomplete="off"><label for="password2"><span class="labelText">Nowe Hasło</span></label></div>
    <div class="underLine"><input type="text" name="firstname" id="firstname" required autocomplete="off"><label for="firstname"><span class="labelText">Imię</span></label></div>
    <div class="underLine"><input type="text" name="lastname" id="lastname" required autocomplete="off"><label for="lastname"><span class="labelText">Nazwisko</span></label></div>
    <div class="underLine"><input type="text" name="klasa" id="klasa" required pattern="[1-5][ ]*[^0-9](\D+|[3-5]*)$" autocomplete="off"><label for="klasa"><span class="labelText">Klasa</span></label></div>
    <input type="submit" value="Zatwierdź">
</form>