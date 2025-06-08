<?php

require_once 'AppController.php';

class ShowAnalysisController extends AppController
{

    public function show_analysis()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


        if (isset($_POST['animal'])) {
            $animal = $_POST['animal'] ?? '';
            echo "<script>alert('Wybrano zwierzaka: $animal');</script>";
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

        $this->render('show_analysis');
    }
}
