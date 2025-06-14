<?php

require_once 'AppController.php';
require_once __DIR__.'/../../db_config.php';
require_once __DIR__ .'/../models/Animal.php';
require_once __DIR__.'/../repository/AnimalRepository.php';


class ShowAnalysisController extends AppController
{

    private $animalsRepository;

        public function __construct()
    {
        parent::__construct();
        $this->animalsRepository = new AnimalRepository();
    }

    public function show_analysis()
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
        }

        if (isset($_POST['action'])) {
            $range = $_POST['range'] ?? 'daily';
            $action = $_POST['action'];

            if ($action === 'weight') {
                echo "<script>alert('Pokazuję wagę dla: $range');</script>";
            } elseif ($action === 'activities') {
                echo "<script>alert('Pokazuję aktywności dla: $range');</script>";
            } else {
                echo "<script>alert('Nieznane działanie');</script>";
            }
        }

        }

        $this->render('show_analysis',  ['animals' => $animals, 'selectedAnimal' => $selectedAnimal]);
    }
}
