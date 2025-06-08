<?php

require_once 'AppController.php';

class PetJournalController extends AppController
{

    public function pet_journal()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


        if (isset($_POST['weight'])) {
            $weight = $_POST['weight'] ?? '';
            echo "<script>alert('PODANO WAGĘ: $weight');</script>";
        }

        if (isset($_POST['activity'])) {

            $activity = $_POST['activity'] ?? 'brak';
            $date = $_POST['date'] ?? 'brak';
            $start_time = isset($_POST['start-time']) ? 'tak' : 'nie';
            $end_time = isset($_POST['end-time']) ? 'tak' : 'nie';

            echo "<script>
                alert('Nowa aktywność:\\data: $date\\naktywność: $activity \\nstart_time: $start_time\\nend_time: $end_time');
            </script>";
        }

        }

        $this->render('pet_journal');
    }
}
