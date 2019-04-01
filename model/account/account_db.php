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

  public static function addUser($user) {
    $dbcon = Database::getDb();

    $first_name = $user->getFirstName();
    $last_name = $user->getLastName();
    $email = $user->getEmail();
    
    $tmp_usr = AccountDB::validateEmail($email);
    if($tmp_usr) {
      return "User with the email already exists";
    }

    $sql = "INSERT INTO users (first_name, last_name, email) 
          VALUES (:first_name, :last_name, :email) ";
    
    $pdostm = $dbcon->prepare($sql);
    $pdostm->bindParam(':first_name', $first_name);
    $pdostm->bindParam(':last_name', $last_name);
    $pdostm->bindParam(':email', $email);
    $pdostm->execute();
    $pdostm->closeCursor();
    
    $tmp_usr = AccountDB::validateEmail($email);
    return $tmp_usr->getId();
  }

  public static function addLogin($login) {
    $dbcon = Database::getDb();

    $password = $login->getPasswordHash();
    $salt = $login->getPasswordSalt();
    $user_id = $login->getUserId();

    $sql = "INSERT INTO logins (password_hash, password_salt, user_id) 
          VALUES (:password, :salt, :user_id) ";
    
    $pdostm = $dbcon->prepare($sql);
    $pdostm->bindParam(':password', $password);
    $pdostm->bindParam(':salt', $salt);
    $pdostm->bindParam(':user_id', $user_id);
    var_dump($pdostm);
    $status = $pdostm->execute();
    $pdostm->closeCursor();
    return $status;
  }

  public static function validateEmail($email) {
    $dbcon = Database::getDB();
    // var_dump($email);
    $sql = "SELECT * FROM users WHERE email = :email";
    $pdostm = $dbcon->prepare($sql);
    $pdostm->bindParam(':email', $email);
    $pdostm->execute();
    $row = $pdostm->fetch();
    $pdostm->closeCursor();
    
    // var_dump($row);
    
    if($row) {
      $user = new User($row['first_name'],$row['last_name'], $row['email']);
      $user->setId($row['id']);
      return $user;
    } else {
      return false;
    }
  }

  public static function validatePassword($user_id, $password) {
    $dbcon = Database::getDB();

    $sql = "SELECT * FROM logins WHERE user_id like :user_id";
    $pdostm = $dbcon->prepare($sql);
    $pdostm->bindParam(':user_id', $user_id);
    $pdostm->execute();
    $row = $pdostm->fetch();
    $pdostm->closeCursor();
    
    if($password == $row['password_hash']) {
      return true;
    } else {
      return false;
    }
  }

}