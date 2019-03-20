<?php
class Playlist {
    private $id,$name,$description,$date_created;

    public function __construct($name,$description,$date_created)
    {
        $this->setName($name);
        $this->setDescription($description);
        $this->setDate($date_created);
    }

    public function getName(){
        return $this->name;
    }

    public function setName($value){
        $this->name = $value;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setDescription($value){
        $this->description = $value;
    }

    public function getDate(){
        return $this->date_created;
    }

    public function setDate($value){
        $this->date_created = $value;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($value) {
        $this->id = $value;
    }
}