<?php

class Comment extends Controller
{
    public function index($name = '')
    {
        $user = $this->model('ComentariuModel');
        $user->name = $name;
        
        $this->view('adauga_comment/adauga_comment_layout', ['name' => $user->name]); 
    }


}