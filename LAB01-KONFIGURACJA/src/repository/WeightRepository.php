<?php

require_once __DIR__.'/../models/Weight.php';

class WeightRepository
{
    public function addWeight(Weight $weight): void
    {
        global $pdo;
        $stmt = $pdo->prepare(
            'INSERT INTO weights (animal_id, date_weight, weight) VALUES (:animal_id, :date_weight, :weight)'
        );
        $stmt->execute([
            'animal_id' => $weight->getAnimalId(),
            'date_weight' => $weight->getDateWeight(),
            'weight' => $weight->getWeight()
        ]);
    }

    public function getWeightsByAnimalId(int $animal_id): array
    {
        global $pdo;
        $results = [];
        $stmt = $pdo->prepare('SELECT * FROM weights WHERE animal_id = :animal_id ORDER BY date_weight DESC');
        $stmt->execute(['animal_id' => $animal_id]);
        $weights = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($weights as $weight) {
            $results[] = new Weight(
                $weight['id'],
                $weight['animal_id'],
                $weight['date_weight'],
                $weight['weight']
            );
        }
        return $results;
    }
}
