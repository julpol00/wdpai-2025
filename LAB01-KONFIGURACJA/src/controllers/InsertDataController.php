<?php

require_once 'AppController.php';

class InsertDataController extends AppController
{
    public function insert_data()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $species = $_POST['species'] ?? '';
            $birth = $_POST['birth'] ?? '';
            $notes = $_POST['notes'] ?? '';
            $photoName = $_FILES['photo']['name'] ?? 'No file';

        
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/animals");
        }

        $this->render('insert_data');
    }
}
