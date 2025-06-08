<?php

require_once 'AppController.php';

class AddNotificationController extends AppController
{

    public function add_notification()
    {
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

        $this->render('add_notification');
    }
}
