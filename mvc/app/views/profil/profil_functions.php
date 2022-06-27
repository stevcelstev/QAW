<?php
function load_head()
{ ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href = "css/stilprofil.css?v1.3" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <title>Profil</title>
</head>

<?php } ?>

<?php
function load_nav()
{ ?>

<nav>
    <ul class="navbar">
        <li>
            <!-- link catre home -->
            <a href="">
                <img src="images/home.png" alt="Home" height="32" width="32">
            </a>
        </li>
        <li>
            <!-- link catre pagina unde poti sa iti vezi intrebarile -->
            <a href="">
                <img src="images/intrebari.png" alt="Intrebari" height="32" width="32">
            </a>
        </li>
        <li>
            <!-- link catre pagina unde poti sa iti vezi raspunsurile -->
            <!-- vom vedea daca va ramane ca si functionalitate -->
            <a href="">
                <img src="images/raspunsuri.png" alt="Raspunsuri" height="32" width="32">
            </a>
        </li>
        <li>
            <a href="../public/profil">
                <img src="images/profil.png" alt="Profil" height="32" width="32">
            </a>             
        </li>
    </ul>
</nav>

<?php } ?>

<?php
function load_main()
{ ?>

<main>
    <div class = "profil">
        <div class ="upprof">
            <div>
                <img class="imgprof" src="images/profil.png" alt="Profil" height="100" width="100">
            </div>         
            <div class="textdreapta">
                <?php 
                    $profil = new Profil();
                    $profil->display_userinfo(1);
                    $profil->user_password(1);
                ?>
                <p class = "textprofil">
                    <?php 
                        $qaw = new qaw;
                        $userData = $qaw->getUserByID(1);
                        echo $userData[0]['name'];
                    ?>
                </p>
                <form action="#" method = "post">
                    <input type="password" name = "npass1" placeholder="new password" required>
                    <input type="password" name = "npass2" placeholder="retype password" required>
                    <input type="submit" name = "newpass" value="Modifica parola">
                </form>
                <p class="textprofil">
                    <?php 
                        echo $userData[0]['email'];
                    ?>
                </p>
                <p class="textprofil">
                    <?php 
                        echo $userData[0]['phone'];
                    ?>
                </p>
                <div class="divsubtext">
                    <p class="undertext">Badges</p>
                    <div>
                        <img src="images/curios.png" alt="Curios" title="Cel mai curios" height="32" width="32">
                        <img src="images/altruist.png" alt="Altruist" title="Utilizator altruist" height="32" width="32">
                        <img src="images/informat.png" alt="Informat" title="Cel mai informat" height="32" width="32">
                    </div>
                </div>
                <div>
                    <p class="undertext">Interests</p>
                    <div class="div_interese">
                        <p class="interese">Istorie</p>
                        <p class="interese">Literatură</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="jostext">
            <p class="undertext">Activity:</p>
            <div class="activitate">
                <p>Questions</p>
                <p>Comments</p>
                <p>Reports</p>
        </div> 
        </div>               
    </div>
</main>

<?php } ?>