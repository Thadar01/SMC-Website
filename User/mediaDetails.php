<?php
include("connect.php");
$id = $_GET['mID'];


$selectsMediaQuery = "SELECT * FROM socialMedia WHERE socialMediaID='$id'";
$runSelectsMediaQuery = mysqli_query($connect, $selectsMediaQuery);
$fetchsMediaArray = mysqli_fetch_array($runSelectsMediaQuery);
$smName = $fetchsMediaArray["socialMediaName"];
$smDes = $fetchsMediaArray["socialMediaDescription"];
$smYear = $fetchsMediaArray["socialPublishYear"];
$smPopu = $fetchsMediaArray["socialMediaPopularity"];
$smPhoto = $fetchsMediaArray["socialMediaPhoto"];



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Media Details</title>
    <link rel="stylesheet" type="text/css" href="style.css?s=<?php echo time(); ?>">

</head>

<body class="homeMainConatainer">
    <div class="navAndSearch">
        <?php
        include('navbar.php')
        ?>

    </div>
    <div class="detailMainContainer">
        <img src="<?php echo $smPhoto; ?>" class="detailImg">
        <div class="detailContent">
            <div class="detailFact">
                <p class="detailTitle">Name:</p>
                <p class="detailText"><?php echo $smName; ?></p>
            </div>
            <div class="detailFact">
                <p class="detailTitle">Description:</p>
                <p class="detailText"><?php echo $smDes; ?></p>
            </div>
            <div class="detailFact">
                <p class="detailTitle">Published Year:</p>
                <p class="detailText">since <?php echo $smYear; ?></p>
            </div>


            <div class="detailFact">
                <p class="detailTitle">Popularity:</p>
                <p class="detailText"><?php echo $smPopu; ?> users</p>
            </div>
            <div class="techCombine">
                <?php
                $selectsTechQuery = "SELECT * FROM safeTechnique WHERE socialMediaID='$id'";
                $runSelectsTechQuery = mysqli_query($connect, $selectsTechQuery);
                while ($fetchsTechArray = mysqli_fetch_array($runSelectsTechQuery)) {
                    $techName = $fetchsTechArray["techniqueName"];
                    $techTips = $fetchsTechArray["techniqueTips"];
                    $techBenefits = $fetchsTechArray["techniqueBenefits"];
                ?>
                <p class="detailTitle detailTech"><?php echo $techName ?></p>
                <div class="detailFact">
                    <p class="detailTitle">Tips:</p>
                    <p class="detailText"><?php echo $techTips  ?> </p>
                </div>
                <div class="detailFact ">
                    <p class="detailTitle">Benefits:</p>
                    <p class="detailText"><?php echo $techBenefits  ?> </p>
                </div>
                <?php } ?>
            </div>
        </div>


    </div>
</body>

</html>