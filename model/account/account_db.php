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
    
    $tmp_usr = AccountDB::validateEmail($email);
    if($tmp_usr) {
      return "User with the email already exist";
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
    if($tmp_usr) {
      return $tmp_usr->getId();
    }
  }

  public static function loginUser($login) {
    $dbcon = Database::getDb();

    $password = $login->getPasswordHash();
    $salt = $login->getPasswordSalt();
    $user_id = $login->getEmail();
    
    $tmp_usr = AccountDB::validateEmail($email);
    if($tmp_usr) {
      return "login with the email already exist";
    }

    $sql = "INSERT INTO logins (password_hash, password_salt, user_id) 
          VALUES (:password, :salt, :user_id) ";
    
    $pdostm = $dbcon->prepare($sql);
    $pdostm->bindParam(':first_name', $first_name);
    $pdostm->bindParam(':last_name', $last_name);
    $pdostm->bindParam(':email', $email);
    $pdostm->execute();
    $pdostm->closeCursor();
    
    $tmp_usr = AccountDB::validateEmail($email);
    if($tmp_usr) {
      return $tmp_usr->getId();
    }
  }

  public static function validateEmail($email) {
    $dbcon = Database::getDB();

    $sql = "SELECT * FROM users WHERE email like :email";
    $pdostm = $dbcon->prepare($sql);
    $pdostm->bindParam(':email', $email);
    $pdostm->execute();
    $row = $pdostm->fetch();
    $pdostm->closeCursor();
    
    if($row) {
      $user = new User($row['first_name'],$row['last_name'], $row['email']);
      return $user;
    } else {
      return false;
    }
  }

  public static function validatePassword($password) {
    $dbcon = Database::getDB();

    $sql = "SELECT * FROM users WHERE email like :email";
    $pdostm = $dbcon->prepare($sql);
    $pdostm->bindParam(':email', $email);
    $pdostm->execute();
    $row = $pdostm->fetch();
    $pdostm->closeCursor();
    
    if($row) {
      $user = new User($row['first_name'],$row['last_name'], $row['email']);
      return $user;
    } else {
      return false;
    }
  }

}