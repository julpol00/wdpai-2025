<?php

require_once 'AppController.php';
require_once __DIR__.'/../../db_config.php';
require_once __DIR__ .'/../models/Animal.php';
require_once __DIR__.'/../repository/AnimalRepository.php';

class AddNotificationController extends AppController
{

    private $animalsRepository;

        public function __construct()
    {
        parent::__construct();
        $this->animalsRepository = new AnimalRepository();
    }

    public function add_notification()
    {

        if (!isset($_SESSION['user_id'])) {
                    die('Musisz być zalogowany!');
        }
        $id_user = $_SESSION['user_id'];

        $animals = $this->animalsRepository->getAnimals($id_user);

         $selectedAnimal = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['animal'])) {
            $animalId = (int)$_POST['animal'];
            $selectedAnimal = $this->animalsRepository->getAnimal($animalId);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


        if (isset($_POST['animal'])) {
            $animal = $_POST['animal'] ?? '';
            echo "<script>alert('Wybrano zwierzaka: $animal');</script>";
        }

        if (isset($_POST['notification_message'])) {

            $time = $_POST['notification_time'] ?? 'brak';
            $message = $_POST['notification_message'] ?? 'brak';
            $daily = isset($_POST['daily_repeat']) ? 'tak' : 'nie';
            $weekly = isset($_POST['weekly_repeat']) ? 'tak' : 'nie';

            echo "<script>
                alert('Nowa notyfikacja:\\nGodzina: $time\\nWiadomość: $message\\nCodziennie: $daily\\nCo tydzień: $weekly');
            </script>";
        }

        }

        $this->render('add_notification',  ['animals' => $animals, 'selectedAnimal' => $selectedAnimal]);
    }
}
