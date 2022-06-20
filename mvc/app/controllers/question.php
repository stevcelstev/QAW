<?php

class Question extends Controller
{
    public function index($name = '')
    {
        $user = $this->model('IntrebareModel');
        $user->name = $name;

        $this->view('pagina_intrebare/pagina_intrebare_layout', ['name' => $user->name]);
    }

    function display_question()
    {
        // $id = $SESSION['question_id'];
        $ceva = new IntrebareModel();
        $ceva->display_question($id);

    }
}