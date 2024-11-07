<?php
include("connect.php");



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Users List</title>
</head>

<body class="dashboardContainer">
    <?php include('navBar.php') ?>
    <div class="campaignMainContainer">
        <section class="adminCamHeader">
            <h1>Monthly New Users</h1>

        </section>
        <section class="campaignTableContainer">
            <?php
            $selectSugQuery = "SELECT * FROM user WHERE Month='October' ";
            $runSelectSugQuery = mysqli_query($connect, $selectSugQuery);
            while ($fetchSugArray = mysqli_fetch_array($runSelectSugQuery)) {
                $uname=$fetchSugArray["userName"];
                $uemail = $fetchSugArray["userEmail"];
                $uphone= $fetchSugArray["userPhone"]

              


            ?>
            <div class="campaingListContainer">
                <p><span>Name:</span> <?php echo $uname; ?></p>


                <p><span>Email:</span> <?php echo $uemail; ?></p>

                <p><span>Phone:</span> <?php echo $uphone; ?></p>



            </div>
            <?php } ?>












        </section>

    </div>


</body>

</html>