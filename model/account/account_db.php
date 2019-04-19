<?php
/* Author:          Bibek Shrestha
 * Feature:         Account/MVP
 * Description:     A model class to handle all requests from account controller to the db
 * Date Created:    March 31st, 2019
 * Last Modified:   April 17th, 2019
 * Recent Changes:  fix bugs
 */

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

  public static function getUser($uid) {
    $dbcon = Database::getDb();
    $sql = "SELECT * FROM users WHERE id = :uid";
    $pdostm = $dbcon->prepare($sql);
    $pdostm->bindParam(':uid', $uid);
    $pdostm->execute();
    $user = $pdostm->fetch(PDO::FETCH_OBJ);
    $pdostm->closeCursor();
    return $user;
  }

  public static function addUser($user) {
    $dbcon = Database::getDb();

    $first_name = $user->getFirstName();
    $last_name = $user->getLastName();
    $email = $user->getEmail();
    
    $tmp_usr = AccountDB::validateEmail($email);
    if($tmp_usr) {
      return "User with the email already exists. Please log in to view your events.";
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
    $user_id = $login->getUserId();

    $sql = "INSERT INTO logins (password_hash, user_id) 
          VALUES (:password, :user_id) ";
    $pdostm = $dbcon->prepare($sql);
    $pdostm->bindParam(':password', $password);
    $pdostm->bindParam(':user_id', $user_id);
    $status = $pdostm->execute();
    $pdostm->closeCursor();
    return $status;
  }

  public static function addUserRole($user_id) {
    $dbcon = Database::getDb();

    $sql = "INSERT INTO roles_users (user_id, role_id) 
          VALUES (:user_id, 4) ";
    
    $pdostm = $dbcon->prepare($sql);
    $pdostm->bindParam(':user_id', $user_id);
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
    
    if(password_verify($password, $row['password_hash'])) {
      return true;
    } else {
      return false;
    }
  }

  public static function userRole($user_id){
    $dbcon = Database::getDB();

    $sql = "SELECT role_id FROM roles_users WHERE user_id = :user_id";
    $pdostm = $dbcon->prepare($sql);
    $pdostm->bindParam(':user_id', $user_id);
    $pdostm->execute();
    $row = $pdostm->fetch();
    $pdostm->closeCursor();

    switch ($row['role_id']) {
      case '1':
        return 'superadmin';
        break;
      
      case '2':
        return 'admin';
        break;

      case '3':
        return 'moderator';
        break;

      case '4':
        return 'user';
        break;
      default:
        break;
    }
  }

}