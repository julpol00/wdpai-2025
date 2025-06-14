<?php
session_start();

require_once 'AppController.php';
require_once __DIR__.'/../../db_config.php';
require_once __DIR__ .'/../models/Animal.php';
require_once __DIR__.'/../repository/AnimalRepository.php';


class InsertDataController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpg', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/'; 

    private $message = [];

    private $animalRepository;

    public function __construct()
    {
        parent::__construct();
        $this->animalRepository = new AnimalRepository();
    }

    public function insert_data()
    {
        if ($this->isPost() && is_uploaded_file($_FILES['photo']['tmp_name']) && $this->validate($_FILES['photo'])) {

            global $pdo;
            if (!isset($_SESSION['user_id'])) {
                    die('Musisz być zalogowany!');
                }
                $id_user = $_SESSION['user_id'];


            $name = $_POST['name'] ?? '';
            $species = $_POST['species'] ?? '';
            $birth = $_POST['birth'] ?? '';
            $notes = $_POST['notes'] ?? '';
            $avatar = $_FILES['photo']['name'] ?? '';

            move_uploaded_file($_FILES['photo']['tmp_name'], dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['photo']['name']);

            $animal = new Animal($name, $species, $birth, $notes, $avatar);
            $this->animalRepository->addAnimal($animal, $id_user);

            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/animals");
            exit;
        }

        $this->render('insert_data');
    }

        private function validate(array $file): bool
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->message[] = 'File is too large for destination file system.';
            return false;
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->message[] = 'File type is not supported.';
            return false;
        }
        return true;
    }
}
