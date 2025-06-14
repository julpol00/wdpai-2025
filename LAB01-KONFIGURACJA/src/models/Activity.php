<?php

class Activity
{
    private $id;
    private $animal_id;
    private $activity_date;
    private $start_time;
    private $end_time;
    private $activity_text;

    public function __construct($id, $animal_id, $activity_date, $start_time, $end_time, $activity_text)
    {
        $this->id = $id;
        $this->animal_id = $animal_id;
        $this->activity_date = $activity_date;
        $this->start_time = $start_time;
        $this->end_time = $end_time;
        $this->activity_text = $activity_text;
    }

    public function getId() {
        return $this->id;
    }

    public function getAnimalId() {
        return $this->animal_id;
    }

    public function getActivityDate() {
        return $this->activity_date;
    }

    public function getStartTime() {
        return $this->start_time;
    }

    public function getEndTime() {
        return $this->end_time;
    }

    public function getActivityText() {
        return $this->activity_text;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setAnimalId($animal_id) {
        $this->animal_id = $animal_id;
    }

    public function setActivityDate($activity_date) {
        $this->activity_date = $activity_date;
    }

    public function setStartTime($start_time) {
        $this->start_time = $start_time;
    }

    public function setEndTime($end_time) {
        $this->end_time = $end_time;
    }

    public function setActivityText($activity_text) {
        $this->activity_text = $activity_text;
    }

    public static function createNew($animal_id, $activity_date, $start_time, $end_time, $activity_text)
    {
        return new self(null, $animal_id, $activity_date, $start_time, $end_time, $activity_text);
    }
}
