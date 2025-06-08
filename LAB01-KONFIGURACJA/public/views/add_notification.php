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
                    <form class="select-section" method="POST"  action="add_notification">
                        <label for="animal" id="animal">Choose animal:</label>
                        <select id="animal" name="animal">
                        <option value="Poziomka">Poziomka</option>
                        <option value="Rufus">Rufus</option>
                        <option value="Koko">Koko</option>
                        </select>
                        <button class="add-button" type="submit" id="confirm">CONFIRM</button>
                    </form>
                    <div class="text-group">
                        <div class="card">
                        <img src="public/img/uploads/suseł.jpg" alt="Poziomka" class="card-image" />
                        </div>
                        <div class="text-group2">
                            <div class="normal-text">Poziomka</div>
                            <div class="normal-text">Squirrel</div>
                            <div class="normal-text">2 year</div>
                        </div>
                    </div>
                        <div class="long-text">info about Poziomka fjdslkgfjdslkfjkldsjgfkldsjfkdsjfkdjfksd lfkjsdklfjdskljkldsjfklsd
                        </div> 
                </div>

                    <div class="calendar">
                    <section class="calendar-section">
                        <label for="calendar" class="calendar-label">NOTIFCATIONS</label>

                        <div class="notes-section">
                        <div class="notes-list">
                            <div class="note">
                            <div class="note-time">8:00</div>
                            <div class="note-text">vet</div>
                            <div class="repeat-info">No repeat</div>
                            </div>
                            <div class="note">
                            <div class="note-time">10:00</div>
                            <div class="note-text">Medicinie!</div>
                            <div class="repeat-info">Repeat weekly</div>
                            </div>
                                                        <div class="note">
                            <div class="note-time">10:00</div>
                            <div class="note-text">Medicinie!</div>
                            <div class="repeat-info">Repeat weekly</div>
                            </div>

                            <div class="note">
                            <div class="note-time">10:00</div>
                            <div class="note-text">Medicinie!</div>
                            <div class="repeat-info">Repeat weekly</div>
                            </div>
                                                        <div class="note">
                            <div class="note-time">10:00</div>
                            <div class="note-text">Medicinie!</div>
                            <div class="repeat-info">Repeat weekly</div>
                            </div>
                                                        <div class="note">
                            <div class="note-time">10:00</div>
                            <div class="note-text">Medicinie!</div>
                            <div class="repeat-info">Repeat weekly</div>
                            </div>

                            <form class="notification-form" method="POST" action="add_notification">
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







