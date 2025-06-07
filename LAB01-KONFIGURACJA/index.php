<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('animals', 'DefaultController');
Router::post('login', 'SecurityController');
Router::get('add_notification', 'DefaultController');
Router::get('insert_data', 'DefaultController');
Router::get('pet_journal', 'DefaultController');
Router::get('show_analysis', 'DefaultController');

Router::run($path);