<?php
/* Author:          Bibek Shrestha
 * Feature:         Events
 * Description:     A model class which represents event table of the db
 * Date Created:    March 4th, 2019
 * Last Modified:   March 22nd, 2019
 * Recent Changes:  fix bugs
 */

class Event {
    private $id, $title, $description, $location, $date, $start_time, $end_time;

    public function __construct($title, $description, $location, $date, $start_time, $end_time) {
        $this->setTitle($title);
        $this->setDescription($description);
        $this->setLocation($location);
        $this->setDate($date);
        $this->setStartTime($start_time);
        $this->setEndTime($end_time);
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($value){
        $this->date = $value;
    }

    public function getStartTime(){
        return $this->start_time;
    }

    public function getStartTimeDisp() {
        return date("g:i A", strtotime($this->start_time));
    }

    public function setStartTime($value){
        $this->start_time = $value;
    }

    public function getEndTime() {
        return $this->end_time;
    }

    public function getEndTimeDisp() {
        return date("g:i A", strtotime($this->end_time));
    }

    public function setEndTime($value) {
        $this->end_time = $value;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($value) {
        $this->title = $value;
    }

    public function getDescription() {
      return $this->description;
  }

  public function setDescription($value) {
      $this->description = $value;
  }

    public function getLocation() {
        return $this->location;
    }

    public function setLocation($value) {
        $this->location = $value;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($value) {
        $this->id = $value;
    }
}