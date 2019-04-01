<?php 

class Poll
{
    public function getAllPolls($dbcon){
        $sql = "SELECT * FROM poll";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();
        $polls = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $polls;
    } 

    public function getPollById($id, $db){
        $sql = "SELECT * FROM poll WHERE id = :id ";
        $ppoll = $db->prepare($sql);
        $ppoll->bindParam(':id', $id);
        $ppoll->execute();
        $poll =  $ppoll->fetch(PDO::FETCH_OBJ);

        return $poll;
    }

    public function addPoll($question, $answer, $db){
        $sql = "INSERT INTO poll (poll_question, poll_answer)
                VALUES (:poll_question, :poll_answer)";
        $ppoll = $db->prepare($sql);
        $ppoll->bindParam(':poll_question', $question);
        $ppoll->bindParam(':poll_answer', $answer);

        $result = $ppoll->execute();
        return $result;
    } 

    public function editPoll($id, $question, $answer, $db){
        $sql = "UPDATE poll 
                SET poll_question = :question, 
                poll_answer = :answer
                WHERE id = :id";
        $ppoll = $db->prepare($sql);
        $ppoll->bindParam(':id', $id);
        $ppoll->bindParam(':poll_question', $question);
        $ppoll->bindParam(':poll_answer', $answer);

        $result = $ppoll->execute();
        return $result;
    } 

    public function deletePoll($id, $db){
        $sql = "DELETE FROM poll WHERE id = :id";
        $ppoll = $db->prepare($sql);
        $ppoll->bindParam(':id', $id);

        $result = $ppoll->execute();
        return $result;
    }    
} 