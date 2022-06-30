<?php

class qaw
{
    public $conn = NULL;

    function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "qaw";

        try {
        $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(PDOException $e) {
        echo $e->getMessage();
        }
    }

    function __destruct()
    {
        $conn = NULL;
    }

    function getUserByID($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM user WHERE id=?");
        $stmt->execute([$id]); 
        // $user = $stmt->fetch();

        // set the resulting array to associative
        // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    function getQuestionByID($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM question WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetchAll(); 
    }

    function insertComm($uid, $qid, $text)
    {
        $stmt1 = $this->conn->prepare("INSERT INTO `comment`(`question_id`, `text`) VALUES (?,?)");
        $stmt1->execute([$qid, $text]);
        $stmt2 = $this->conn->prepare("SELECT id FROM comment WHERE question_id=? AND text=?");
        $stmt2->execute([$qid, $text]);
        $id_comm = ($stmt2->fetch())['id'];
        $stmt3 = $this->conn->prepare("INSERT INTO `user_comment`(`user_id`, `comment_id`) VALUES (?,?)");
        $stmt3->execute([$uid, $id_comm]);
    }

    function changePassword($id, $p1, $p2)
    {
        if ($p1 !== $p2)
        {
            return 'Parolele nu corespund';
        }
        $stmt = $this->conn->prepare("UPDATE user SET password=? WHERE id=?");
        $stmt->execute([$p1, $id]);
    }

    function updateScore($id, $str)
    {
        if ($str == "upvote")
        {
            
            $stmt = $this->conn->prepare("UPDATE question SET score = score + 1 WHERE id = ?");
            $stmt->execute([$id]);
        }
        else if($str == "downvote")
        {
            $stmt = $this->conn->prepare("UPDATE question SET score = score - 1 WHERE id = ?");
            $stmt->execute([$id]);
        }
        
    }

    function displayComments($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM comment WHERE question_id=?");
        $stmt->execute([$id]);
        return $stmt->fetchAll(); 
    }

    function displayUsername($id)
    {
        $stmt = $this->conn->prepare("SELECT u.name FROM comment AS c JOIN question AS q ON c.question_id = q.id JOIN user AS u ON u.id = q.user_id WHERE q.id = ?");
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }

}