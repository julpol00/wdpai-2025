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
                        <div class="long-text">info about Poziomka dj kfjsdkf kfjskd sdfj skfjd kjkdf kfjd lkijghofgiljhg kjfk dkfgjdk sdkfjdks kjvgdkg kjfgdkf kjsdkd gfdkj jdhfsjd jdfhsjd cjhdvf jdsh
                        </div> 
  
                </div>

                    <div class="calendar">
                    <section class="calendar-section">
                        <label for="calendar" class="calendar-label">CHOOSE DAY</label>
                        
                        <div class="calendar-row">
                        <input type="date" id="calendar" class="calendar-input" />
                        <span class="calendar-weight">weight: 250g</span>
                        </div>

                        <div class="notes-section">
                        <div class="notes-list">
                            <div class="note">
                            <div class="note-time">8:00</div>
                            <div class="note-time">9:00</div>
                            <div class="note-text">playing</div>
                            </div>
                            <div class="note">
                            <div class="note-time">10:00</div>
                            <div class="note-time">13:00</div>
                            <div class="note-text">sleeping</div>
                            </div>

                            <div class="note-form">
                            <input type="time" class="input-time" required   value="00:00"/>
                            <input type="time" class="input-time" required  value="00:00"/>
                            <input type="text" class="note-input" placeholder="Add note..." required />
                            </div>
                        </div>
                        <div class="add-button"> ADD ACTIVITY</div>
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







