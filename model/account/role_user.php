<?php
/* Author:          Bibek Shrestha
 * Feature:         Account/MVP
 * Description:     A model class which represents role_user table of the db
 * Date Created:    March 31st, 2019
 * Last Modified:   April 17th, 2019
 * Recent Changes:  Create class
 */

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