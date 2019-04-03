<?php
class Login {
  private $id, $password_hash, $user_id;

  public function __construct($password_hash, $user_id) {
    $this->setPasswordHash($password_hash);
    $this->setUserId($user_id);
  }

  public function getPasswordHash() {
    return $this->password_hash;
  }

  public function setPasswordHash($value) {
    $this->password_hash = $value;
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