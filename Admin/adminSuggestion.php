<?php
include("connect.php");


if (isset($_GET["sid"])) {
    $sID = $_GET['sid'];
    $deleteQuery = "DELETE FROM userSuggestion WHERE suggestionID='$sID'";
    $deleteResult = mysqli_query($connect, $deleteQuery);
    if ($deleteResult) {
        echo "<script>window.alert('Delete Success')</script>";
        echo "<script>window.location='adminSuggestion.php'</script>";
    } else {
        echo "<script>window.alert('Delete Fail')</script>";
        echo "<script>window.location='adminSuggestion.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User's Suggestions List</title>
</head>

<body class="dashboardContainer">
    <?php include('navBar.php') ?>
    <div class="campaignMainContainer">
        <section class="adminCamHeader">
            <h1>FeedBack and Suggestions</h1>

        </section>
        <section class="campaignTableContainer">
            <?php
            $selectSugQuery = "SELECT * FROM userSuggestion ";
            $runSelectSugQuery = mysqli_query($connect, $selectSugQuery);
            while ($fetchSugArray = mysqli_fetch_array($runSelectSugQuery)) {
                $sugID=$fetchSugArray["suggestionID"];
                $sugText = $fetchSugArray["suggestionText"];
                $userID=$fetchSugArray["userID"];

                $select="SELECT userName FROM user WHERE userID= '$userID'";
                $result=mysqli_query($connect,$select);
                $array=mysqli_fetch_array($result);
                $uname=$array[0];


            ?>
            <div class="campaingListContainer">
                <p><span>Name:</span> <?php echo $uname; ?></p>


                <p><span>Message:</span> <?php echo $sugText; ?></p>
                <div class="editDContainer">
                    <a href="adminSuggestion.php?sid=<?php echo $sugID; ?>" class="deleteBtn">Delete</a>
                </div>



            </div>
            <?php } ?>












        </section>

    </div>


</body>

</html>