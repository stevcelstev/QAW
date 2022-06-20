<?php

class ProfilModel
{
    function pass_credentials($nume, $parola)
    {
        $sql = "SELECT username FROM user where password = :parola AND name = :username";
        $cerere = BD::obtine_conexiune()->prepare($sql);
        $cerere -> execute([
            'parola' =>$parola,
            'username' =>$nume
        ]);
    }

    function schimba_parola($nume, $newpass)
    {
        $sql = "UPDATE user SET  password = :parola where name = :username";
        $cerere = BD::obtine_conexiune()->prepare($sql);
        $cerere -> execute([
            'parola' =>$newpass,
            'username' =>$nume
        ]);
    }
}