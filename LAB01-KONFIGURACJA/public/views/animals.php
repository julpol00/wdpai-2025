<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/animals.css">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script src="https://kit.fontawesome.com/6c7c83f719.js" crossorigin="anonymous"></script>
    <title>Animals</title>
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
                <li class="bottom-item"><i class="fa-solid fa-gears"></i> <a href="#" class="button">SETTINGS</a></li>
            </ul>
        </nav>
        <main>
            <section class="animals-grid">
                <a href="/pet_journal" class="card-link">
                    <div class="card">
                    <div class="card-header">
                        <div class="card-title">Rufus</div>
                    </div>
                    <img src="public/img/uploads/campbella-chomik.png" alt="Rufus" class="card-image" />
                    </div>
                </a>

                <a href="/profile/koko" class="card-link">
                    <div class="card">
                    <div class="card-header">
                        <div class="card-title">Koko</div>
                    </div>
                    <img src="public/img/uploads/św3inka.jpg" alt="Koko" class="card-image" />
                    </div>
                </a>

                <a href="/profile/benio" class="card-link">
                    <div class="card">
                    <div class="card-header">
                        <div class="card-title">Benio</div>
                    </div>
                    <img src="public/img/uploads/szynszyl.jpg" alt="Benio" class="card-image" />
                    </div>
                </a>

                <a href="/profile/poziomka" class="card-link">
                    <div class="card">
                    <div class="card-header">
                        <div class="card-title">Poziomka</div>
                    </div>
                    <img src="public/img/uploads/suseł.jpg" alt="Poziomka" class="card-image" />
                    </div>
                </a>

                <a href="/profile/zuzia" class="card-link">
                    <div class="card">
                    <div class="card-header">
                        <div class="card-title">Zuzia</div>
                    </div>
                    <img src="public/img/uploads/rat.jpg" alt="Zuzia" class="card-image" />
                    </div>
                </a>

                <a href="/insert_data" class="card-link">
                    <div class="card-add-animals">
                    <i class="fa-solid fa-plus"></i>
                    </div>
                </a>
            </section>
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