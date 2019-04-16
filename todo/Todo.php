<?php 

class Todo
{
    public function getAllTodo($event_id ,$dbcon)
    {
        $sql = "SELECT * FROM to_dos WHERE event_id=:event_id";
        $pst = $dbcon->prepare($sql);
        $pst->bindParam(':event_id', $event_id);
        $pst->execute();
        $task = $pst->fetchAll(PDO::FETCH_OBJ);

        return $task;
    }
    
    public function insertTodo($event_id, $task, $is_done, $db)
    {
        $sql = "INSERT INTO to_dos(event_id,task,is_done) 
        values(:event_id,:task,:is_done)";
        $pst = $db->prepare($sql);
        $pst->bindParam(':event_id', $event_id);
        $pst->bindParam(':task', $task);
        $pst->bindParam(':is_done', $is_done);
        $count = $pst->execute();

        if($count){
            header('location: index.php');
        }else{
            $message = 'Failed to add task';
        }
        return $message;
    }
    
    public function getTodoById($id, $db){
        $sql = "SELECT * FROM to_dos WHERE id = :id";
        $pst = $db->prepare($sql);

        $pst->bindParam(':id', $id, PDO::PARAM_INT);

        $pst->execute();

        $task =  $pst->fetch(PDO::FETCH_OBJ);

        return $task;
    }
    
    public function updateTodo($id, $is_done, $db){
        $sql = "UPDATE to_dos
                SET is_done = :is_done
                WHERE id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->bindParam(':is_done', $is_done);
        $count = $pst->execute();
        return $count;
    }
    
    public function deleteTodo($id, $db){
        $sql = "DELETE FROM to_dos WHERE id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();

        return $count;
    }
    
}