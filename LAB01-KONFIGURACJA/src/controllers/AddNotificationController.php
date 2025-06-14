<?php

require_once 'AppController.php';
require_once __DIR__.'/../../db_config.php';
require_once __DIR__ .'/../models/Animal.php';
require_once __DIR__.'/../repository/AnimalRepository.php';
require_once __DIR__ .'/../models/Notification.php';
require_once __DIR__.'/../repository/NotificationRepository.php';

class AddNotificationController extends AppController
{

    private $animalsRepository;
    private $notifcationRepository;

    public function __construct()
    {
        parent::__construct();
        $this->animalsRepository = new AnimalRepository();
        $this->notifcationRepository = new NotificationRepository();
    }

    public function add_notification()
    {

        if (!isset($_SESSION['user_id'])) {
                    die('Musisz być zalogowany!');
        }
        $id_user = $_SESSION['user_id'];

        $animals = $this->animalsRepository->getAnimals($id_user);

        $selectedAnimal = null;
        $animalId = null;

        if (isset($_GET['animal'])) {
            $animalId = (int)$_GET['animal'];
            $selectedAnimal = $this->animalsRepository->getAnimal($animalId);
        }

        if ($selectedAnimal === null && !empty($animals)) {
            $selectedAnimal = $animals[0];
            $animalId = $selectedAnimal->getId();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['animal'])) {
            $animalId = (int)$_POST['animal'];
            $selectedAnimal = $this->animalsRepository->getAnimal($animalId);
        }

        $notifications =  $this->notifcationRepository->getNotificationsByAnimalId($selectedAnimal->getId());

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (isset($_POST['notification_message'])) {

            $time = $_POST['notification_time'] ?? 'brak';
            $message = $_POST['notification_message'] ?? 'brak';
            $repeat = null;
            if (isset($_POST['daily_repeat'])) {
                $repeat = 'DAILY_REPEAT';
            } elseif (isset($_POST['weekly_repeat'])) {
                $repeat = 'WEEKLY_REPEAT';
            } else {
                $repeat = 'NO_REPEAT';
            }

            $notification = Notification::createNew($animalId, $time, $message, $repeat);
            $this->notifcationRepository->addNotification($notification);

            header("Location: /add_notification?animal={$animalId}");
             exit();
        }

        }

        $this->render('add_notification',  ['animals' => $animals, 'selectedAnimal' => $selectedAnimal, 'selectedAnimalId' => $animalId, 'notifications' => $notifications]);
    }
}
