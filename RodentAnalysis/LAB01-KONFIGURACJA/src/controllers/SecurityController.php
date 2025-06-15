<?php



require_once 'AppController.php';
require_once __DIR__ .'/../models/User.php';
require_once __DIR__.'/../../db_config.php';

class SecurityController extends AppController {

    public function login()
    {   
        global $pdo;

        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = trim($_POST['email']);
        $password = $_POST['password'];

        $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->execute(['email' => $email]);
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);


        if (!$userData) {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }

        if (!password_verify($password, $userData['password'])) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['user_id'] = $userData['id'];

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/animals");
    }
}