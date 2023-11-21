<form id="loginUser" action="api/loginUser.php" method="post" class=<?php if(isset($_SESSION['err']) && ($_SESSION['err'] == 4)) echo "formActive"; else echo "formInactive";?>>
    <div class="exit" id="exitCheck2" onclick="showForm(2)">
        <svg id="exit1" enable-background="new 0 0 30.001 30.001" height="30" viewBox="0 0 30.001 30.001" width="30">
            <g id="g1" transform="scale(0.05859375)">
                <path d="M 512.001,84.853 427.148,0 256.001,171.147 84.853,0 0,84.853 171.148,256 0,427.148 84.853,512.001 256.001,340.854 427.148,512.001 512.001,427.148 340.853,256 Z" id="path1"/>
            </g>
        </svg>
    </div>
    <div class="error">
        <?php
            if(isset($_SESSION['err']) && $_SESSION['err'] == 4){
                echo "Błędny login lub hasło!";
                unset($_SESSION['err']);
            }
        ?>
    </div>
    <div class="underLine"><input type="text" name="user" id="user1" required autocomplete="off" onkeyup="return forceLower(this);"><label for="user1"><span class="labelText">Nazwa na SPOJ'u</span></label></div>
    <div class="underLine"><input type="password" name="password" id="password1" required autocomplete="off"><label for="password1"><span class="labelText">Hasło (podane wcześniej)</span></label></div>
    <input type="submit" value="Zatwierdź">
</form>