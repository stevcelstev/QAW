<?php

class Profil extends Controller
{
    public function index($name = '')
    {
        $user = $this->model('ProfilModel');
        $user->name = $name;
        $this->view('profil/profil_layout', ['name' => $user->name]);
    }

    function change_pass()
    {
        if(isset($_POST['newpass']))
        {
            // $user = $_SESSION['username'];
            $user = 'Alex';
            $pass1 = $_POST['npass1'];
            $pass2 = $_POST['npass2'];

            if ($pass1 != $pass2)
            {
                echo("Parolele trebuie sa fie identice. Incercati din nou.");
                return ;
            }

            if (trim($pass1) == '' || trim($pass2) == '')
            {
                echo("Nu trebuie lasate spatii goale.");
                return ;
            }

            $mar = new ProfilModel();
            $usname = $mar->pass_credentials($user, $pass1);
            // if (count($usname) > 0)
            // {
            //     $mar->schimba_parola($user,$pass1);
            // }
        }
    }
}