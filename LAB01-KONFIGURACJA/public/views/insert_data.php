<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/insert_data.css">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script src="https://kit.fontawesome.com/6c7c83f719.js" crossorigin="anonymous"></script>
    <title>Insert Data</title>
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
            <div class="form-wrapper">
                <div class="photo-section">
                    <button class="photo-button">+</button>
                </div>

                <div class="form-section">
                      <div class="inputs-group">
                    <input type="text" placeholder="name" class="input-field" />
                    <input type="text" placeholder="species" class="input-field" />
                    <input type="text" placeholder="birth" class="input-field" />
                      </div>
                    <textarea placeholder="add notes" class="textarea-field"></textarea>
                </div>
                 <div class="save-section">
                    <button class="save-button">SAVE</button>
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