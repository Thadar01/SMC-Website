<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation</title>
    <script src="https://kit.fontawesome.com/6996f03c1e.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav>
        <div class="navLeftContainer">
            <div class="logoContainer">
                <img src="./image/images (1).jpg" class="logo">
                <i class="fa fa-bars menuBar" id="menuBar"></i>

            </div>
            <div class="navLinkContainer" id="navLinks">

                <a href="index.php">Home</a>
                <div class="info">
                    <a>Explore</a>

                    <i class='fas fa-angle-down infoBtn'></i>
                    <div class="infoLink">
                        <a href="information.php">Information</a>
                        <a href="socialMedia.php">Social Media</a>
                        <a href="liveStreaming.php">LiveStreaming</a>

                    </div>
                </div>
                <a href="parentSession.php">Parents Session</a>
                <a href="contactUs.php">Contact Us</a>
                <a href="history.php">History</a>


                <a href="legal.php">Legislation/Guidance</a>




                <?php

                if (isset($_SESSION['uID'])) {
                    echo '   <a href="userSignOut.php">Sign out</a>';
                } else {
                    echo '<a href="userSignIn.php">Sign in</a>';
                    echo ' <a href="userSignUp.php">Sign up</a>';
                }
                ?>


            </div>
             <div id="google_translate_element"></div>
            <script>
            // Google Translate 
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({
                    pageLanguage: 'en'
                }, 'google_translate_element');
            }
            </script>
            <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

            <script>
            const menuBar = document.getElementById('menuBar');
            const navLinks = document.getElementById('navLinks');

            menuBar.addEventListener('click', () => {
                navLinks.classList.toggle('active');
            });
            </script>
        </div>
        </div>

    </nav>
</body>

</html>