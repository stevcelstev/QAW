<?php
function load_head()
{ ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Stativa Vladut-Alexandru">
    <link rel="stylesheet" href="css/stiladdcomm.css" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <title>Adauga comentariu</title>
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
function load_logo()
{ ?>

<div class="textlogo">
    <h1>QAW</h1>
</div>

<?php } ?>

<?php
function load_main()
{ ?>

<main class="maincom">  
    <script>
        fetch("../intrebare.json")
            .then(response => response.json())
            .then(data => {
                console.log(data.comms.array)
                document.querySelector("#intrebare").innerText = data.question.string
            })
    </script>


    <?php 
            $comentariu = new Comment;
            $comentariu->display_comment(1);
        ?>
    <div>
        <div class="intreb">
            <p id="intrebare">
                <?php 
                    $qaw = new qaw;
                    $qinfo = $qaw->getQuestionByID(1);
                    // $qaw->insertComm(2, 1, 'Test, test, dar nu testez');
                    echo $qinfo[0]['text'];
                ?>
            </p>
        </div>
        <form action="#" class="com" method = "post">
            <div>
                <!-- Am sa adaug id-uri si nume pentru form si chestiile din el, dar deocamdata las asa -->
                <textarea name = "textcomm" cols="30" rows="10" maxlength="2048" required>
                </textarea>
            </div>
            <div>
                <input type="submit" name = "subcomm">
            </div>   
        </form>
    </div>       
</main>

<?php } ?>