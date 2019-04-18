<?php
/* Author:          Bibek Shrestha
 * Feature:         Account/MVP
 * Description:     A model class which represents user table of the db
 * Date Created:    March 31st, 2019
 * Last Modified:   April 17th, 2019
 * Recent Changes:  Create class
 */

class User {
  private $id, $first_name, $last_name, $email;

  public function __construct($first_name, $last_name, $email) {
    $this->setFirstName($first_name);
    $this->setLastName($last_name);
    $this->setEmail($email);
  }

  public function getFirstName() {
    return $this->first_name;
  }

  public function setFirstName($value) {
    $this->first_name = $value;
  }

  public function getLastName() {
    return $this->last_name;
  }

  public function setLastName($value) {
    $this->last_name = $value;
  }

  public function getEmail() {
    return $this->email;
  }

  public function setEmail($value) {
    $this->email = $value;
  }

  public function getId() {
    return $this->id;
  }

  public function setId($value) {
    $this->id = $value;
  }
}