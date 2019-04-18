<?php
/* Author:          Bibek Shrestha
 * Feature:         Account/MVP
 * Description:     Controller file for registration and login features.
 *                  All requests for the feature goes through this page.      
 * Date Created:    March 31st, 2019
 * Last Modified:   April 17th, 2019
 * Recent Changes:  Added code for guests who are invited to be able to register
 *                  and link it to the event they were invited
 */
session_start();
require_once('../model/database.php');
require_once('../model/account/login.php');
require_once('../model/account/role_user.php');
require_once('../model/account/role.php');
require_once('../model/account/user.php');
require_once('../model/account/account_db.php');
require_once('../model/event.php');
require_once('../model/event_user.php');
require_once('../model/event_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == null) {
  $action = filter_input(INPUT_GET, 'action');
  if ($action == null) {
    $action = 'list_users';
  }
}

$return_url = filter_input(INPUT_GET, 'return_url');

// echo($return_url);
// exit();

if ($action == 'list_users') {
  $users = AccountDB::getAllUsers();
  include('list_users.php');
} else if ($action == 'show_add_form') {
  if(isset($_GET['gid'])){
    $eid = $_GET['eid'];
    $gid = $_GET['gid'];
    $egid = $_GET['egid'];
    // if(!password_verify($gid, $egid)){
    //   include($_SERVER['DOCUMENT_ROOT'].'/errors/404Error.php');
    // }
  }
  include('./login_register.php');
} else if ($action == 'register_user') {
  $eid = filter_input(INPUT_POST, 'eid');
  $gid = filter_input(INPUT_POST, 'gid');
  $name = filter_input(INPUT_POST, 'user-name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $email = filter_input(INPUT_POST, 'user-email', FILTER_SANITIZE_EMAIL);
  $password = filter_input(INPUT_POST, 'user-password');
  $confirm_password = filter_input(INPUT_POST, 'user-confirm-password');

  if ($name == false || $email == false || $password == false || $confirm_password == false) {
    $error = "Incomplete data. Please enter information on all fields.";
    include($_SERVER['DOCUMENT_ROOT'].'/errors/customError.php');
  } else if ($password != $confirm_password) {
    $error = "Your passwords don't match";
    include($_SERVER['DOCUMENT_ROOT'].'/errors/customError.php');
  } else {
    $tmp_name = explode(' ',$name);
    $first_name = $tmp_name[0];
    $last_name = (sizeof($tmp_name)>1)? end($tmp_name): "";
    $user = new User($first_name, $last_name, $email);
    $reg_status = AccountDB::addUser($user);
    if ($reg_status == 'User with the email already exists. Please log in to view your events.') {
      $error = $reg_status;
      include($_SERVER['DOCUMENT_ROOT'].'/errors/customError.php');
      exit();
    } else if ($reg_status) {
      $user_id = intval($reg_status);
      // echo(intval($reg_status));
    } else {
      $error = 'There was an error during registration';
      include($_SERVER['DOCUMENT_ROOT'].'/errors/customError.php');
      exit();
    }

    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $login = new Login($password_hash, $user_id);
    $login_status = AccountDB::addLogin($login);
    

    if(!$login_status) {
      $error = 'There was an error during registration';
      include($_SERVER['DOCUMENT_ROOT'].'/errors/customError.php');
      exit();
    } else {
      $role_status = AccountDB::addUserRole($user_id);
      if (!$role_status){
        $error = 'There was an error during registration';
        include($_SERVER['DOCUMENT_ROOT'].'/errors/customError.php');
        exit();
      } else {
        if($gid){
          $event_user = new EventUser($user_id, $eid, 0, 1);
          EventDB::addEventUser($event_user);
        }
        $_SESSION['successmess'] = "You have successfully registered. You can login now.";
        header('Location: ./login_register.php');
      }
    }
  }
} else if ($action == 'login_user') {
  $eid = filter_input(INPUT_POST, 'eid');
  $gid = filter_input(INPUT_POST, 'gid');
  $email = filter_input(INPUT_POST, 'user-email', FILTER_SANITIZE_EMAIL);
  $password = filter_input(INPUT_POST, 'user-password');

  // Getting user with the email
  $user = AccountDB::validateEmail($email);
  if ($user) {
    $user_id = $user->getId();
  } else {
    $error = 'Invalid email';
    include($_SERVER['DOCUMENT_ROOT'].'/errors/customError.php');
    exit();
  }

  // verifying password
  $status = AccountDB::validatePassword($user_id, $password);
  if ($status) {
    $_SESSION['userid'] = $user_id;
    $_SESSION['username'] = $user->getFirstName()." ".$user->getLastName();

    $user_role = AccountDB::userRole($user_id);
    $_SESSION['userrole'] = $user_role;
    if($gid){
      $event_user = new EventUser($user_id, $eid, 0, 1);
      EventDB::addEventUser($event_user);
    }
    if(isset($return_url)){
      $url = $_SERVER['document_root'] . $return_url;
      header("Location: $url");
    } else {
      header('Location: /events');
    }
  } else {
    $error = 'Invalid email or password';
    include($_SERVER['DOCUMENT_ROOT'].'/errors/customError.php');
    exit();
  }
} else if ($action == 'logout_user') {
  unset($_SESSION['userid']);
  unset($_SESSION['username']);
  unset($_SESSION['userrole']);
  header('Location: /');
}