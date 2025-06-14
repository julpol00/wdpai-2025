<?php

require_once 'AppController.php';
require_once __DIR__.'/../../db_config.php';
require_once __DIR__ .'/../models/Animal.php';
require_once __DIR__.'/../repository/AnimalRepository.php';


class AnimalsController extends AppController
{
    private $animalsRepository;

        public function __construct()
    {
        parent::__construct();
        $this->animalsRepository = new AnimalRepository();
    }

    public function animals()
    {

        if (!isset($_SESSION['user_id'])) {
                    die('Musisz być zalogowany!');
        }
        $id_user = $_SESSION['user_id'];

        $animals = $this->animalsRepository->getAnimals($id_user);
        $this->render('animals', ['animals' => $animals]);
    }

}
