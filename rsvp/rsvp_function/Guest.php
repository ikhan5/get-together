<?php 

class Guest
{
    public function getAllGuests($dbcon,$eid)
    {
        $sql = "SELECT * FROM guestlist WHERE event_id = :eid ";
        $pst = $dbcon->prepare($sql);
        $pst->bindParam(':eid', $eid);
        $pst->execute();
        $guests = $pst->fetchAll(PDO::FETCH_OBJ);

        return $guests;
    }
    
    public function insertGuest($name,$email,$eid,$db)
    {
        $sql = "INSERT INTO guestlist(guest_name,guest_email,event_id) 
        values(:name,:email,:eid)";
        $pst = $db->prepare($sql);
        $pst->bindParam(':name', $name);
        $pst->bindParam(':email', $email);
        $pst->bindParam(':eid', $eid);
        $count = $pst->execute();

        if($count){
            header("Location: ../rsvp/?eid='$eid'");
        }else{
            $message = 'Failed...';
        }
        return $message;
    }
    
    public function getGuestById($id, $db){
        $sql = "SELECT * FROM guestlist WHERE guest_id = :id ";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);

        $pst->execute();

        $guest =  $pst->fetch(PDO::FETCH_OBJ);

        return $guest;
    }
    
    public function updateGuest($id, $name, $email, $db){
        $sql = "UPDATE guestlist
                SET guest_name = :name,
                guest_email = :email
                WHERE guest_id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->bindParam(':name', $name);
        $pst->bindParam(':email', $email);

        $count = $pst->execute();
        return $count;
    }
    
    public function deleteGuest($id, $db){
        $sql = "DELETE FROM guestlist WHERE guest_id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();

        return $count;
    }
    
}