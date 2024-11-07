<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation</title>
    <link rel="stylesheet" type="text/css" href="style.css?s=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/6996f03c1e.js" crossorigin="anonymous"></script>


</head>

<body>
    <nav class="adminNavBar">
        <div class="adminInfo">
            <img src="../Image/profile.png">
            <div class="adminSetting">
                <?php session_start();
                $Name = $_SESSION['aName'];
                echo "<p class='adminName'>$Name</p>";
                ?>

                <p class="role">Admin</p>
                <a href="adminLogout.php">Logout</a>
            </div>
        </div>
        <hr>
        <div class="adminNavLink">
            <a href="adminCampaign.php"><i class='fas fa-binoculars adminIcon'></i>Campaign <i
                    class='fas fa-angle-right adminIcon'></i></a>
            <a href="adminSocial.php"><i class='fas fa-heart adminIcon'></i>Social Media <i
                    class='fas fa-angle-right adminIcon'></i></a>
            <a href="adminTechnique.php"><i class='fas fa-puzzle-piece adminIcon'></i>Technique <i
                    class='fas fa-angle-right adminIcon'></i></a>
            <a href="adminUser.php"><i class="fa fa-user adminIcon"></i>Monthly Users <i
                    class='fas fa-angle-right adminIcon'></i></a>

            <a href="adminSuggestion.php"><i class="fa fa-comment adminIcon"></i>Suggestion <i
                    class='fas fa-angle-right adminIcon'></i></a>
            <a href="adminParticipate.php"><i class="fas fa-bullhorn adminIcon"></i>Participation <i
                    class='fas fa-angle-right adminIcon'></i></a>
        </div>
    </nav>
</body>

</html>