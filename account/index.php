<?php
require_once('../model/database.php');
require_once('../model/account/login.php');
require_once('../model/account/role_user.php');
require_once('../model/account/role.php');
require_once('../model/account/user.php');
require_once('../model/account/account_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == null) {
  $action = filter_input(INPUT_GET, 'action');
  if ($action == null) {
    $action = 'list_users';
  }
}

if ($action == 'list_users') {
  $users = AccountDB::getAllUsers();
  include('list_users.php');
} else if ($action == 'show_add_form') {
  header('Location: ./login_register.php');
} else if ($action == 'register_user') {
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
    $first_name = explode(' ',$name)[0];
    $tmp_name = explode(' ',$name);
    $last_name = end($tmp_name);
    $user = new User($first_name, $last_name, $email);
    $reg_status = AccountDB::registerUser($user);
    if ($reg_status == 'User with the email already exist') {
      $error = $reg_status;
      include('errors\customError.php');
      exit();
    } else if (intval($reg_status)) {
      $user_id = intval($reg_status);
    } else {
      $error = 'There was an error during registration';
      include('errors\customError.php');
      exit();
    }

    $login = new Login($password, $password, $user_id);
    $login_status = AccountDB::loginUser($login);
    
    
    
    // else {
    //   header('Location: ./index.php');
    // }
  }
} else if ($action == 'login_user') {
  $email = filter_input(INPUT_POST, 'user-name', FILTER_SANITIZE_EMAIL);
  $password = filter_input(INPUT_POST, 'user-password');

  // Getting user with the email
  $user = AccountDB::validateEmail($email);
  $user_id = $user->getId();
}