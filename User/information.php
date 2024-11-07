<?php
include("connect.php");
session_start();
if (!isset($_SESSION['uID'])) {
    echo "<script>window.alert('SignIn Again!')</script>";
    echo "<script>window.location='userSignIn.php'</script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information</title>
    <link rel="stylesheet" type="text/css" href="style.css?s=<?php echo time(); ?>">

</head>


<body class="homeMainConatainer">
    <div class="navAndSearch">
        <?php
        include('navbar.php')
        ?>
        <form action="information.php" method="POST" class="navSearch">
            <input name="txtSearch" placeholder="Search..." class="searchInput">
            <input type="Submit" name="btnSearch" value="Search" class="searchButton">
        </form>
    </div>
    <div class="mainContentConatier">
        <?php
        if (isset($_POST['btnSearch'])) {
            $searchData = $_POST['txtSearch'];
            $searchQuery = "SELECT * FROM campaign WHERE campaignTitle LIKE '$searchData%' ";
            $runSearchQuery = mysqli_query($connect, $searchQuery);

            while ($fetchArray1 = mysqli_fetch_array($runSearchQuery)) {
                $cid1 = $fetchArray1["campaignID"];
                $cTitle1 = $fetchArray1["campaignTitle"];
                $cDes1 = $fetchArray1["campaignVision"];
                $cStatus1 = $fetchArray1["campaignStatus"];
                $cPhoto1 = $fetchArray1["campaignPhoto"];
        ?>
        <div class="contentList">
            <img src="<?php echo $cPhoto1; ?>" class="campaignImg">
            <div class="contextTextContainer">
                <div class="contentText">
                    <p>Title: </p>
                    <p><?php echo $cTitle1; ?></p>
                </div>
                <div class="contentText">
                    <p>Vision: </p>
                    <p><?php echo $cDes1; ?></p>
                </div>
                <div class="contentText">
                    <p>Status: </p>
                    <p><?php echo $cStatus1; ?></p>
                </div>
                <div class="campaignMore">
                    <a href="informationDetail.php?cID=<?php echo $cid1; ?>">More Details</a>
                </div>
            </div>
        </div>
        <?php
            }
        } else {
            $selectQuery = "SELECT * FROM campaign";
            $runSelectQuery = mysqli_query($connect, $selectQuery);

            while ($fetchArray = mysqli_fetch_array($runSelectQuery)) {
                $cid = $fetchArray["campaignID"];
                $cTitle = $fetchArray["campaignTitle"];
                $cDes = $fetchArray["campaignVision"];
                $cStatus = $fetchArray["campaignStatus"];
                $cPhoto = $fetchArray["campaignPhoto"];
            ?>
        <div class="contentList">
            <img src="<?php echo $cPhoto; ?>" class="campaignImg">
            <div class="contextTextContainer">
                <div class="contentText">
                    <p>Title: </p>
                    <p><?php echo $cTitle; ?></p>
                </div>
                <div class="contentText">
                    <p>Vision: </p>
                    <p><?php echo $cDes; ?></p>
                </div>
                <div class="contentText">
                    <p>Status: </p>
                    <p><?php echo $cStatus; ?></p>
                </div>
                <div class="campaignMore">
                    <a href="informationDetail.php?cID=<?php echo $cid; ?>">More Details</a>
                </div>
            </div>
        </div>
        <?php
            }
        }
        ?>
    </div>
    <?php include("footer.php") ?>
    <script>
    document.getElementById("Here").innerHTML = " <b class='here'>You are at Information Page</b>"
    </script>
</body>


</html>