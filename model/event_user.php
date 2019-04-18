<?php
/* Author:          Bibek Shrestha
 * Feature:         Events
 * Description:     A model class which represents event_user table of the db
 * Date Created:    March 4th, 2019
 * Last Modified:   April 17th, 2019
 * Recent Changes:  create class
 */

class EventUser {
    private $id, $user_id, $event_id, $is_host, $has_rsvp;

    public function __construct($user_id, $event_id, $is_host, $has_rsvp) {
        $this->setUserId($user_id);
        $this->setEventId($event_id);
        $this->setIsHost($is_host);
        $this->setHasRsvp($has_rsvp);
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function setUserId($value){
        $this->user_id = $value;
    }

    public function getEventId(){
        return $this->event_id;
    }

    public function setEventId($value){
        $this->event_id = $value;
    }

    public function getIsHost() {
        return $this->is_host;
    }

    public function setIsHost($value) {
        $this->is_host = $value;
    }

    public function getHasRsvp() {
        return $this->has_rsvp;
    }

    public function setHasRsvp($value) {
        $this->has_rsvp = $value;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($value) {
        $this->id = $value;
    }
}