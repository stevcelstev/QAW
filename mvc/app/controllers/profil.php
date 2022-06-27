<?php

class Profil extends Controller
{
    public function index($name = '')
    {
        $user = $this->model('ProfilModel');
        $user->name = $name;
        $this->view('profil/profil_layout', ['name' => $user->name]);
    }

    function display_userinfo($id)
    {
        $qaw = $this->model('Qaw');
        $qaw->getUserByID($id);
    }

    function user_password($id)
    {
        $qaw = $this->model('Qaw');
        if(isset($_POST['newpass']))
        {
            $npass1 = $_POST['npass1'];
            $npass2 = $_POST['npass2'];
            $qaw->changePassword($id, $npass1, $npass2);
        }
    }
}