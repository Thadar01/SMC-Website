<?php
include("connect.php");

//delete
if (isset($_GET["soid"])) {
    $sID = $_GET['soid'];
    $deleteQuery = "DELETE FROM socialMedia WHERE socialMediaID='$sID'";
    $deleteResult = mysqli_query($connect, $deleteQuery);
    if ($deleteResult) {
        echo "<script>window.alert('Delete Success')</script>";
        echo "<script>window.location='adminSocial.php'</script>";
    } else {
        echo "<script>window.alert('Delete Fail')</script>";
        echo "<script>window.location='adminSocial.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Social Media</title>
</head>

<body class="dashboardContainer">
    <?php include('navBar.php') ?>
    <div class="campaignMainContainer">
        <section class="adminCamHeader">
            <h1>Social Media</h1>
            <form action="adminSocial.php" method="post" class="actionContainer">
                <input name="txtSearch" placeholder="Search width social media name" class="searchInput">
                <input type="Submit" name="btnSearch" value="Search" class="searchButton">
                <!--need to remove the shadow-->
                <a href="socialMediaForm.php">Add</a>
            </form>
        </section>
        <section class="campaignTableContainer">
            <?php
            if (isset($_POST['btnSearch'])) {
                $searchData = $_POST['txtSearch'];
                $searchQuery = "SELECT * FROM socialMedia WHERE socialMediaName LIKE '$searchData%' ";
                $runSearchQuery = mysqli_query($connect, $searchQuery);

                while ($fetchArray = mysqli_fetch_array($runSearchQuery)) {
                    $mid = $fetchArray["socialMediaID"];
                    $mName = $fetchArray["socialMediaName"];
                    $mYear = $fetchArray["socialPublishYear"];
                    $mPopu = $fetchArray["socialMediaPopularity"];
                    $mPhoto = $fetchArray["socialMediaPhoto"];
                    $mDes = $fetchArray["socialMediaDescription"];
            ?>

            <div class="campaingListContainer">
                <p><span>Name:</span> <?php echo $mName; ?></p>

                <p><span>Description:</span> <?php echo $mDes; ?> </p>

                <p><span>Popularity:</span> <?php echo $mPopu; ?></p>

                <p><span>Published Date:</span> Since <?php echo $mYear; ?> </p>


                <div class="editDContainer">
                    <a href="editSocial.php?soid=<?php echo $mid; ?>" class="editBtn">Edit</a>
                    <a href="adminSocial.php?soid=<?php echo $mid; ?>" class="deleteBtn">Delete</a>
                </div>

            </div>


            <?php
                }
            } else {
                $searchQuery = "SELECT * FROM socialMedia";
                $runSearchQuery = mysqli_query($connect, $searchQuery);

                while ($fetchArray = mysqli_fetch_array($runSearchQuery)) {
                    $mid = $fetchArray["socialMediaID"];
                    $mName = $fetchArray["socialMediaName"];
                    $mYear = $fetchArray["socialPublishYear"];
                    $mPopu = $fetchArray["socialMediaPopularity"];
                    $mPhoto = $fetchArray["socialMediaPhoto"];
                    $mDes = $fetchArray["socialMediaDescription"];
                ?>
            <div class="campaingListContainer">
                <p><span>Name:</span> <?php echo $mName; ?></p>

                <p><span>Description:</span> <?php echo $mDes; ?> </p>

                <p><span>Popularity:</span> <?php echo $mPopu; ?></p>

                <p><span>Published Date:</span> Since <?php echo $mYear; ?> </p>

                <div class="editDContainer">
                    <a href="editSocial.php?soid=<?php echo $mid; ?>" class="editBtn">Edit</a>
                    <a href="adminSocial.php?soid=<?php echo $mid; ?>" class="deleteBtn">Delete</a>
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