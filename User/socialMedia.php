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
    <title>Social Media</title>
    <link rel="stylesheet" type="text/css" href="style.css?s=<?php echo time(); ?>">

</head>

<body class="homeMainConatainer">
    <div class="navAndSearch">
        <?php
        include('navbar.php')
        ?>
        <form action="socialMedia.php" method="POST" class="navSearch">
            <input name="txtSearch" placeholder="Search..." class="searchInput">
            <input type="Submit" name="btnSearch" value="Search" class="searchButton">
        </form>
    </div>
    <div class="mainContentConatier">
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
                <div class="contentList">
                    <img src="<?php echo $mPhoto; ?>" class="contentImg">
                    <div class="contextTextContainer">
                        <div class="contentText">
                            <p>Name: </p>
                            <p><?php echo $mName; ?></p>
                        </div>
                        <div class="contentText">
                            <p>Popularity: </p>
                            <p><?php echo $mPopu; ?></p>
                        </div>
                        <div class="contentText">
                            <p>Description: </p>
                            <p>
                                <?php echo substr($mDes, 0, 60) . "..."; ?>
                            </p>
                        </div>
                        <div class="contentText">
                            <p>Safe Techiniques are in detail page.</p>

                        </div>

                        <div class="campaignMore">
                            <a href="mediaDetails.php?mID=<?php echo $mid; ?>">More Details</a>
                        </div>
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
                <div class="contentList">
                    <img src="<?php echo $mPhoto; ?>" class="contentImg">
                    <div class="contextTextContainer">
                        <div class="contentText">
                            <p>Name: </p>
                            <p><?php echo $mName; ?></p>
                        </div>
                        <div class="contentText">
                            <p>Popularity: </p>
                            <p><?php echo $mPopu; ?></p>
                        </div>
                        <div class="contentText">
                            <p>Description: </p>
                            <p>
                                <?php echo substr($mDes, 0, 60) . "..."; ?>
                            </p>
                        </div>
                        <div class="contentText">
                            <p>Safe Techiniques are in detail page.</p>
                        </div>

                        <div class="campaignMore">
                            <a href="mediaDetails.php?mID=<?php echo $mid; ?>">More Details</a>
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
        document.getElementById("Here").innerHTML = " <b class='here'>You are at Social Media Page</b>"
    </script>
</body>


</html>