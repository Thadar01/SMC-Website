<?php
include('connect.php');
session_start();
if (!isset($_SESSION['uID'])) {
    echo "<script>window.alert('SignIn Again!')</script>";
    echo "<script>window.location='userSignIn.php'</script>";
}
   

if (isset($_GET["parid"])) {
    $pID = $_GET['parid'];
    $deleteQuery = "DELETE FROM userParticipate WHERE participateID='$pID'";
    $deleteResult = mysqli_query($connect, $deleteQuery);
    if ($deleteResult) {
        echo "<script>window.alert('Your registration has been removed.')</script>";
        echo "<script>window.location='history.php'</script>";
    } else {
        echo "<script>window.alert('Fail to remove Participation.')</script>";
        echo "<script>window.location='history.php'</script>";
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link rel="stylesheet" type="text/css" href="style.css?s=<?php echo time(); ?>">

</head>

<body class="homeMainConatainer">
    <div>
        <?php
        include('navbar.php')
        ?>
    </div>
    <div class="historyScreen">
        <section class="suggestionContainer">
            <h2>Your Suggestions</h2>
            <div class="listConatiner">

                <?php
                 $USERID=$_SESSION['uID'];
                 $sugQuery="SELECT * FROM userSuggestion WHERE userID='$USERID' ";
                 $runSugQuery= mysqli_query($connect,$sugQuery);
                
              
                
           

            while ( $sugArr=mysqli_fetch_array($runSugQuery)) {
                $sID = $sugArr["suggestionID"];
                $sText = $sugArr["suggestionText"];
              
            ?>
                <div class="historyList">
                    <p>
                        <?php echo $sText?>
                    </p>
                    <div class="editContainer">
                        <a href="contactEdit.php?sugid=<?php echo $sID;?>" class="editBtn">Edit</a>
                    </div>
                </div>

                <?php } ?>

            </div>
        </section>
        <section class="participateConatiner">
            <h2>Your Participated List</h2>
            <div class="listConatiner">
                <?php
                 $USERID=$_SESSION['uID'];
                 $partQuery="SELECT * FROM userParticipate WHERE userID='$USERID' ";
                 $runPartQuery= mysqli_query($connect,$partQuery);
                
              
                
           

            while ( $partArr=mysqli_fetch_array($runPartQuery)) {
                $partID = $partArr["participateID"];
                $camID = $partArr["campaignID"];

                $showQuery="SELECT campaignTitle FROM campaign WHERE campaignID='$camID'";
                $result=mysqli_query($connect,$showQuery);
                $arr=mysqli_fetch_array($result);
                $camname=$arr[0];
              
            ?>
                <div class="historyList">
                    <p>
                        You have registered to participate in <?php echo $camname?>.
                    </p>
                    <div class="editContainer">
                        <a href="history.php?parid=<?php echo $partID;?>" class="removeBtn">Remove</a>
                    </div>
                </div>

                <?php } ?>

        </section>
        <?php include("footer.php") ?>
        <script>
        document.getElementById("Here").innerHTML = " <b class='here'>You are at History Page</b>"
        </script>
    </div>
</body>

</html>