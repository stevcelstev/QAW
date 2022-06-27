<?php

class Question extends Controller
{
    public $upvote = 0;
    public $downvote = 0;

    public function index($name = '')
    {
        $user = $this->model('IntrebareModel');
        $user->name = $name;

        $this->view('pagina_intrebare/pagina_intrebare_layout', ['name' => $user->name]);
    }

    function display_question($id) //functie pentru pagina unei intrebari
    {
        $qaw = $this->model('Qaw');
        $qaw->getUserByID($id);
        $qaw->getQuestionByID($id);
        $qaw->displayComments($id);
        if(isset($_POST['upvote_x']) && isset($_POST['upvote_y']) && $this->upvote === 0)
        {
            $this->upvote = 1;
            $this->downvote = 0;
            $qaw->updateScore($id, "upvote");
        }
        else if(isset($_POST['downvote_x']) && isset($_POST['downvote_y']) && $this->downvote === 0)
        {
            $this->upvote = 0;
            $this->downvote = 1;
            $qaw->updateScore($id, "downvote");
        }
    }

    

}