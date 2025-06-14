<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/pet_journal.css">
    <link rel="stylesheet" type="text/css" href="public/css/add_notification.css">
    <link rel="stylesheet" type="text/css" href="public/css/show_analysis.css">
    <script src="https://kit.fontawesome.com/6c7c83f719.js" crossorigin="anonymous"></script>
    <title>Show Analysis</title>
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
                        <form class="select-section" method="POST"  action="show_analysis">
                            <label for="animal" id="animal">Choose animal:</label>
                            <select id="animal" name="animal">
                            <?php foreach($animals as $animal) : ?>
                            <option value="<?= $animal->getId(); ?>"><?= $animal->getName(); ?></option>
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
                        <label for="calendar" class="calendar-label">ANALYSIS</label>
                        <form method="POST" action="?page=show_analysis" class="select-section" id="select-section-2">
                            <div class="select-section-3">
                                <label for="analysis-range" class="analysis-range">Choose analysis range:</label>
                                <select id="analysis-range" name="range">
                                <option value="daily">Daily</option>
                                <option value="weekly">Weekly</option>
                                <option value="monthly">Monthly</option>
                                </select>
                            </div>
                            <div class="buttons">
                                <button class="add-button show-btn" type="submit" name="action" value="weight">SHOW WEIGHT</button>
                                <button class="add-button show-btn" type="submit" name="action" value="activities">SHOW ACTIVITIES</button>
                            </div>
                        </form>

                         <img src="public/img/uploads/graph.png" alt="graph" class="graph"/>
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