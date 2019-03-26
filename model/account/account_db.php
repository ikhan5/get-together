<?php

class AccountDB
{
  public static function getAllUsers() {
    $dbcon = Database::getDb();
    $sql = "SELECT * FROM users";
    $pdostm = $dbcon->prepare($sql);
    $pdostm->execute();
    $rows = $pdostm->fetchAll();
    $pdostm->closeCursor();
    $users = array();
    foreach($rows as $row){
      $user = new User($row['first_name'],$row['last_name'], $row['email']);
      $user->setId($row['id']);
      $users[] = $user;
    }
    return $users;
  }

  public static function registerUser($user) {
    $dbcon = Database::getDb();

    $first_name = $user->getFirstName();
    $last_name = $user->getLastName();
    $email = $user->getEmail();

    $sql = "INSERT INTO users (first_name, last_name, email) 
          VALUES (:first_name, :last_name, :email) ";
    
    $pdostm = $dbcon->prepare($sql);
    $pdostm->bindParam(':first_name', $first_name);
    $pdostm->bindParam(':last_name', $last_name);
    $pdostm->bindParam(':email', $email);
    $pdostm->execute();
    $pdostm->closeCursor();
  }

}