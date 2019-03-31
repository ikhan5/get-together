<?php
class Login {
  private $id, $password_hash, $password_salt, $user_id;

  public function __construct($password_hash, $password_salt, $user_id) {
    $this->setPasswordHash($password_hash);
    $this->setPasswordSalt($password_salt);
    $this->setUserId($user_id);
  }

  public function getPasswordHash() {
    return $this->password_hash;
  }

  public function setPasswordHash($value) {
    $this->password_hash = $value;
  }

  public function getPasswordSalt() {
    return $this->password_salt;
  }

  public function setPasswordSalt($value) {
    $this->password_salt = $value;
  }

  public function getUserId() {
    return $this->user_id;
  }

  public function setUserId($value) {
    $this->user_id = $value;
  }

  public function getId() {
    return $this->id;
  }

  public function setId($value) {
    $this->id = $value;
  }
}