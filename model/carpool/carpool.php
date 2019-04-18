<?php
/* Author:          Bibek Shrestha
 * Feature:         Carpool chat
 * Description:     A model class which represents carpool table of the db
 * Date Created:    April 6th, 2019
 * Last Modified:   April 17th, 2019
 * Recent Changes:  create class
 */
class CarpoolChat {
  private $id, $event_id, $file_name;

  public function __construct($event_id, $file_name) {
    $this->setEventId($event_id);
    $this->setFileName($file_name);
  }

  public function getEventId() {
    return $this->event_id;
  }

  public function setEventId($value) {
    $this->event_id = $value;
  }

  public function getFileName() {
    return $this->file_name;
  }

  public function setFileName($value) {
    $this->file_name = $value;
  }

  public function getId() {
    return $this->id;
  }

  public function setId($value) {
    $this->id = $value;
  }
}