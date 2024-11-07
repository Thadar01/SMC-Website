<?php
include("connect.php");


if (isset($_GET["pid"])) {
    $pID = $_GET['pid'];
    $deleteQuery = "DELETE FROM userParticipate WHERE participateID='$pID'";
    $deleteResult = mysqli_query($connect, $deleteQuery);
    if ($deleteResult) {
        echo "<script>window.alert('Delete Success')</script>";
        echo "<script>window.location='adminParticipate.php'</script>";
    } else {
        echo "<script>window.alert('Delete Fail')</script>";
        echo "<script>window.location='adminParticipate.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Participated list</title>
</head>

<body class="dashboardContainer">
    <?php include('navBar.php') ?>
    <div class="campaignMainContainer">
        <section class="adminCamHeader">
            <h1>User Paritipated list</h1>

        </section>
        <section class="campaignTableContainer">
            <?php
            $selectQuery = "SELECT * FROM userParticipate ";
            $runSelectQuery = mysqli_query($connect, $selectQuery);
            while ($fetchArray = mysqli_fetch_array($runSelectQuery)) {
                $paID=$fetchArray["participateID"];
                $uID = $fetchArray["userID"];
                $paDate = $fetchArray["participateDate"];
                $paTime = $fetchArray["participateTime"];
                $camID = $fetchArray["campaignID"];

                $selectUser = "SELECT * FROM user WHERE userID='$uID'";
                $runSelect = mysqli_query($connect, $selectUser);
                $uArr = mysqli_fetch_array($runSelect);
                $uName = $uArr["userName"];

                $selectCampaign = "SELECT * FROM campaign WHERE campaignID='$camID'";
                $runSelectCam = mysqli_query($connect, $selectCampaign);
                $camArr = mysqli_fetch_array($runSelectCam);
                $camTitle = $camArr["campaignTitle"];

            ?>
            <div class="campaingListContainer">
                <p><span>User Name:</span> <?php echo $uName; ?></p>

                <p><span>Date:</span> <?php echo $paDate; ?> </p>

                <p><span>Time:</span> <?php echo $paTime; ?></p>
                <p><span>Campaign Title:</span> <?php echo $camTitle; ?></p>
                <div class="editDContainer">
                    <a href="adminParticipate.php?pid=<?php echo $paID; ?>" class="deleteBtn">Delete</a>
                </div>




            </div>
            <?php } ?>












        </section>

    </div>


</body>

</html>