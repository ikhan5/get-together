<?php
/* Author:          Bibek Shrestha
 * Feature:         Account/MVP
 * Description:     A model class which represents role table of the db
 * Date Created:    March 31st, 2019
 * Last Modified:   April 17th, 2019
 * Recent Changes:  Create class
 */

class Role {
  private $id, $type, $description;

  public function __construct($type, $description) {
    $this->setType($type);
    $this->setDescription($description);
  }

  public function getType() {
    return $this->type;
  }

  public function setType($value) {
    $this->type = $value;
  }

  public function getDescription() {
    return $this->description;
  }

  public function setDescription($value) {
    $this->description = $value;
  }

  public function getId() {
    return $this->id;
  }

  public function setId($value) {
    $this->id = $value;
  }
}