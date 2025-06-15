<?php

require_once __DIR__.'/../models/Animal.php';

class AnimalRepository
{

    public function getAnimal(int $id): ?Animal
    {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM animals WHERE id = :id');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $animalData = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($animalData === false) {
        return null;
    }

    return new Animal(
        $animalData['id'],   
        $animalData['name'],
        $animalData['species'],
        $animalData['birth'],
        $animalData['description'],
        $animalData['avatar']
    );
    }

    public function addAnimal(Animal $animal, int $id_user): void
    {

            global $pdo;
            $stmt = $pdo->prepare(
                "INSERT INTO animals (id_user, name, species, birth, description, avatar)
                VALUES (:id_user, :name, :species, :birth, :description, :avatar)"
            );
            $stmt->execute([
                'id_user' => $id_user,
                'name' => $animal->getName(),
                'species' => $animal->getSpecies(),
                'birth' => $animal->getBirth(),
                'description' => $animal->getDescription(),
                'avatar' => $animal->getAvatar()
            ]);

    }

    public function getAnimals(int $id_user): ?array
    {
        global $pdo;
        $results = [];
        $stm =  $pdo->prepare('SELECT * FROM animals WHERE id_user = :id_user');
        $stm->execute(['id_user' => $id_user]);
        $animals = $stm->fetchAll(PDO::FETCH_ASSOC);

        foreach($animals as $animal){
            $results[] = new Animal(     
                        $animal['id'],   
                        $animal['name'],
                        $animal['species'],
                        $animal['birth'],
                        $animal['description'],
                        $animal['avatar']);
        }

        return $results;

    }
}