<?php

class Notification
{
    private $id;
    private $animal_id;
    private $notification_time;
    private $notification_message;
    private $repeat; // 'NO_REPEAT', 'DAILY_REPEAT', 'WEEKLY_REPEAT'

    public function __construct($id, $animal_id, $notification_time, $notification_message, $repeat)
    {
        $this->id = $id;
        $this->animal_id = $animal_id;
        $this->notification_time = $notification_time;
        $this->notification_message = $notification_message;
        $this->repeat = $repeat;
    }

     public static function createNew($animal_id, $notification_time, $notification_message, $repeat)
    {
        return new self(null, $animal_id, $notification_time, $notification_message, $repeat);
    }


    public function getId(){
        return $this->id;
    }
    public function setId($id){ 
        $this->id = $id;
    }

    public function getAnimalId(){
        return $this->animal_id;
    }
    public function setAnimalId($animal_id){ 
        $this->animal_id = $animal_id;
    }

    public function getNotificationTime(){
        return $this->notification_time;
    }
    public function setNotificationTime($notification_time){
        $this->notification_time = $notification_time;
    }

    public function getNotificationMessage(){
        return $this->notification_message;
    }
    public function setNotificationMessage($notification_message){
        $this->notification_message = $notification_message;
    }

    public function getRepeat(){
        return $this->repeat;
    }
    public function setRepeat($repeat){
        $this->repeat = $repeat;
    }
}
