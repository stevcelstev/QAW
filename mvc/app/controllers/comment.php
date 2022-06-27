<?php

class Comment extends Controller
{
    public function index($name = '')
    {
        $user = $this->model('ComentariuModel');
        $user->name = $name;
        
        $this->view('adauga_comment/adauga_comment_layout', ['name' => $user->name]); 
    }

    function display_comment($id) 
    {
        $qaw = $this->model('Qaw');
        $qaw->getQuestionByID($id);
        
        if(isset($_POST['subcomm']) && !empty($_POST['textcomm']))
        {
            $comentariu = ltrim($_POST['textcomm']);
            $qaw->insertComm(2, $id, $comentariu);
        }
    }
}