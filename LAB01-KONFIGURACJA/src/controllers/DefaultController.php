<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function login()
    {
        $this->render('login');
    }

    public function animals()
    {
        $this->render('animals');
    }

    public function add_notification()
    {
        $this->render('add_notification');
    }

    public function insert_data()
    {
        $this->render('insert_data');
    }

    public function pet_journal()
    {
        $this->render('pet_journal');
    }

    public function show_analysis()
    {
        $this->render('show_analysis');
    }
}