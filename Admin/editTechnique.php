<?php

include('connect.php');


if (isset($_POST['btnEdit'])) {
    $TID = $_POST['txtTechniqueID'];
    $tName = $_POST['txtTechniqueName'];
    $tTips = $_POST['txtTechniqueTips'];
    $tBenefits = $_POST['txtTechniqueBenefits'];
    $sID = $_POST['selectMedia'];

    //save into the database
    $editQuery = "UPDATE safeTechnique 
    SET 
    techniqueName='$tName', 
    techniqueTips='$tTips', 
    techniqueBenefits='$tBenefits', 
    socialMediaID='$sID' 
    WHERE techniqueID='$TID'";

    $editResultQuery = mysqli_query($connect, $editQuery);
    if ($editResultQuery) {
        echo "<script>alert('Technique Data updated successfully!');</script>";
        echo "<script>window.location='adminTechnique.php';</script>";
    } else {
        echo "<script>alert('Technique Data update failed!');</script>";
        echo "<script>window.location='adminTechnique.php';</script>";
    }
}

$techniID = $_GET['tid'];
$selectsTechQuery = "SELECT * FROM safeTechnique WHERE techniqueID='$techniID'";
$runSelectsTechQuery = mysqli_query($connect, $selectsTechQuery);
$fetchsTechArray = mysqli_fetch_array($runSelectsTechQuery);
$tid = $fetchsTechArray["techniqueID"];
$techName = $fetchsTechArray["techniqueName"];
$techTips = $fetchsTechArray["techniqueTips"];
$techBenefits = $fetchsTechArray["techniqueBenefits"];
$smID = $fetchsTechArray["socialMediaID"];

$showmedia = "SELECT * FROM socialMedia WHERE socialMediaID='$smID'";
$showQuery = mysqli_query($connect, $showmedia);
$array = mysqli_fetch_array($showQuery);
$mname = $array['socialMediaName'];

$mediaList = "SELECT * FROM socialMedia";
$mediaQuery = mysqli_query($connect, $mediaList);

$mCount = mysqli_num_rows($mediaQuery);

?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Technique Edit Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css?s=<?php echo time(); ?>">

</head>

<body class="dashboardContainer">

    <?php include 'navBar.php' ?>
    <div class="camTypeMainContainer">
        <form action="editTechnique.php" method="POST" class="camTypeFormConatiner">
            <input type="hidden" name="txtTechniqueID" placeholder="Name" required class="textInput"
                value="<?php echo $tid ?>">
            <div>
                <label>Name: </label>
                <input type="text" name="txtTechniqueName" placeholder="Name" required class="textInput"
                    value="<?php echo $techName ?>">
            </div>
            <div>
                <label>Tips: </label>
                <textarea cols="30" rows="5" name="txtTechniqueTips"
                    class="textInput"><?php echo $techTips ?></textarea>
            </div>
            <div>
                <label>Benefits: </label>
                <textarea cols="30" rows="5" name="txtTechniqueBenefits"
                    class="textInput"><?php echo $techBenefits ?></textarea>
            </div>


            <div class="selectionContainer">
                <label>Media: </label>
                <select class="selection" name="selectMedia">

                    <?php
                    echo "<option class='option' value='$smID'>$mname</option>";
                    $mediaList = "SELECT * FROM socialMedia";
                    $mediaQuery = mysqli_query($connect, $mediaList);

                    $mCount = mysqli_num_rows($mediaQuery);
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
                <input type="submit" name="btnEdit" value="Edit" class="camInput">
                <input type="reset" name="btnClear" value="Clear" class="camInput">
            </div>



    </div>
</body>

</html>