<?php

class IntrebareModel
{
    function display_question($id)
    {
        $sql = 'SELECT text, score FROM question WHERE id = :id' ;
        $cerere = BD::obtine_conexiune()->prepare($sql);
        $cerere -> execute([
            'id' =>$id
        ]);
    }
}