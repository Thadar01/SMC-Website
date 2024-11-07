<?php

include("connect.php");

if (isset($_POST['btnEdit'])) {
    $soId = $_POST['txtSocialMediaID'];

    $soName = $_POST['txtSocialMediaName'];
    $soDes = $_POST['txtSocialMediaDes'];
    $soYear = $_POST['txtSocialMediaYear'];
    $soPop = $_POST['txtSocialMediaPop'];

    //phptp upload
    $sophoto = $_FILES['txtSocialMediaPhoto']['name'];
    $folder = '../Image/';
    $path = $folder . "_" . $sophoto;
    $copy = copy($_FILES['txtSocialMediaPhoto']['tmp_name'], $path);

    //insert into database
    $editQuery = "UPDATE socialMedia 
    SET 
    socialMediaName='$soName', 
    socialMediaDescription='$soDes', 
    socialPublishYear='$soYear', 
    socialMediaPopularity='$soPop', 
    socialMediaPhoto='$path' 
    WHERE socialMediaID='$soId'";

    $editResultQuery = mysqli_query($connect, $editQuery);
    if ($editResultQuery) {
        echo "<script>alert('Social Media Data updated successfully!');</script>";
        echo "<script>window.location='adminSocial.php';</script>";
    } else {
        echo "<script>alert('Social Media Data update failed!');</script>";
        echo "<script>window.location='adminSocial.php';</script>";
    }
}

//to show in the text box
$mediaID = $_GET['soid'];
$selectsQuery = "SELECT * FROM socialMedia WHERE socialMediaID='$mediaID'";
$runSelectsQuery = mysqli_query($connect, $selectsQuery);
$fetchArray = mysqli_fetch_array($runSelectsQuery);
$sid = $fetchArray["socialMediaID"];
$sName = $fetchArray["socialMediaName"];
$sDesc = $fetchArray["socialMediaDescription"];
$sYear = $fetchArray["socialPublishYear"];
$sPop = $fetchArray["socialMediaPopularity"];
$sPhoto = $fetchArray["socialMediaPhoto"];



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'navBar.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Media Edit Form/head></title>
    <link rel="stylesheet" type="text/css" href="style.css?s=<?php echo time(); ?>">
</head>

<body class="dashboardContainer">
    <div class="camTypeMainContainer">
        <form action="editSocial.php" method="POST" class="camTypeFormConatiner" enctype="multipart/form-data">
            <input type="hidden" name="txtSocialMediaID" value="<?php echo $mediaID; ?>">
            <div>
                <label>Name: </label>
                <input type="text" name="txtSocialMediaName" value="<?php echo $sName; ?>"
                    placeholder="Social Media Name" required class="textInput">
            </div>
            <div>
                <label>Description: </label>
                <textarea cols="30" rows="5" name="txtSocialMediaDes" class="textInput"><?php echo $sDesc; ?></textarea>
            </div>
            <div>
                <label>Published Year: </label>
                <input type="text" name="txtSocialMediaYear" value="<?php echo $sYear; ?>" placeholder="Published Year"
                    class="textInput">
            </div>
            <div>
                <label>Popularity: </label>
                <input type="text" name="txtSocialMediaPop" value="<?php echo $sPop; ?>" placeholder="Popularity"
                    required class="textInput">
            </div>
            <div>
                <label>Media Photo: </label>
                <input type="file" name="txtSocialMediaPhoto" required class="textInput">
            </div>
            <div class="camInputContainer">
                <input type="submit" name="btnEdit" value="Edit" class="camInput">
                <input type="reset" name="btnClear" value="Clear" class="camInput">
            </div>
        </form>

    </div>
</body>

</html>