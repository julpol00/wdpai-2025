<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/pet_journal.css">
    <script src="https://kit.fontawesome.com/6c7c83f719.js" crossorigin="anonymous"></script>
    <title>Pet Journal</title>
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
    </header>
    <div class="base-container">
        <nav  id="sideNav">
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
                            <div class="text-group">
                                    <div class="card">
                                    <img src="public/uploads/<?= $animal->getAvatar(); ?>" 
                                    alt="<?= $animal->getName(); ?>" class="card-image" />
                            </div>
                            <div class="text-group2">
                                <div class="normal-text"><?= $animal->getName(); ?></div>
                                <div class="normal-text"><?= $animal->getSpecies(); ?></div>
                                <div class="normal-text"><?= $animal->getBirth(); ?></div>
                            </div>
                        </div>
                        <div class="long-text"><?= $animal->getDescription(); ?></div>
                        </div> 

                    <div class="calendar">
                        <section class="calendar-section">

                                
                                <div class="calendar-row">
                                    <form class="weight" method="POST" action="pet_journal">
                                        <input type="hidden" name="animal_id" value="<?= $animal ? $animal->getId() : ''; ?>">
                                        <input type="date" name="date-weight" id="calendar" class="calendar-input" />
                                        <input type="text" class="calendar-weight-input" name="weight" placeholder="weight" />
                                        <button class="add-button" type="submit">ADD</butoon>
                                    </form>
                                </div>
                                <form class="journal-form" method="POST" action="pet_journal">
                                    <input type="hidden" name="animal_id" value="<?= $animal ? $animal->getId() : ''; ?>">
                                    <label for="calendar" class="calendar-label">CHOOSE DAY</label>
                                    <input type="date" name="date" class="calendar-input" id="calendar-input-2" value="<?= htmlspecialchars($selectedDate); ?>" />
                                    <div class="notes-section">
                                        <div class="notes-list">
                                            <?php if (!empty($activities)): ?>
                                                <?php foreach ($activities as $activity): ?>
                                                    <div class="note">
                                                        <div class="note-time"><?= date('H:i', strtotime($activity->getStartTime()));?></div>
                                                        <div class="note-time"><?= date('H:i', strtotime($activity->getEndTime())); ?></div>
                                                        <div class="note-text"><?= $activity->getActivityText(); ?></div>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <div class="note">
                                                    <div class="note-text">No activities for this day.</div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="note-form">
                                            <input type="time" class="input-time" name="start-time" required value="00:00"/>
                                            <input type="time" class="input-time" name="end-time" required value="00:00"/>
                                            <input type="text" class="note-input" name="activity" placeholder="Add note..." required />
                                            <button class="add-button" id="add-button-2" type="submit">ADD ACTIVITY</button>
                                        </div>
                                    </div>
                        </form>

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


    document.getElementById('calendar-input-2').addEventListener('change', function() {
        const date = this.value;
        const animalId = document.querySelector('input[name="animal_id"]').value;
        fetch(`/get_activities?animal_id=${animalId}&date=${date}`)
            .then(response => response.text())
            .then(html => {
                document.querySelector('.notes-list').innerHTML = html;
            });
    });


    </script>

</body>
</html>







