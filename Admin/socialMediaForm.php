<?php
// session_start(); 

// Database connection
include("connect.php");



if (isset($_POST['btnSave'])) {
    $mName = $_POST['txtSocailMediaName'];
    $mDes = $_POST['txtSocialMedaiDes'];
    $mYear = $_POST['txtSocialMediaYear'];
    $mPopular = $_POST['txtSocialMediaPop'];


    // Photo upload
    $image = $_FILES['txtSocialMediaPhoto']['name'];
    $folder = "../Image/";
    $file = $folder . "_" . $image;
    $tmp_name = $_FILES['txtSocialMediaPhoto']['tmp_name'];
    $uploadSuccess = move_uploaded_file($tmp_name, $file);

    if (!$uploadSuccess) {
        echo '<p>Cannot upload photo!</p>';
    } else {

        $insertQuery = "INSERT INTO socialMedia (socialMediaName, socialMediaDescription, socialPublishYear,socialMediaPopularity,socialMediaPhoto)
                        VALUES ('$mName', '$mDes', '$mYear','$mPopular','$file')";
        $result = mysqli_query($connect, $insertQuery);

        if ($result) {
            echo "<script>alert('Social Media Data stored successfully!');</script>";
            echo "<script>window.location='adminSocial.php';</script>";
        } else {
            echo "<script>alert('Social Media Data store failed!');</script>";
            echo "<script>window.location='adminSocial.php';</script>";
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'navBar.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Media</title>
    <link rel="stylesheet" type="text/css" href="style.css?s=<?php echo time(); ?>">
</head>

<body class="dashboardContainer">
    <div class="camTypeMainContainer">
        <form action="socialMediaForm.php" method="POST" class="camTypeFormConatiner" enctype="multipart/form-data">
            <div>
                <label>Name: </label>
                <input type="text" name="txtSocailMediaName" placeholder="Social Media Name" required class="textInput">
            </div>
            <div>
                <label>Description: </label>
                <textarea cols="30" rows="5" name="txtSocialMedaiDes" class="textInput"></textarea>
            </div>
            <div>
                <label>Published Year: </label>
                <input type="text" name="txtSocialMediaYear" placeholder="Published Year" class="textInput">
            </div>
            <div>
                <label>Popularity: </label>
                <input type="text" name="txtSocialMediaPop" placeholder="Popularity" required class="textInput">
            </div>
            <div>
                <label>Media Photo: </label>
                <input type="file" name="txtSocialMediaPhoto" required class="textInput">
            </div>
            <div class="camInputContainer">
                <input type="submit" name="btnSave" value="Save" class="camInput">
                <input type="reset" name="btnClear" value="Clear" class="camInput">
            </div>
        </form>

    </div>
</body>

</html>