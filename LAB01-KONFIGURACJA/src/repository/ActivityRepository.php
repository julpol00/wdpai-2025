<?php

require_once __DIR__.'/../models/Activity.php';

class ActivityRepository
{
    public function addActivity(Activity $activity): void
    {
        global $pdo;
        $stmt = $pdo->prepare(
            'INSERT INTO activities (animal_id, activity_date, start_time, end_time, activity_text)
            VALUES (:animal_id, :activity_date, :start_time, :end_time, :activity_text)'
        );
        $stmt->execute([
            'animal_id' => $activity->getAnimalId(),
            'activity_date' => $activity->getActivityDate(),
            'start_time' => $activity->getStartTime(),
            'end_time' => $activity->getEndTime(),
            'activity_text' => $activity->getActivityText()
        ]);
    }

    public function getActivitiesByAnimalId(int $animal_id): array
    {
        global $pdo;
        $results = [];
        $stmt = $pdo->prepare('SELECT * FROM activities WHERE animal_id = :animal_id ORDER BY activity_date DESC, start_time');
        $stmt->execute(['animal_id' => $animal_id]);
        $activities = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($activities as $a) {
            $results[] = new Activity(
                $a['id'],
                $a['animal_id'],
                $a['activity_date'],
                $a['start_time'],
                $a['end_time'],
                $a['activity_text']
            );
        }
        return $results;
    }

    public function getActivitiesByAnimalIdAndDate(int $animal_id, string $activity_date): array
    {
        global $pdo;
        $results = [];
        if($animal_id !== null && $activity_date !== null){
            $stmt = $pdo->prepare('
                SELECT * FROM activities 
                WHERE animal_id = :animal_id AND activity_date = :activity_date 
                ORDER BY start_time
            ');
            $stmt->execute([
                'animal_id' => $animal_id,
                'activity_date' => $activity_date
            ]);
            $activities = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($activities as $a) {
                $results[] = new Activity(
                    $a['id'],
                    $a['animal_id'],
                    $a['activity_date'],
                    $a['start_time'],
                    $a['end_time'],
                    $a['activity_text']
                );
            }
        }
        return $results;
    }

}
