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
                    <li><i class="fa-solid fa-paw"></i> <a href="/animals" class="button">ANIMALS</a></li>
                    <li><i class="fa-solid fa-chart-simple"></i><a href="/show_analysis" class="button">ANALYSIS</a></li>
                    <li><i class="fa-solid fa-bell"></i> <a href="/add_notification" class="button">NOTIFICATION</a></li>
                </div>
                <li class="bottom-item"><i class="fa-solid fa-gears"></i> <a href="#" class="button">SETTINGS</a> </li>
            </ul>
         </nav>
        <main>
            <form class="form-wrapper" method="POST" enctype="multipart/form-data" action="insert_data">
                <div class="photo-section" id="photo-section">
                    <button type="button" class="photo-button" id="photo-button">+</button>
                </div>
                <div class="photo-upload-container" id="photo-upload-container" style="display: none;">
                <input type="file" id="photo-input" name="photo" accept="image/*" />
                <img id="photo-preview" style="display: none;" />
                </div>

                <div class="form-section">
                    <div class="inputs-group">
                    <input type="text" name="name" placeholder="name" class="input-field" />
                    <input type="text" name="species" placeholder="species" class="input-field" />
                    <input type="text" name="birth" placeholder="birth" class="input-field" />
                      </div>
                    <textarea placeholder="add notes"  name="notes" class="textarea-field"></textarea>
                </div>
                 <div class="save-section">
                    <button class="save-button">SAVE</button>
                </div>
            </form>
         </main>
    </div>

    
    <script>
    const hamMenu = document.getElementById('hamMenu');
    const nav = document.getElementById('sideNav');

    hamMenu.addEventListener('click', () => {
        hamMenu.classList.toggle('active');
        nav.classList.toggle('active');
    });

    document.addEventListener('DOMContentLoaded', function () {
        const photoButton = document.getElementById('photo-button');
        const photoInput = document.getElementById('photo-input');
        const photoSection = document.getElementById('photo-section');

        photoButton.addEventListener('click', function () {
            photoButton.style.display = 'none';
            photoSection.style.display = 'none'
            photoInput.style.display = 'block';
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
    const photoButton = document.getElementById('photo-button');
    const photoSection = document.getElementById('photo-section');
    const photoUploadContainer = document.getElementById('photo-upload-container');
    const photoInput = document.getElementById('photo-input');
    const photoPreview = document.getElementById('photo-preview');

    photoButton.addEventListener('click', function () {
        photoSection.style.display = 'none';
        photoUploadContainer.style.display = 'flex';
    });

        photoInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    photoPreview.src = e.target.result;
                    photoPreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
    });


    </script>


</body>
</html>