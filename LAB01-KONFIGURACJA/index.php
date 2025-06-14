<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('animals', 'AnimalsController');
Router::post('login', 'SecurityController');
Router::post('add_notification', 'AddNotificationController');
Router::get('add_notification', 'AddNotificationController');
Router::get('insert_data', 'InsertDataController');
Router::post('insert_data', 'InsertDataController');
Router::get('pet_journal', 'PetJournalController');
Router::post('pet_journal', 'PetJournalController');
Router::get('show_analysis', 'ShowAnalysisController');
Router::post('show_analysis', 'ShowAnalysisController');

Router::run($path);