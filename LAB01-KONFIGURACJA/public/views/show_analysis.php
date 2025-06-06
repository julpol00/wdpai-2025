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
                <li><i class="fa-solid fa-paw"></i> <a href="#" class="button">ANIMALS</a> </li>
                <li><i class="fa-solid fa-chart-simple"></i><a href="#" class="button">ANALYSIS</a> </li>
                <li><i class="fa-solid fa-bell"></i> <a href="#" class="button">NOTIFICATION</a> </li>
                </div>
                <li class="bottom-item"><i class="fa-solid fa-gears"></i> <a href="#" class="button">SETTINGS</a> </li>
            </ul>
         </nav>
        <main>
                <div class="wrapper">
                <div class="pet-profile">
                        <div class="select-section">
                            <label for="animal" id="animal">Choose animal:</label>
                            <select id="animal" name="animal">
                            <option value="Poziomka">Poziomka</option>
                            <option value="Rufus">Rufus</option>
                            <option value="Koko">Koko</option>
                            </select>
                            <div class="add-button" id="confirm">CONFIRM</div>
                        </div>
                        <div class="text-group">
                            <div class="card">
                            <img src="public/img/uploads/suseł.jpg" alt="Poziomka" class="card-image" />
                            </div>
                            <div class="text-group2">
                                <div class="normal-text">Poziomka</div>
                                <div class="normal-text">Ground Squirrel</div>
                                <div class="normal-text">2 year</div>
                            </div>   
                        </div>
                        <div class="long-text">info about Poziomka fjdslkgfjdslkfjkldsjgfkldsjfkdsjfkdjfksd lfkjsdklfjdskljkldsjfklsd
                        </div> 
                </div>

                    <div class="calendar">
                    <section class="calendar-section">
                        <label for="calendar" class="calendar-label">ANALYSIS</label>
                        <div class="select-section" id="select-section-2">
                            <div class="select-section-3">
                            <label for="analysis-range" id="analysis-range">Choose analysis range:</label>
                            <select id="analysis-range" name="analysis-range">
                                <option value="Poziomka">Daily</option>
                                <option value="Rufus">Weekly</option>
                                <option value="Koko">Monthly</option>
                            </select>
                            </div>
                            <div class="buttons">
                                <div class="add-button" id="show">SHOW WEIGHT</div>
                                <div class="add-button" id="show">SHOW ACTIVITIES</div>
                            </div>
                        </div>
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