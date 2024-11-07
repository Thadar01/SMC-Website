<?php

include('connect.php');

//insert into database

if (isset($_POST['btnSave'])) {
    $cTitle = $_POST['txtCampaignTitle'];
    $cDes = $_POST['txtCampaignDes'];
    $cAim = $_POST['txtCampaignAim'];
    $cAddress = $_POST['txtCampaignAddress'];
    $cLocation = $_POST['txtCampaignLocation'];
    $cStart = $_POST['txtStartDate'];
    $cEnd = $_POST['txtEndDate'];
    $cDuration = $_POST['txtCampaignDuration'];
    $cStatus = $_POST['txtCampaignStatus'];
    $smID = $_POST['selectMediaID'];

    //photo save

    $img = $_FILES['txtCampaignPhoto']['name'];
    $folder = "../Image/";
    $media = $folder . "_" . $img;
    $copy = copy($_FILES['txtCampaignPhoto']['tmp_name'], $media);




    $camSave = "INSERT INTO campaign (campaignTitle,campaignPhoto,campaignVision,campaignAim,campaignAddress,campaignLocation,campaignStart,campaignEnd,Duration,campaignStatus,socialMediaID)
        VALUES ('$cTitle','$media','$cDes','$cAim','$cAddress','$cLocation','$cStart','$cEnd','$cDuration','$cStatus','$smID')
        
        ";

    $camSaveQuery = mysqli_query($connect, $camSave);
    if ($camSaveQuery) {
        echo "<script>alert('Campaing Data stored successfully!');</script>";
        echo "<script>window.location='adminCampaign.php';</script>";
    } else {
        echo "<script>alert('Campaing Data store failed!');</script>";
        echo "<script>window.location='adminCampaign.php';</script>";
    }
}

//socialMedia table
$mediaList = "SELECT * FROM socialMedia";
$mediaQuery = mysqli_query($connect, $mediaList);

$mCount = mysqli_num_rows($mediaQuery);


?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Campaing Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css?s=<?php echo time(); ?>">

</head>

<body class="dashboardContainer">
    <?php include 'navBar.php' ?>
    <div class="camTypeMainContainer">
        <form action="campaignForm.php" method="POST" class="camTypeFormConatiner" enctype="multipart/form-data">
            <p>Campaing Form</p>
            <div>
                <label>Title: </label>
                <input type="text" name="txtCampaignTitle" placeholder="Campaing Title" required class="textInput">
            </div>
            <div>
                <label>Vision: </label>
                <textarea cols="30" rows="5" name="txtCampaignDes" class="textInput"></textarea>
            </div>
            <div>
                <label>Aim: </label>
                <textarea cols="30" rows="5" name="txtCampaignAim" class="textInput"></textarea>
            </div>

            <div>
                <label>Campaing Address: </label>
                <textarea cols="30" rows="5" name="txtCampaignAddress" class="textInput"></textarea>
            </div>
            <div>
                <label>Campaing Location: </label>
                <textarea cols="30" rows="5" name="txtCampaignLocation" class="textInput"></textarea>

            </div>
            <div>
                <label>Start Date: </label>
                <input type="date" name="txtStartDate" required class="textInput">
            </div>
            <div>
                <label>End Date: </label>
                <input type="date" name="txtEndDate" required class="textInput">
            </div>
            <div>
                <label>Duration: </label>
                <input type="text" name="txtCampaignDuration" placeholder="Duration" required class="textInput">
            </div>
            <div>
                <label>Photo: </label>
                <input type="file" name="txtCampaignPhoto" required class="textInput">

            </div>

            <div class="radioButton">
                <div>
                    <input type="radio" name="txtCampaignStatus" value="Available" required checked>
                    <label>Available</label>
                </div>
                <div>
                    <input type="radio" name="txtCampaignStatus" value="not Available" required>
                    <label>Not Available</label>
                </div>
            </div>
            <div class="selectionContainer">
                <label>Media: </label>
                <select class="selection" name="selectMediaID" class="textInput">


                    <?php
                    for ($i = 0; $i < $mCount; $i++) {
                        $arr = mysqli_fetch_array($mediaQuery);
                        $mediaID = $arr["socialMediaID"];
                        $mediaName = $arr["socialMediaName"];
                        echo "<option class='option textInput' value='$mediaID'>$mediaName</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="camInputContainer">
                <input type="submit" name="btnSave" value="Save" class="camInput">
                <input type="reset" name="btnClear" value="Clear" class="camInput">
            </div>




    </div>
</body>

</html>