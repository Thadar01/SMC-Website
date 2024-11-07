<?php
include('connect.php');


if (isset($_POST['btnEdit'])) {
    $cID = $_POST['txtCampaignID'];
    $cTitle = $_POST['txtCampaignTitle'];
    $cDes = $_POST['txtCampaignDes'];
    $cAim = $_POST['txtCampaignAim'];
    $cAddress = $_POST['txtCampaignAddress'];
    $cLocation = $_POST['txtCampaignLocation'];
    $cStart = $_POST['txtStartDate'];
    $cEnd = $_POST['txtEndDate'];
    $cDuration = $_POST['txtCampaignDuration'];

    $cStatus = $_POST['txtCampaignStatus'];
    $soID = $_POST['selectMedia'];

    $cPhoto = $_FILES['txtCampaignPhoto']['name'];
    $folder = '../Image/';
    $path = $folder . "_" . $cPhoto;
    $copy = copy($_FILES['txtCampaignPhoto']['tmp_name'], $path);

    //save into the database
    $editQuery = "UPDATE campaign 
    SET 
    campaignTitle='$cTitle', 
    campaignPhoto='$path',
    campaignVision='$cDes', 
    campaignAim='$cAim', 
    campaignAddress='$cAddress', 
    campaignLocation='$cLocation', 
    campaignStart='$cStart', 
    campaignEnd='$cEnd', 
    Duration='$cDuration', 
    campaignStatus='$cStatus', 
    socialMediaID='$soID' 
    WHERE campaignID='$cID'";

    $editResultQuery = mysqli_query($connect, $editQuery);
    if ($editResultQuery) {
        echo "<script>alert('Campaign  updated successfully!');</script>";
        echo "<script>window.location='adminCampaign.php';</script>";
    } else {
        echo "<script>alert('Campaign update failed!');</script>";
        echo "<script>window.location='adminCampaign.php';</script>";
    }
}

//to show the data in text box
$campaignID = $_GET['cid'];
$selectsQuery = "SELECT * FROM campaign WHERE campaignID='$campaignID'";
$runSelectsQuery = mysqli_query($connect, $selectsQuery);
$fetchsArray = mysqli_fetch_array($runSelectsQuery);
$camID = $fetchsArray["campaignID"];
$camTitle = $fetchsArray["campaignTitle"];
$camPhoto = $fetchsArray["campaignPhoto"];
$camAddress = $fetchsArray["campaignAddress"];
$camDes = $fetchsArray["campaignVision"];
$camAim = $fetchsArray["campaignAim"];
$camLocation = $fetchsArray["campaignLocation"];
$camStart = $fetchsArray["campaignStart"];
$camEnd = $fetchsArray["campaignEnd"];
$camDuration = $fetchsArray["Duration"];
$camSocial = $fetchsArray["socialMediaID"];
$camStatus = $fetchsArray['campaignStatus'];
$smID = $fetchsArray['socialMediaID'];


$showmedia = "SELECT * FROM socialMedia WHERE socialMediaID='$smID'";
$showQuery = mysqli_query($connect, $showmedia);
$array = mysqli_fetch_array($showQuery);
$mname = $array['socialMediaName'];

//for select box
$mediaList = "SELECT * FROM socialMedia";
$mediaQuery = mysqli_query($connect, $mediaList);

$mCount = mysqli_num_rows($mediaQuery);




?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Campaign Edit Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css?s=<?php echo time(); ?>">

</head>

<body class="dashboardContainer">
    <?php include 'navBar.php' ?>
    <div class="camTypeMainContainer">
        <form action="editCampaign.php" method="POST" class="camTypeFormConatiner" enctype="multipart/form-data">
            <p>Campaign Form</p>
            <input type="hidden" name="txtCampaignID" placeholder="Name" required class="textInput"
                value="<?php echo $campaignID ?>">
            <div>
                <label>Title: </label>
                <input type="text" name="txtCampaignTitle" placeholder="Campaign Title" required class="textInput"
                    value="<?php echo $camTitle; ?>">
            </div>
            <div>
                <label>Vision: </label>
                <textarea cols="30" rows="5" name="txtCampaignDes" class="textInput"><?php echo $camDes; ?></textarea>
            </div>
            <div>
                <label>Aim: </label>
                <textarea cols="30" rows="5" name="txtCampaignAim" class="textInput"><?php echo $camAim; ?></textarea>
            </div>

            <div>
                <label>Campaign Address: </label>
                <textarea cols="30" rows="5" name="txtCampaignAddress"
                    class="textInput"><?php echo $camAddress; ?></textarea>
            </div>
            <div>
                <label>Campaign Location: </label>
                <textarea cols="30" rows="5" name="txtCampaignLocation"
                    class="textInput"><?php echo $camLocation; ?></textarea>

            </div>
            <div>
                <label>Start Date: </label>
                <input type="date" name="txtStartDate" required class="textInput" value="<?php echo $camStart; ?>">
            </div>
            <div>
                <label>End Date: </label>
                <input type="date" name="txtEndDate" required class="textInput" value="<?php echo $camEnd; ?>">
            </div>
            <div>
                <label>Duration: </label>
                <input type="text" name="txtCampaignDuration" placeholder="Duration" required class="textInput"
                    value="<?php echo $camDuration; ?>">
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
                <select class="selection" name="selectMedia" class="textInput">

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