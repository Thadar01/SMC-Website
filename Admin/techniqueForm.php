<?php

include('connect.php');



if (isset($_POST['btnSave'])) {
    $tName = $_POST['txtTechniqueName'];
    $tTips = $_POST['txtTechniqueTips'];
    $tBenefits = $_POST['txtTechniqueBenefits'];
    $smID = $_POST['selectMedia'];



    //save into the database
    $camSave = "INSERT INTO safeTechnique (techniqueName,techniqueTips,techniqueBenefits,socialMediaID)
        VALUES ('$tName','$tTips','$tBenefits','$smID')
        
        ";

    $camSaveQuery = mysqli_query($connect, $camSave);
    if ($camSaveQuery) {
        echo "<script>alert('Campaing Data stored successfully!');</script>";
        echo "<script>window.location=' adminTechnique.php';</script>";
    } else {
        echo "<script>alert('Campaing Data store failed!');</script>";
        echo "<script>window.location='adminTechnique.php';</script>";
    }
}

$mediaList = "SELECT * FROM socialMedia";
$mediaQuery = mysqli_query($connect, $mediaList);

$mCount = mysqli_num_rows($mediaQuery);


?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Technique Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css?s=<?php echo time(); ?>">

</head>

<body class="dashboardContainer">
    <?php include 'navBar.php' ?>
    <div class="camTypeMainContainer">
        <form action="techniqueForm.php" method="POST" class="camTypeFormConatiner">
            <div>
                <label>Name: </label>
                <input type="text" name="txtTechniqueName" placeholder="Name" required class="textInput">
            </div>
            <div>
                <label>Tips: </label>
                <textarea cols="30" rows="5" name="txtTechniqueTips" class="textInput"></textarea>
            </div>
            <div>
                <label>Benefits: </label>
                <textarea cols="30" rows="5" name="txtTechniqueBenefits" class="textInput"></textarea>
            </div>


            <div class="selectionContainer">
                <label>Media: </label>
                <select class="selection" name="selectMedia">


                    <?php
                    for ($i = 0; $i < $mCount; $i++) {
                        $arr = mysqli_fetch_array($mediaQuery);
                        $mediaID = $arr["socialMediaID"];
                        $mediaName = $arr["socialMediaName"];
                        echo "<option class='selection' value='$mediaID'>$mediaName</option>";
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