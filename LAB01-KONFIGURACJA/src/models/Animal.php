<?php

class Animal {
    private $id;
    private $name;
    private $species;
    private $birth;
    private $description;
    private $avatar;

    public function __construct( $id, $name, $species, $birth, $description, $avatar)
    {
        $this->id = $id;
        $this->name = $name;
        $this->species = $species;
        $this->birth = $birth;
        $this->description = $description;
        $this->avatar = $avatar;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getSpecies()
    {
        return $this->species;
    }

    public function setSpecies($species)
    {
        $this->species = $species;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

    public function getBirth()
    {
        return $this->birth;
    }

    public function setBirth($birth)
    {
        $this->birth = $birth;
    }


    public function getId() {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }


}