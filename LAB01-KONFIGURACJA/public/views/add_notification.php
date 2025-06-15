<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/pet_journal.css">
    <link rel="stylesheet" type="text/css" href="public/css/add_notification.css">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script src="https://kit.fontawesome.com/6c7c83f719.js" crossorigin="anonymous"></script>
    <title>Add Notification</title>
</head>
<body>
    <header>
        <div class="ham-menu" id="hamMenu">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="logo-title">
            <img src="public/img/logo_2.svg" alt="Rodent Analytics logo">
            <div class = "title-text">
            <span class="rodent">RODENT</span>
            <span class="analytics">ANALYTICS</span>
            </div>
        </div>
        <a href="/logout.php" class="log-out">LOG OUT</a>
    </header>
    <div class="base-container">
        <nav id="sideNav">
            <ul>
                <div class="menu-group">
                    <li><i class="fa-solid fa-paw"></i> <a href="/animals" class="button">ANIMALS</a></li>
                    <li><i class="fa-solid fa-chart-simple"></i><a href="/show_analysis" class="button">ANALYSIS</a></li>
                    <li><i class="fa-solid fa-bell"></i> <a href="/add_notification" class="button">NOTIFICATION</a></li>
                </div>
                <li class="bottom-item"><i class="fa-solid fa-gears"></i> <a href="#" class="button">SETTINGS</a> </li>
            </ul>
         </nav>
        <main>
                <div class="wrapper">
                    <div class="pet-profile">
                        <form class="select-section" method="POST"  action="add_notification">
                            <label for="animal" id="animal">Choose animal:</label>
                            <select id="animal" name="animal">
                             <?php foreach($animals as $animal): ?>
                            <option value="<?= $animal->getId(); ?>"
                                    <?php if (isset($selectedAnimalId) && $animal->getId() == $selectedAnimalId) echo 'selected'; ?>>
                                    <?= $animal->getName(); ?>
                                </option>
                            <?php endforeach; ?>
                            </select>
                            <button class="add-button" type="submit" id="confirm">CONFIRM</button>
                        </form>
                            <?php if ($selectedAnimal): ?>
                        <div class="text-group">
                            <div class="card">
                                <img src="public/uploads/<?= $selectedAnimal->getAvatar(); ?>" 
                                    alt="<?= $selectedAnimal->getName(); ?>" class="card-image" />
                            </div>
                            <div class="text-group2">
                                <div class="normal-text"><?= $selectedAnimal->getName(); ?></div>
                                <div class="normal-text"><?= $selectedAnimal->getSpecies(); ?></div>
                                <div class="normal-text"><?= $selectedAnimal->getBirth(); ?></div>
                            </div>
                        </div>
                        <div class="long-text"><?= $selectedAnimal->getDescription(); ?></div>
                    <?php endif; ?>
 
                </div>
                    <div class="calendar">
                    <section class="calendar-section">
                        <label for="calendar" class="calendar-label">NOTIFCATIONS</label>

                        <div class="notes-section">
                        <div class="notes-list">
                        <?php foreach($notifications as $notification) : ?>
                            <div class="note">
                                <div class="note-time"><?=  date('H:i', strtotime($notification->getNotificationTime())); ?></div>
                                <div class="note-text"><?= $notification->getNotificationMessage(); ?></div>
                                <div class="repeat-info"><?php
                                    switch($notification->getRepeat()) {
                                        case 'DAILY_REPEAT':
                                            echo "Repeat daily";
                                            break;
                                        case 'WEEKLY_REPEAT':
                                            echo "Repeat weekly";
                                            break;
                                        case 'NO_REPEAT':
                                        default:
                                            echo "No repeat";
                                            break;
                                    }
                                ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                            <form class="notification-form" method="POST" action="add_notification">
                            <input type="hidden" name="animal" value="<?= isset($selectedAnimalId) ? $selectedAnimalId : '' ?>">
                            <div class="note-form">
                                <div class="inputs"> 
                                    <input type="time" class="input-time" name="notification_time" required value="00:00"/>
                                    <input type="text" class="note-input" name="notification_message" placeholder="Add note..." required />
                                </div>
                                <div class="checkboxes">
                                    <label><input type="checkbox" name="daily_repeat" value="1">Daily repeat</label>
                                    <label><input type="checkbox" name="weekly_repeat" value="1">Weekly repeat</label>
                                </div>
                            </div>
                            <button class="add-button">ADD NOTIFICATION</button>
                            </form>
                        </div>
                        </div>
                    </section>
                    </div>
                 </div>
                </div>
    </main>
    </div>

    <script>
    const hamMenu = document.getElementById('hamMenu');
    const nav = document.getElementById('sideNav');

        hamMenu.addEventListener('click', () => {
            hamMenu.classList.toggle('active');
            nav.classList.toggle('active');
        });
    </script>

</body>
</html>







