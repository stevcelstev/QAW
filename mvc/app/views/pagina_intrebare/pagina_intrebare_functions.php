<?php
function load_head()
{ ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Stativa Vladut-Alexandru">
    <link rel="stylesheet" href="css/stilq.css" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <title>Pagina intrebare</title>
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

<!-- Aici am folosit id (pe langa clasa) pentru a putea lua raspunsurile din JSON -->
    <!-- Clasa "main" o folosesc pentru stilizare -->
    <main class="main" id="principal">
        <?php 
            // require '../../controllers/question.php';
            $intrebare = new Question;
            $intrebare->display_question(1);
            // $intrebare->update_score(1);
        ?>
        <!-- <script>
            fetch("../intrebare.json")
                .then(response => response.json())
                .then(data => {
                    console.log(data.comms.array)
                    document.querySelector("#intrebare").innerText = data.question.string
                    var rasp = "rasp"
                    for (var i = 1; i < 4; i++)
                    {
                        var number = (i).toString()
                        var stringul = rasp + number
                        var mainContainer = document.getElementById(stringul); 
                        var p = document.createElement("p");
                        p.innerHTML = data.comms.array[i - 1].string;
                        mainContainer.appendChild(p);
                    }                    
                })
        </script> -->

        <div>
            <div>
                <div class = "comsus">
                    <div>
                        <form action="#" method = 'post'>
                            <input type="image" src="images/upvote.png" name = "upvote" alt="Upvote" width="24" height="24">
                            <input type="image" src="images/downvote.png" name = "downvote" alt="Downvote" width="24" height="24">
                        </form>
                        <!-- <img src="images/upvote.png" alt="Upvote" width="24" height="24">
                        <img src="images/downvote.png" alt="Downvote" width="24" height="24"> -->
                    </div>
                    <div>
                        <?php
                            $qaw = new qaw;
                            $qinfo = $qaw->getQuestionByID(1); 
                            echo $qinfo[0]['score'];
                        ?>
                    </div>
                    <div class="imgcom">
                        <img src="images/profil.png" alt="Profil" width="32" height="32">
                        <p>
                            <?php 
                                 
                                 $userData = $qaw->getUserByID(1);
                                 echo $userData[0]['name'];
                            ?>
                        </p>
                    </div>
                    <div>
                        <p id="intrebare">
                            <?php
                                $cinfo = $qaw->displayComments(1);
                                echo $qinfo[0]['text'];
                            ?>
                        </p>
                    </div>
                </div>
                
                <div class="butjos">
                    <p>3 comentarii</p>
                    <div class="butoane">
                        <a href="">Raportează</a>
                    </div>
                    <div class="butoane">
                        <a href="../public/comment">Răspunde</a>
                    </div>     
                </div>
            </div>  
        </div>

        <?php 
        $n = sizeof($cinfo);
        $u = $qaw->displayUsername(1);
        for ($i = 0; $i < $n; $i++)
        {
            echo '<div>
            <div>
                <div class = "comsus">
                    <div>
                        <img src="images/upvote.png" alt="Upvote" width="24" height="24">
                        <img src="images/downvote.png" alt="Downvote" width="24" height="24">
                    </div>
                    <div class="imgcom">
                        <img src="images/profil.png" alt="Profil" width="32" height="32">
                        <p>';
                                // echo $userData[0]['name'];
                                echo $u[$i]['name'];
                       echo '</p>
                    </div>
                    <div id="rasp1">';
                        echo $cinfo[$i]['text'];
            echo 
                    '</div>
                </div>
                
                <div class="butjos">
                    <p>12 upvoturi</p>
                    <!-- <div class="butoane">
                        <a href="">Apreciază</a>
                    </div>
                    <div class="butoane">
                        <a href="">Depreciază</a>
                    </div>      -->
                    <div class="butoane">
                        <a href="">Raportează</a>
                    </div>
                </div>
            </div>  
        </div>';
        }

        ?>
        <!-- Aici se insereaza divurile cu comentariile la intrebare prin intermediul scriptului JS de mai sus facut de mine
        Deocamdata las asa, daca nu cumva casesc o solutie, dar in principiu comentariile vor avea o structura destul de asemanatoare cu cea a intrebarii -->
    </main>   
<?php } ?>