<?php

// all logic for the To Do will be in this file
class ToDo extends Database
{
    //select all data from the database
    public function select()
    {
        $sql = "SELECT * FROM to_do_lists";

        // extends to DB class
        $result = $this->connect()->query($sql);

        if($result->rowCount() > 0){

            while ($row = $result->fetch()){
                //take all the records in DB and put them in an array named data
                $data[] = $row;
            }

            return $data;

        }
    }

    //create the insert logic to insert into the Database
    public function insert($input){

        //takes keys from user input and converts it to a string
        $joinColumns = implode(', ', array_keys($input));
        $joinPlaceholder = implode(", :", array_keys($input));

        $sql = "INSERT INTO to_do_lists ($joinColumns) VALUES (:".$joinPlaceholder.")";
        $pst = $this->connect()->prepare($sql);

        foreach($input as $key => $value){

            $pst->bindValue(':'.$key,$value);

        }

        $result = $pst->execute();
        //return $result;

        //redirects to the list
        if($result){
            header('Location: listtodo.php');
        }

    }

    //function to retrieve a SPECIFIC id 
    public function selectOne($id){

        $sql = "SELECT * FROM to_do_lists WHERE id = :id";
        $pst = $this->connect()->prepare($sql);
        $pst->bindValue(":id",$id);
        $pst->execute();
        $result = $pst->fetch(PDO::FETCH_ASSOC);
        return $result;

    }

    // function to edit my to do list
    public function update($input,$id){

        $statement = "";
        $counter = 1;
        $totalFields = count($input);
        foreach($input as $key => $value){
            if($counter === $totalFields){
                $set = "$key = :".$key;
                $statement = $statement.$set;
            } else {
                $set = "$key = :".$key.", ";
                $statement = $statement.$set;
                $counter++;
            }
        }

        $sql = "";
        $sql.= "UPDATE to_do_lists SET ".$statement;
        $sql.= " WHERE id = ".$id;

        $pst = $this->connect()->prepare($sql);
        foreach ($input as $key => $value){
            $pst->bindValue(":".$key, $value);
        }

        $result = $pst->execute();
        if($result){
            // change this to be a success page!
            header('Location: listtodo.php');
        }

    }

    // function to delete a to do list
    public function delete($id){
        $sql = "DELETE FROM to_do_lists WHERE id = :id";
        $pst = $this->connect()->prepare($sql);
        $pst->bindValue(":id", $id);
        $pst->execute();
    }

    public function handleErrors(){
        if(empty($title)){
            $_SESSION['errors["titleError"]'] = "You must include a title";
        } 

        if(empty($status)){
            $_SESSION['errors["statusError"]'] = "Do you want this list to be public or private? Please indicate";
        } 

        if(empty($description)){
            $_SESSION['errors["descriptionError"]'] = "You must include a description";
        } 

        header('Location:addtodo.php');
        exit();
    }

}