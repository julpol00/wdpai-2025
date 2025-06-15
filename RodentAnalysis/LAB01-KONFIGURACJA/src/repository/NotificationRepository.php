<?php

require_once __DIR__.'/../models/Notification.php';

class NotificationRepository
{
    public function getNotification(int $id): ?Notification
    {
        global $pdo;
        $stmt = $pdo->prepare('SELECT * FROM notifications WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $notificationData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($notificationData === false) {
            return null;
        }

        return new Notification(
            $notificationData['id'],
            $notificationData['animal_id'],
            $notificationData['notification_time'],
            $notificationData['notification_message'],
            $notificationData['repeat']
        );
    }


    public function addNotification(Notification $notification): void
    {
        global $pdo;
        $stmt = $pdo->prepare(
            "INSERT INTO notifications (animal_id, notification_time, notification_message, repeat)
            VALUES (:animal_id, :notification_time, :notification_message, :repeat)"
        );
        $stmt->execute([
            'animal_id' => $notification->getAnimalId(),
            'notification_time' => $notification->getNotificationTime(),
            'notification_message' => $notification->getNotificationMessage(),
            'repeat' => $notification->getRepeat()
        ]);
    }

    public function getNotificationsByAnimalId(int $animal_id): array
    {

        global $pdo;
        $results = [];

        if($animal_id !== null){
            $stmt = $pdo->prepare('SELECT * FROM notifications WHERE animal_id = :animal_id');
            $stmt->execute(['animal_id' => $animal_id]);
            $notifications = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($notifications as $notification) {
                $results[] = new Notification(
                    $notification['id'],
                    $notification['animal_id'],
                    $notification['notification_time'],
                    $notification['notification_message'],
                    $notification['repeat']
                );
            }
         }

        return $results;
    }

}
