<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/AnimalRepository.php';
require_once __DIR__.'/../repository/WeightRepository.php';
require_once __DIR__.'/../repository/ActivityRepository.php';



class PetJournalController extends AppController
{

    private $animalsRepository;
    private $weightRepository;
    private $activityRepository;

    public function __construct()
    {
        parent::__construct();
        $this->animalsRepository = new AnimalRepository();
        $this->weightRepository = new WeightRepository();
        $this->activityRepository = new ActivityRepository();
    }

    public function pet_journal()
    {

        $date = null;

        if (isset($_GET['animal'])) {
            $animalId = (int)$_GET['animal'];
        } elseif (isset($_POST['animal_id'])) {
            $animalId = (int)$_POST['animal_id'];
        } else {
            die('Nie podano ID zwierzaka!');
        }

        $animal = $this->animalsRepository->getAnimal($animalId);

        if (isset($_GET['date'])) {
            $date = $_GET['date'];
        } elseif (isset($_POST['date'])) {
            $date = $_POST['date'];
        } else {
            // today date
            $date = date('Y-m-d');
        }

         $activities = $this->activityRepository->getActivitiesByAnimalIdAndDate($animalId, $date);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

               if (isset($_POST['animal_id'])) {
                    $animalId = (int)$_POST['animal_id'];
                }


            if (isset($_POST['weight'])) {
                $weight = $_POST['weight'] ?? '';
                $date_weight = $_POST['date-weight'] ?? '';
                $animalId = (int)$_POST['animal_id'];

                $newWeight = Weight::createNew($animalId, $date_weight, $weight);
                $this->weightRepository->addWeight($newWeight);


                header("Location: /pet_journal?animal=$animalId");
                exit();


            }

            if (isset($_POST['activity'])) {
                $animalId = (int)$_POST['animal_id'];
                $activity_text = $_POST['activity'] ?? 'brak';
                $date = $_POST['date'] ?? 'brak';
                $start_time = $_POST['start-time'] ?? 'brak';
                $end_time = $_POST['end-time'] ?? 'brak';

                $activity = Activity::createNew($animalId, $date, $start_time, $end_time, $activity_text);
                $this->activityRepository->addActivity($activity);

                header("Location: /pet_journal?animal=$animalId&date=$date");
                exit();
            }

        }

        $this->render('pet_journal' , ['animal' => $animal, 'animalId' => $animalId,  'activities' => $activities, 'selectedDate' => $date]);
    }


    public function get_activities()
    {
        $animalId = $_GET['animal_id'] ?? null;
        $date = $_GET['date'] ?? null;

        if (!$animalId || !$date) {
            echo '<div class="note"><div class="note-text">No data</div></div>';
            return;
        }

        $activities = $this->activityRepository->getActivitiesByAnimalIdAndDate($animalId, $date);

        if (empty($activities)) {
            echo '<div class="note"><div class="note-text">No activities for this day.</div></div>';
            return;
        }

        foreach ($activities as $activity) {
            echo '<div class="note">';
            echo '<div class="note-time">' . date('H:i', strtotime($activity->getStartTime())) . '</div>';
            echo '<div class="note-time">' . date('H:i', strtotime($activity->getEndTime())) . '</div>';
            echo '<div class="note-text">' . htmlspecialchars($activity->getActivityText()) . '</div>';
            echo '</div>';
        }
    }

}
