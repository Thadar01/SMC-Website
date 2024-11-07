<?php
include('connect.php');
session_start();

$selectQuery = "SELECT * FROM socialMedia";
$runSelectQuery = mysqli_query($connect, $selectQuery);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="style.css?s=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/6996f03c1e.js" crossorigin="anonymous"></script>

</head>


<body class="homeMainConatainer">
    <div>
        <?php
        include('navbar.php')
        ?>
    </div>
    <form action="index.php" method="POST" class="navSearch">
        <input name="txtSearch" placeholder="Search..." class="searchInput">
        <input type="Submit" name="btnSearch" value="Search" class="searchButton">
    </form>
    <?php
    if (isset($_COOKIE['user'])) {
        $userCookie = $_COOKIE['user'];
        echo "<p class='cookie'>We temporarily save " . htmlspecialchars($userCookie) . "'s information.</p>";
    }
    ?>
    <button class="homeNavSide" onclick="sideBarAction()">
        <i class="fas fa-info-circle sideIcon"></i>
    </button>
    <div id="homeNavSide">
        <h2>The Teen Brain and Social Media</h2>
        <ul>
            <li>Emotional vulnerability: Teens may feel heightened anxiety or depression due to the pressure of social
                validation through likes, comments, and shares.</li>
            <li>Distorted self-image: Constant exposure to idealized portrayals of others online can lead to unhealthy
                comparisons and body image issues.</li>
            <li>Peer pressure: Teens are more likely to engage in risky behaviors or follow trends to fit in with online
                communities.</li>
            <li>Disrupted sleep patterns: Excessive social media use, especially at night, can interfere with sleep
                quality and duration.</li>
        </ul>
    </div>
    <script>
    function sideBarAction() {
        var homeNavSide = document.getElementById("homeNavSide");
        if (homeNavSide.style.display === "none") {
            homeNavSide.style.display = "flex";
        } else {
            homeNavSide.style.display = "none";
        }
    }
    </script>
    <section class="homeFirstContainer" id="homeFirstContainer">
        <div class="homeFirstPara">
            <p><span>Welcome </span>to Our Website. Our Company serves the <span>Social Media Campaings</span>
                and Knowlege to <span> Stay Safe Online.</span>

            </p>
        </div>
        <div class="slide"><img name="slideshow"></div>
        <script>
        var i = 0;
        var images = [];
        images[0] = "image/SMCP1.jpg";
        images[1] = "image/SMCP2.jpeg";
        images[2] = "image/SMCP3.jpg";

        function slideshowImage() {
            document.slideshow.src = images[i];
            if (i < 2) {
                i++;
            } else {
                i = 0;
            };
            setTimeout("slideshowImage()", 3000);

        }
        window.onload = slideshowImage();
        </script>
    </section>
    <section class="homeSecondContainer" id="homeSecondContainer">
        <h2>Most Popular Social Media</h2>
        <div class="homePopularMedia">
            <?php
            if (isset($_POST['btnSearch'])) {
                $searchData = $_POST['txtSearch'];
                $searchQuery = "SELECT * FROM socialMedia WHERE socialMediaName LIKE '%$searchData%' LIMIT 4";
                $runSearchQuery = mysqli_query($connect, $searchQuery);

                while ($fetchArray1 = mysqli_fetch_array($runSearchQuery)) {
                    $mName1 = $fetchArray1["socialMediaName"];
                    $mYear1 = $fetchArray1["socialPublishYear"];
                    $mPopu1 = $fetchArray1["socialMediaPopularity"];
                    $mPhoto1 = $fetchArray1["socialMediaPhoto"];

                    echo '<div class="homeMediaItem">
                        <img src="' . $mPhoto1 . ' ">
                        <div class="homeMediaDetail">
                            <h4>' . $mName1 . '</h4>
                            <p>since ' . $mYear1 . '</p>
                            <p>' . $mPopu1 . ' users</p>
                        </div>
                    </div>';
                }
            } else {
                $selectQuery = "SELECT * FROM socialMedia LIMIT 4";
                $runSelectQuery = mysqli_query($connect, $selectQuery);

                while ($fetchArray = mysqli_fetch_array($runSelectQuery)) {
                    $mName = $fetchArray["socialMediaName"];
                    $mYear = $fetchArray["socialPublishYear"];
                    $mPopu = $fetchArray["socialMediaPopularity"];
                    $mPhoto = $fetchArray["socialMediaPhoto"];

                    echo '<div class="homeMediaItem">
                        <img src="' . $mPhoto . ' ">
                        <div class="homeMediaDetail">
                            <h4>' . $mName . '</h4>
                            <p>since ' . $mYear . '</p>
                            <p>' . $mPopu . ' users</p>
                        </div>
                    </div>';
                }
            }
            ?>
        </div>
        <a href="SocialMedia.php">Explore More <i class='fas fa-angle-right'></i></a>

    </section>
    <section class="homeThirdContainer" id="homeThirdContainer">
        <div class="homeThirdMain">
            <h2>Tips to Stay Safe Online</h2>
            <div class="homeTipContainer">
                <div class="tipList">
                    <div class="homeTipLeft">
                        <h4>Strong annd Unuque Passwords</h4>
                        <p>
                            Staying safe online starts with strong, unique passwords for all your accounts. Use a mix of
                            letters, numbers, and symbols to create complex passwords that are hard to guess. Avoid
                            reusing the same password across different sites, as this can lead to multiple account
                            breaches if one is compromised. A password manager is a great tool for storing and managing
                            your passwords securely, helping you create unique combinations without the stress of
                            remembering them all. </p>
                    </div>
                    <div class="homeTipLeft homeTipRight">
                        <h4>Two-factor Authentication</h4>
                        <p>Two-factor authentication (2FA) adds an extra layer of security to your accounts by requiring
                            a second form of verification beyond your password, such as a code sent to your phone. For
                            even more protection, use an authenticator app like Google Authenticator or Authy instead of
                            SMS, as it’s less vulnerable to interception. This extra step can greatly reduce the risk of
                            unauthorized access, especially for sensitive accounts like email or banking.</p>
                    </div>
                </div>

                <div class="homeTipLeft homeTipCenter">
                    <h4>Regular Software Updates</h4>
                    <p>Regular software updates are essential for online security, as they often include patches for
                        vulnerabilities that cybercriminals exploit. Whether it's your operating system, apps, or
                        antivirus software, make sure you’re running the latest versions to protect yourself from the
                        latest threats. Enabling automatic updates can ensure you don’t miss critical security fixes and
                        helps keep your devices protected at all times.</p>
                </div>
            </div>
        </div>



    </section>

    <section class="homeMap" id="homeMap">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.201265549021!2d96.12605877492115!3d16.816368583976658!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1eb34335a92f5%3A0xea3210d0410309d7!2sTimes%20City%20Yangon!5e0!3m2!1sen!2smm!4v1726071651525!5m2!1sen!2smm"
            width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
     <div id="google_translate_element"></div>
    <script>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en'
        }, 'google_translate_element');
    }
    </script>
    <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>
    </div>
    <?php include("footer.php") ?>
    <script class="here">
    document.getElementById("Here").innerHTML = " <b class='here'>You are here at Home Page</b>"
    </script>
</body>

</html>

</html>