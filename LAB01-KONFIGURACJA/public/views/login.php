<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>Login page</title>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src = "public/img/logo.svg">
        </div>
        <div class = "login-container">
            <form action="login" method="POST" >
                <div class="messages">
                    <?php
                        if(isset($messages)){
                            foreach ($messages as $message)
                                echo $message;
                        }
                    ?>
                </div>
                <input name="email" type="text" placeholder="EMAIL">
                <input name="password" type="password" placeholder="PASSWORD">
                <button class="continue" type="submit">CONTINUE</button>
                <button class="login_with_fb">LOGIN WITH FACEBOOK</button>

            </form>
        </div>
    </div>
    
</body>
</html>