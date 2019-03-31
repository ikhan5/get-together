<?php
class RoleUser {
  private $id, $userId, $roleId;

  public function __construct($userId, $roleId) {
    $this->setUserId($userId);
    $this->setRoleId($roleId);
  }

  public function getUserId() {
    return $this->userId;
  }

  public function setUserId($value) {
    $this->userId = $value;
  }

  public function getRoleId() {
    return $this->roleId;
  }

  public function setRoleId($value) {
    $this->roleId = $value;
  }

  public function getId() {
    return $this->id;
  }
}