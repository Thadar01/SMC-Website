<?php
include("connect.php");
session_start();
$id = $_GET['cID'];


$selectInfoQuery = "SELECT * FROM campaign WHERE campaignID='$id'";
$runSelectInfoQuery = mysqli_query($connect, $selectInfoQuery);
$fetchInfoArray = mysqli_fetch_array($runSelectInfoQuery);
$cTitle = $fetchInfoArray["campaignTitle"];
$cPhoto = $fetchInfoArray["campaignPhoto"];
$cAddress = $fetchInfoArray["campaignAddress"];
$cDes = $fetchInfoArray["campaignVision"];
$cAim = $fetchInfoArray["campaignAim"];
$cLocation = $fetchInfoArray["campaignLocation"];
$cStart = $fetchInfoArray["campaignStart"];
$cEnd = $fetchInfoArray["campaignEnd"];
$cDuration = $fetchInfoArray["Duration"];
$cSocial = $fetchInfoArray["socialMediaID"];
$cStatus = $fetchInfoArray["campaignStatus"];

$selectSocialQuery = "SELECT * FROM socialMedia WHERE socialMediaID='$cSocial'";
$runSelectSocialQuery = mysqli_query($connect, $selectSocialQuery);
$fetchSocialArray = mysqli_fetch_array($runSelectSocialQuery);
$socialName = $fetchSocialArray["socialMediaName"];

if (isset($_POST['btnParticipate'])) {
    $userid = $_POST['txtuserID'];
    $date = $_POST['txtDate'];
    $time = $_POST['txtTime'];
    $camid = $_POST['txtcampaignID'];
    $query = "SELECT * FROM userParticipate WHERE userID='$userid' AND campaignID='$camid'";
    $runQuery = mysqli_query($connect, $query);
    $isRow = mysqli_num_rows($runQuery);

    if ($isRow) {
        echo "<script>window.alert('You have already participate this camapign.')</script>";
        echo "<script>window.location='information.php';</script>";
    } else {

        $saveQuery = "INSERT INTO userParticipate (participateDate,participateTime,userID,campaignID)
                VALUES ('$date','$time','$userid','$camid')";
        $parresult = mysqli_query($connect, $saveQuery);
        if ($parresult) {
            echo "<script>window.alert('Successed to participate in the campaign')</script>";
            echo "<script>window.location='information.php';</script>";
        } else {
            echo "<script>window.alert('Failed to participate in the campaign.);</script>";

            echo "<script>window.location='information.php';</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information Details</title>
    <link rel="stylesheet" type="text/css" href="style.css?s=<?php echo time(); ?>">

</head>

<body class="homeMainConatainer">
    <div class="navAndSearch">
        <?php
        include('navbar.php')
        ?>

    </div>
    <div class="detailMainContainer">
        <img src="<?php echo $cPhoto; ?>" class="detailImg">
        <div class="detailContent">
            <div class="detailFact">
                <p class="detailTitle">Title:</p>
                <p class="detailText"><?php echo $cTitle; ?></p>
            </div>
            <div class="detailFact">
                <p class="detailTitle">Vision:</p>
                <p class="detailText"><?php echo $cDes; ?></p>
            </div>
            <div class="detailFact">
                <p class="detailTitle">Aim:</p>
                <p class="detailText"><?php echo $cAim; ?></p>
            </div>
            <div class="detailFact">
                <p class="detailTitle">Address:</p>
                <p class="detailText"><?php echo $cAddress; ?></p>
            </div>
            <div class="combineDetail">
                <div class="detailFact">
                    <p class="detailTitle">Start Date:</p>
                    <p class="detailText"><?php echo $cStart; ?></p>
                </div>
                <div class="detailFact">
                    <p class="detailTitle">End Date:</p>
                    <p class="detailText"><?php echo $cEnd; ?></p>
                </div>
                <div class="detailFact">
                    <p class="detailTitle">Duration:</p>
                    <p class="detailText"><?php echo $cDuration; ?></p>
                </div>
            </div>
            <div class="detailFact">
                <p class="detailTitle">Related Social Media:</p>
                <p class="detailText"><?php echo $socialName; ?></p>
            </div>
            <form action="informationDetail.php" method="POST">
                <input type="hidden" name="txtuserID" value="<?php echo $_SESSION['uID']; ?>">

                <input type="hidden" name="txtDate" value="<?php echo date('Y/m/d'); ?>">
                <input type="hidden" name="txtTime" value="<?php echo date('h:i:sa'); ?>">

                <?php if ($cStatus == 'Available'): ?>
                <input type="submit" name="btnParticipate" value="Participate" class="contactBtn">
                <?php else: ?>
                <input type="button" value="Participate" class="contactBtn" disabled>
                <?php endif; ?>

                <input type="hidden" name="txtcampaignID" value="<?php echo $id; ?>">
            </form>
        </div>
        <?php

        ?>

    </div>
    <div class="homeMap"><?php echo $cLocation; ?></div>
</body>

</html>