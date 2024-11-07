<?php
include("connect.php");

//delete
if (isset($_GET["tid"])) {
    $tID = $_GET['tid'];
    $deleteQuery = "DELETE FROM safeTechnique WHERE techniqueID='$tID'";
    $deleteResult = mysqli_query($connect, $deleteQuery);
    if ($deleteResult) {
        echo "<script>window.alert('Delete Success')</script>";
        echo "<script>window.location='adminTechnique.php'</script>";
    } else {
        echo "<script>window.alert('Delete Fail')</script>";
        echo "<script>window.location='adminTechnique.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashbpard Techniques</title>
</head>

<body class="dashboardContainer">
    <?php include('navBar.php') ?>
    <div class="campaignMainContainer">
        <section class="adminCamHeader">
            <h1>Safe Techniques</h1>
            <form action="adminTechnique.php" method="post" class="actionContainer">
                <input name="txtSearch" placeholder="Search width technique name" class="searchInput">
                <input type="Submit" name="btnSearch" value="Search" class="searchButton">
                <!--need to remove the shadow-->
                <a href="techniqueForm.php">Add</a>
            </form>
        </section>
        <section class="campaignTableContainer">
            <?php
            if (isset($_POST['btnSearch'])) {
                $searchData = $_POST['txtSearch'];
                $selectsTechQuery = "SELECT * FROM safeTechnique WHERE techniqueName LIKE '%$searchData%' ";

                $runSelectsTechQuery = mysqli_query($connect, $selectsTechQuery);
                while ($fetchsTechArray = mysqli_fetch_array($runSelectsTechQuery)) {
                    $techId = $fetchsTechArray["techniqueID"];
                    $techName = $fetchsTechArray["techniqueName"];
                    $techTips = $fetchsTechArray["techniqueTips"];
                    $techBenefits = $fetchsTechArray["techniqueBenefits"];
                    $smID = $fetchsTechArray["socialMediaID"];

                    $selectQuery = "SELECT * FROM socialMedia WHERE socialMediaID='$smID'";
                    $runSelectQuery = mysqli_query($connect, $selectQuery);
                    $fetchArray = mysqli_fetch_array($runSelectQuery);
                    $socialName = $fetchArray["socialMediaName"];

            ?>
            <div class="campaingListContainer">
                <p><span>Technique Name:</span> <?php echo $techName; ?></p>
                <p><span>Tips to use:</span> <?php echo $techTips; ?> </p>
                <p><span>Benefits:</span> <?php echo $techBenefits; ?></p>
                <p><span>Related Social Media:</span> <?php echo $socialName; ?></p>
                <div class="editDContainer">
                    <a href="editTechnique.php?tid=<?php echo $techId; ?>" class="editBtn">Edit</a>
                    <a href="adminTechnique.php?tid=<?php echo $techId; ?>" class="deleteBtn">Delete</a>
                </div>
            </div>
            <?php
                }
            } else {
                $selectsTechQuery = "SELECT * FROM safeTechnique ";
                $runSelectsTechQuery = mysqli_query($connect, $selectsTechQuery);
                while ($fetchsTechArray = mysqli_fetch_array($runSelectsTechQuery)) {
                    $techId = $fetchsTechArray["techniqueID"];

                    $techName = $fetchsTechArray["techniqueName"];
                    $techTips = $fetchsTechArray["techniqueTips"];
                    $techBenefits = $fetchsTechArray["techniqueBenefits"];
                    $smID = $fetchsTechArray["socialMediaID"];

                    $selectQuery = "SELECT * FROM socialMedia WHERE socialMediaID='$smID'";
                    $runSelectQuery = mysqli_query($connect, $selectQuery);
                    $fetchArray = mysqli_fetch_array($runSelectQuery);
                    $socialName = $fetchArray["socialMediaName"];

                ?>
            <div class="campaingListContainer">
                <p><span>Technique Name:</span> <?php echo $techName; ?></p>
                <p><span>Tips to use:</span> <?php echo $techTips; ?> </p>
                <p><span>Benefits:</span> <?php echo $techBenefits; ?></p>
                <p><span>Related Social Media:</span> <?php echo $socialName; ?></p>
                <div class="editDContainer">
                    <a href="editTechnique.php?tid=<?php echo $techId; ?>" class="editBtn">Edit</a>
                    <a href="adminTechnique.php?tid=<?php echo $techId; ?>" class="deleteBtn">Delete</a>
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