<?php

class Weight
{
    private $id;
    private $animal_id;
    private $date_weight;
    private $weight;

    public function __construct($id, $animal_id, $date_weight, $weight)
    {
        $this->id = $id;
        $this->animal_id = $animal_id;
        $this->date_weight = $date_weight;
        $this->weight = $weight;
    }

    public function getId(){
        return $this->id;
    }

    public function getAnimalId(){
        return $this->animal_id;
    }

    public function getDateWeight() {
        return $this->date_weight;
    }

    public function getWeight() {
        return $this->weight;
    }

    public function setId($id) {
        $this->id = $id; 
    }
    public function setAnimalId($animal_id) {
        $this->animal_id = $animal_id;
    }

    public function setDateWeight($date_weight) {
        $this->date_weight = $date_weight;
    }

    public function setWeight($weight) {
        $this->weight = $weight;
    }

    public static function createNew($animal_id, $date_weight, $weight)
    {
        return new self(null, $animal_id, $date_weight, $weight);
    }
}
