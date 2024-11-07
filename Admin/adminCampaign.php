<?php

include("connect.php");

//Delete
if (isset($_GET["cid"])) {
    $cID = $_GET['cid'];
    $deleteQuery = "DELETE FROM campaign WHERE campaignID='$cID'";
    $deleteResult = mysqli_query($connect, $deleteQuery);
    if ($deleteResult) {
        echo "<script>window.alert('Delete Success')</script>";
        echo "<script>window.location='adminCampaign.php'</script>";
    } else {
        echo "<script>window.alert('Delete Fail')</script>";
        echo "<script>window.location='adminCampaign.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Campaign</title>
</head>

<body class="dashboardContainer">
    <?php include('navBar.php') ?>
    <div class="campaignMainContainer">
        <section class="adminCamHeader">
            <h1>Campaigns</h1>
            <form action="adminCampaign.php" method="post" class="actionContainer">
                <input name="txtSearch" placeholder="Search width campaign title" class="searchInput">
                <input type="Submit" name="btnSearch" value="Search" class="searchButton">
                <!--need to remove the shadow-->
                <a href="campaignForm.php">Add</a>
            </form>
        </section>
        <section class="campaignTableContainer">

            <?php
            if (isset($_POST['btnSearch'])) {
                $searchData = $_POST['txtSearch'];
                $selectInfoQuery = "SELECT * FROM campaign WHERE campaignTitle LIKE '$searchData%' ";
                $runSelectInfoQuery = mysqli_query($connect, $selectInfoQuery);
                while ($fetchInfoArray = mysqli_fetch_array($runSelectInfoQuery)) {
                    $cID = $fetchInfoArray["campaignID"];
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
                    $cStatus = $fetchInfoArray['campaignStatus'];
            ?>
            <div class="campaingListContainer">
                <p><span>Campaign Title:</span> <?php echo $cTitle; ?></p>

                <p><span>Vision:</span> <?php echo $cDes; ?> </p>

                <p><span>Aim:</span> <?php echo $cAim; ?></p>

                <p><span>Address:</span> <?php echo $cAddress; ?> </p>

                <p><span>Start Date:</span> <?php echo $cStart; ?></p>

                <p><span>End Date:</span> <?php echo $cEnd; ?></p>

                <p><span>Duration:</span> <?php echo $cDuration; ?></p>

                <p><span>Status:</span> <?php echo $cStatus; ?></p>
                <div class="editDContainer">
                    <a href="editCampaign.php?cid=<?php echo $cID; ?>" class="editBtn">Edit</a>
                    <a href="adminCampaign.php?cid=<?php echo $cID; ?>" class="deleteBtn">Delete</a>
                </div>

            </div>
            <?php
                }
            } else {
                $selectInfoQuery = "SELECT * FROM campaign";
                $runSelectInfoQuery = mysqli_query($connect, $selectInfoQuery);
                while ($fetchInfoArray = mysqli_fetch_array($runSelectInfoQuery)) {
                    $cID = $fetchInfoArray["campaignID"];
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
                    $cStatus = $fetchInfoArray['campaignStatus'];
                ?>
            <div class="campaingListContainer">
                <p><span>Campaign Title:</span> <?php echo $cTitle; ?></p>

                <p><span>Vision:</span> <?php echo $cDes; ?> </p>

                <p><span>Aim:</span> <?php echo $cAim; ?></p>

                <p><span>Address:</span> <?php echo $cAddress; ?> </p>

                <p><span>Start Date:</span> <?php echo $cStart; ?></p>

                <p><span>End Date:</span> <?php echo $cEnd; ?></p>

                <p><span>Duration:</span> <?php echo $cDuration; ?></p>

                <p><span>Status:</span> <?php echo $cStatus; ?></p>
                <div class="editDContainer">
                    <a href="editCampaign.php?cid=<?php echo $cID; ?>" class="editBtn">Edit</a>
                    <a href="adminCampaign.php?cid=<?php echo $cID; ?>" class="deleteBtn">Delete</a>
                </div>

            </div>
            <?php
                }
            }
            ?>












        </section>

    </div>


</body>

</html>